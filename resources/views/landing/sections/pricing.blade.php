<x-section
    title="Servidores para qualquer hora"
    description="Crie seu próprio servidor em minutos e pague apenas pelo tempo online!"
    theme="blue"
>
    <div class="px-8 grid grid-cols-2 md:grid-cols-3 gap-8 items">
        @include('landing.components.game-card', [
            'img' => asset("images/minecraft.png"),
            'alt' => 'Minecraft | Paper Server',
            'specs' => '~10 slots',
            'description' => '1200 marks + 1GB RAM + 5GB SSD',
            'price' => 0.73,
            'period' => 'por hora'
        ])
        @include('landing.components.game-card', [
            'img' => asset("images/csgo.png"),
            'alt' => 'Counter Strike: Global Offensive',
            'specs' => '10 slots de 128 tick',
            'description' => '1800 marks + 1GB RAM + 30GB SSD',
            'price' => 1.11,
            'period' => 'por hora'
        ])
        @include('landing.components.game-card', [
            'img' => asset("images/cod4.png"),
            'alt' => 'Call of Duty 4 Xtended',
            'specs' => '12 slots',
            'description' => '1800 marks + 1GB RAM + 20GB SSD',
            'price' => 0.34,
            'period' => 'por hora'
        ])
    </div>

    <div class="flex justify-center mt-16">
        <x-cta href="{{ route('register') }}">
            Criar servidor
        </x-cta>
    </div>
</x-section>
