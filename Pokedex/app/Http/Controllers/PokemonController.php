<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PokemonController extends Controller
{
    private function getUniqueTypes()
    {
        $allTypes = Pokemon::all()->pluck('type');
        $uniqueTypes = collect();
        
        foreach ($allTypes as $typeString) {
            $typeArray = explode('/', $typeString);
            foreach ($typeArray as $type) {
                $type = trim($type);
                if (!$uniqueTypes->contains($type)) {
                    $uniqueTypes->push($type);
                }
            }
        }
        
        return $uniqueTypes->sort()->values();
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Pokemon::query();

        // Filtrování podle jména
        if ($request->has('name') && !empty($request->name)) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        // Filtrování podle typu
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'like', '%' . $request->type . '%');
        }

        // Filtrování podle úrovně
        if ($request->has('min_level') && is_numeric($request->min_level)) {
            $query->where('level', '>=', (int)$request->min_level);
        }
        if ($request->has('max_level') && is_numeric($request->max_level)) {
            $query->where('level', '<=', (int)$request->max_level);
        }

        // Řazení
        $sortField = $request->get('sort', 'name');
        $sortDirection = $request->get('direction', 'asc');
        $query->orderBy($sortField, $sortDirection);

        $pokemons = $query->get();
        $types = $this->getUniqueTypes();

        return view('pokemons.index', [
            'pokemons' => $pokemons,
            'types' => $types,
            'selectedType' => $request->type
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pokemons.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'level' => 'required|integer|min:1',
            'hp' => 'required|integer|min:1',
            'attack' => 'required|integer|min:1',
            'defense' => 'required|integer|min:1',
            'speed' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/pokemons'), $imageName);
            $validatedData['image'] = $imageName;
        }

        Pokemon::create($validatedData);

        return redirect()->route('pokemons.index')
            ->with('success', 'Pokemon byl úspěšně přidán.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pokemon $pokemon)
    {
        return view('pokemons.show', compact('pokemon'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pokemon $pokemon)
    {
        return view('pokemons.edit', compact('pokemon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'level' => 'required|integer|min:1',
            'hp' => 'required|integer|min:1',
            'attack' => 'required|integer|min:1',
            'defense' => 'required|integer|min:1',
            'speed' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            // Smazání starého obrázku
            if ($pokemon->image && file_exists(public_path('images/pokemons/' . $pokemon->image))) {
                unlink(public_path('images/pokemons/' . $pokemon->image));
            }

            $image = $request->file('image');
            $imageName = Str::slug($request->name) . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images/pokemons'), $imageName);
            $validatedData['image'] = $imageName;
        }

        $pokemon->update($validatedData);

        return redirect()->route('pokemons.index')
            ->with('success', 'Pokemon byl úspěšně upraven.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pokemon $pokemon)
    {
        if ($pokemon->image && file_exists(public_path('images/pokemons/' . $pokemon->image))) {
            unlink(public_path('images/pokemons/' . $pokemon->image));
        }

        $pokemon->delete();

        return redirect()->route('pokemons.index')
            ->with('success', 'Pokemon byl úspěšně smazán.');
    }
}
