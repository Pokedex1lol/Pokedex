<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // Zobrazení seznamu aut
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars', compact('cars'));
    }

    // Zobrazení formuláře pro přidání auta
    public function create()
    {
        return view('admin.cars_create');
    }

    // Uložení nového auta do databáze
    public function store(Request $request)
{

    $request->validate([
        'name' => 'required|string|max:255',
        'model' => 'required|string|max:255',
        'price_per_day' => 'required|numeric|min:0',
        'available' => 'required|in:1,0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Pouze relevantní pole
    $data = $request->only(['name', 'model', 'price_per_day', 'available']);
    

    // Uložení obrázku do public/images/
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename);
        $data['image_url'] = 'images/' . $filename;
    }

    // Vytvoření auta v databázi
    $car = Car::create($data);

    if ($car) {
        return redirect()->route('admin.cars')->with('success', 'Auto bylo přidáno!');
    } else {
        return back()->with('error', 'Chyba při přidávání auta.');
    }
}


    // Zobrazení formuláře pro editaci auta
    public function edit(Car $car)
    {
        return view('admin.cars_edit', compact('car'));
    }

    // Aktualizace auta
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price_per_day' => 'required|numeric|min:0',
            'available' => 'required|in:1,0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price_per_day', 'available']);

        // Pokud je nahrán nový obrázek
        if ($request->hasFile('image')) {
            // Smazání starého obrázku, pokud existuje
            if ($car->image_url && file_exists(public_path($car->image_url))) {
                unlink(public_path($car->image_url));
            }

            // Uložení nového obrázku do public/images/
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image_url'] = 'images/' . $filename;
        }

        // Aktualizace dat v DB
        $car->update($data);

        return redirect()->route('admin.cars')->with('success', 'Auto bylo úspěšně upraveno.');
    }

    // Smazání auta
    public function destroy(Car $car)
    {
        // Smazání obrázku, pokud existuje
        if ($car->image_url && file_exists(public_path($car->image_url))) {
            unlink(public_path($car->image_url));
        }

        $car->delete();
        return redirect()->route('admin.cars')->with('success', 'Auto bylo smazáno!');
    }
}
