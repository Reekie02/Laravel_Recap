<x-layout>

    <x-header title="{{ $pokemon['name'] }}" />

    <div class="container">
        <h1 class="mb-3 text-capitalize">{{ $pokemon['name'] }}</h1>
        <div class="mb-2">
            <strong>Numero Pokédex:</strong> #{{ $pokemon['id'] }}
        </div>
        <div class="mb-2">
            <strong>Abilità:</strong> {{ implode(', ', $abilities) }}
        </div>
        <div class="mb-2">
            <strong>Moves disponibili:</strong>
            <ul>
                @foreach ($moves as $move)
                    <li>{{ $move }}</li>
                @endforeach
            </ul>
        </div>
        @if ($set)
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="mb-0">Consiglio Competitivo</h3>
                </div>
                <div class="card-body">
                    <ul>
                        <li><strong>Natura:</strong> {{ $set['nature'] ?: '-' }}</li>
                        <li><strong>Item:</strong> {{ $set['item'] ?: '-' }}</li>
                        <li><strong>Abilità:</strong> {{ $set['ability'] ?: '-' }}</li>
                        <li><strong>Moveset Consigliato:</strong>
                            <ul>
                                @foreach ($set['moveset'] as $move)
                                    <li>{{ $move }}</li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        @else
            <div class="alert alert-warning mt-4">
                Nessun set competitivo consigliato disponibile per questo Pokémon.
            </div>
        @endif

        <a href="{{ route('pokemons.create') }}" class="btn btn-secondary mt-3">Cerca un altro Pokémon</a>
    </div>



</x-layout>
