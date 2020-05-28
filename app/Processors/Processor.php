<?php

namespace App\Processors;

use App\Exceptions\InvalidParameterChoiceException;
use Exception;

abstract class Processor
{
    /**
     * @var array
     */
    protected $params = [];

    // TODO: wrap cost function to call validate
    abstract function cost($parameters): array;

    abstract function reject($cost): bool;

    public function validate(array $choices): void
    {
        // For each choice, check if they are present in the definition
        foreach ($choices as $key => $value) {
            $options = $this->params[ $key ]['options'];

            if (!in_array($value, $options)) {
                throw new InvalidParameterChoiceException;
            }
        }
    }

    public function calculate(array $choices): array
    {
        // Assert choices actually exist
        $this->validate($choices);

        // Filter choices that was used in this calculator
        $usedChoices = collect($choices)->only(array_keys($this->params))->toArray();

        // Map 'empty_value' for each parameter
        $defaultChoices = collect($this->params)->mapWithKeys(function ($value, $param) {
            return [$param => $this->params[ $param ]['empty_value']];
        })->toArray();

        // Add default values to missing choices
        $choices = array_merge($defaultChoices, $usedChoices);

        $options = collect($this->params)->mapWithKeys(function ($value, $param) use ($choices) {
            return [$param => $this->buildVariations($param, $choices)];
        })->toArray();

        return collect($this->params)->mapWithKeys(function ($definition, $param) use ($options) {
            return [$param => array_merge($definition, [
                'options' => $options[ $param ],
            ])];
        })->toArray();
    }

    private function buildVariations(string $param, array $choices): array
    {
        // Assert that the parameter is defined
        if (!array_key_exists('options', $this->params[ $param ])) {
            throw new Exception("Could not find 'options' definition for parameter $param");
        }

        return collect($this->params[ $param ]['options'])->mapWithKeys(function ($option) use ($param, $choices) {
            // Merge current 'choices' with each 'option' for current 'parameter'
            $newChoices = array_merge($choices, [
                $param => $option,
            ]);

            // Map 'option' to the 'cost' of this set of parameters
            return [$option => $this->cost($newChoices)];
        })->reject(function ($cost) {
            return $this->reject($cost);
        })->map(function ($value, $key) {
            return $key;
        })->toArray();
    }
}
