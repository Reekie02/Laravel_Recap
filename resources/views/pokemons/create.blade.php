<x-layout>

    <x-header title="Crea" />

    <div class="container">
        <h1>Inserisci un Pokémon</h1>
        <form action="{{ route('pokemons.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nome del Pokémon</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    name="name" placeholder="es. pikachu" required>
                @error('name')
                    <span class="invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Cerca</button>
        </form>
    </div>




</x-layout>
