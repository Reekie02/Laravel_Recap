<?php


namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PokemonController extends Controller
{
    // Mostra il form per inserire un Pokémon
    public function create()
    {
        return view('pokemons.create');
    }

    // Salva il Pokémon inserito
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string'
        ]);
        $pokemon = Pokemon::create([
            'name' => strtolower($request->name)
        ]);
        return redirect()->route('pokemons.show', $pokemon->name);
    }

    // Mostra il dettaglio del Pokémon
    public function show($name)
    {
        // Prendi dati da PokéAPI
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$name}");
        if (!$response->ok()) {
            abort(404, 'Pokémon non trovato');
        }
        $pokemonData = $response->json();

        // Limita alla gen 1-4
        if ($pokemonData['id'] > 493) {
            abort(404, 'Solo Pokémon di prima, seconda, terza e quarta generazione.');
        }

        // Abilità
        $abilities = array_map(fn($a) => $a['ability']['name'], $pokemonData['abilities']);
        // Moveset generico
        $moves = array_map(fn($m) => $m['move']['name'], $pokemonData['moves']);

        // Carica set competitivo consigliato dal JSON
        $sets = json_decode(file_get_contents(resource_path('data/smogon_sets.json')), true);
        $set = $sets[strtolower($name)] ?? null;

        return view('pokemons.show', [
            'pokemon' => $pokemonData,
            'abilities' => $abilities,
            'moves' => $moves,
            'set' => $set
        ]);
    }
}
