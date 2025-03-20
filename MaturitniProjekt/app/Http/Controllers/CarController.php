<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    // Zobrazení seznamu aut
    public function index(Request $request)
    {
        $query = Car::query();

        // Filtr podle značky (např. 'brand')
        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        // Filtr podle cenového rozmezí
        if ($request->filled('min_price')) {
            $query->where('price_per_day', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_per_day', '<=', $request->max_price);
        }

        // Filtr podle roku výroby (pokud máš sloupec 'year')
        if ($request->filled('year')) {
            $query->where('year', $request->year);
        }

        // Řazení – například podle ceny vzestupně či sestupně
        if ($request->filled('sort')) {
            if ($request->sort === 'price_asc') {
                $query->orderBy('price_per_day', 'asc');
            } elseif ($request->sort === 'price_desc') {
                $query->orderBy('price_per_day', 'desc');
            }
        }

        $cars = $query->get();

        // Pro výpis filtrů – například značka, rok, atd. – můžeš poslat i všechny dostupné hodnoty
        // Například:
        $brands = Car::select('brand')->distinct()->get();
        $years  = Car::select('year')->distinct()->orderBy('year')->get();

        return view('admin.cars', compact('cars', 'brands', 'years'));
    }

    // Zobrazení formuláře pro přidání auta
    public function create()
    {
        return view('admin.cars_create');
    }

    // Uložení nového auta do databáze
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price_per_day' => 'required|numeric|min:0',
            'availability' => 'required|boolean',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'power' => 'required|string|max:255',
            'engine' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'transmission' => 'required|string|max:255',
            'fuel_consumption' => 'required|string|max:255',
            'seats' => 'required|integer|min:1|max:9',
            'max_speed' => 'required|integer|min:0',
            'acceleration' => 'required|numeric|min:0',
            'torque' => 'required|integer|min:0',
            'fuel_tank' => 'required|integer|min:0',
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'origin_country' => 'required|string|max:255',
            'service_book' => 'required|boolean',
            'air_conditioning' => 'required|boolean',
            'airbags' => 'required|integer|min:0',
            'parking_camera' => 'required|boolean',
            'heated_seats' => 'required|boolean',
            'safety_features' => 'required|string',
            'deposit' => 'required|integer|min:0',
            'min_driver_age' => 'required|integer|min:18',
            'min_license_length' => 'required|integer|min:0',
            'mileage_limit' => 'required|integer|min:0'
        ]);

        $data = $request->only([
            'name',
            'brand',
            'description',
            'price_per_day',
            'availability',
            'power',
            'engine',
            'year',
            'transmission',
            'fuel_consumption',
            'seats',
            'max_speed',
            'acceleration',
            'torque',
            'fuel_tank',
            'color',
            'mileage',
            'origin_country',
            'service_book',
            'air_conditioning',
            'airbags',
            'parking_camera',
            'heated_seats',
            'safety_features',
            'deposit',
            'min_driver_age',
            'min_license_length',
            'mileage_limit'
        ]);

        // Zpracování safety_features jako JSON pole
        if (isset($data['safety_features'])) {
            $safety_features = array_map('trim', explode(',', $data['safety_features']));
            $data['safety_features'] = json_encode($safety_features);
        }

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image_url'] = 'images/' . $filename;
        }

        $car = Car::create($data);

        return redirect()->route('admin.cars')
            ->with('success', 'Auto bylo úspěšně přidáno!');
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
            'brand' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_day' => 'required|numeric|min:0',
            'availability' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'power' => 'required|string|max:255',
            'engine' => 'required|string|max:255',
            'year' => 'required|integer|min:1900|max:' . (date('Y') + 1),
            'transmission' => 'required|string|max:255',
            'fuel_consumption' => 'required|string|max:255',
            'seats' => 'required|integer|min:1|max:9',
            'max_speed' => 'required|integer|min:0',
            'acceleration' => 'required|numeric|min:0',
            'torque' => 'required|integer|min:0',
            'fuel_tank' => 'required|integer|min:0',
            'color' => 'required|string|max:255',
            'mileage' => 'required|integer|min:0',
            'origin_country' => 'required|string|max:255',
            'service_book' => 'required|boolean',
            'air_conditioning' => 'required|boolean',
            'airbags' => 'required|integer|min:0',
            'parking_camera' => 'required|boolean',
            'heated_seats' => 'required|boolean',
            'safety_features' => 'required|string',
            'deposit' => 'required|integer|min:0',
            'min_driver_age' => 'required|integer|min:18',
            'min_license_length' => 'required|integer|min:0',
            'mileage_limit' => 'required|integer|min:0'
        ]);

        $data = $request->only([
            'name', 
            'brand', 
            'description', 
            'price_per_day', 
            'availability',
            'power',
            'engine',
            'year',
            'transmission',
            'fuel_consumption',
            'seats',
            'max_speed',
            'acceleration',
            'torque',
            'fuel_tank',
            'color',
            'mileage',
            'origin_country',
            'service_book',
            'air_conditioning',
            'airbags',
            'parking_camera',
            'heated_seats',
            'safety_features',
            'deposit',
            'min_driver_age',
            'min_license_length',
            'mileage_limit'
        ]);

        // Zpracování safety_features jako JSON pole
        if (isset($data['safety_features'])) {
            $safety_features = array_map('trim', explode(',', $data['safety_features']));
            $data['safety_features'] = json_encode($safety_features);
        }

        // Pokud je nahrán nový obrázek
        if ($request->hasFile('image')) {
            // Smazání starého obrázku, pokud existuje
            if ($car->image_url && file_exists(public_path($car->image_url))) {
                unlink(public_path($car->image_url));
            }

            // Uložení nového obrázku
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
