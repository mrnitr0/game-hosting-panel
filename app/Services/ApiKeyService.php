<?php
/**
 * Created by PhpStorm.
 * User: Hugo
 * Date: 7/22/2019
 * Time: 1:58 AM
 */

namespace App\Services;

use App\ApiKey;
use App\User;

class ApiKeyService
{
	/**
	 * Stores new API Key.
	 *
	 * @param User  $user
	 * @param array $data
	 *
	 * @return ApiKey
	 */
	public function storeApiKey(User $user, array $data)
	{
		$key = ApiKey::make();

		$key->fill($data);

		$key->user()->associate($user);

		$key->save();

		return $key;
	}

	/**
	 * Updates API Key information.
	 *
	 * @param ApiKey $key
	 * @param array  $data
	 *
	 * @return ApiKey
	 */
	public function updateApiKey(ApiKey $key, array $data)
	{
		$key->fill($data);

		$key->save();

		return $key;
	}
}