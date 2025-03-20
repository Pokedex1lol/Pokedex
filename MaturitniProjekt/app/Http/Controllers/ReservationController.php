<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Car;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['store', 'destroy']);
    }

    // Zobrazení stránky rezervací pro admina
    public function adminIndex()
    {
        $reservations = Reservation::with(['user', 'car'])->get();
        return view('admin.reservations', compact('reservations'));
    }

    // Uloží rezervaci
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Pro vytvoření rezervace se musíte přihlásit.'
            ], 401);
        }

        // Validace vstupů - start_date nesmí být v minulosti, maximálně 30 dní dopředu
        try {
            $validated = $request->validate([
                'start_date' => 'required|date|after_or_equal:today',
                'end_date' => 'required|date|after_or_equal:start_date|before_or_equal:' . Carbon::now()->addDays(30)->toDateString(),
                'car_id' => 'required|exists:cars,id',
            ], [
                'start_date.after_or_equal' => 'Datum začátku musí být dnešní nebo pozdější.',
                'end_date.after_or_equal' => 'Datum konce musí být stejné nebo pozdější než datum začátku.',
                'end_date.before_or_equal' => 'Rezervace může být maximálně 30 dní dopředu.',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Chyba validace',
                'errors' => $e->errors()
            ], 422);
        }

        // Kontrola konfliktů s existujícími rezervacemi
        $conflict = Reservation::where('car_id', $validated['car_id'])
            ->where(function ($query) use ($validated) {
                $query->whereBetween('start_date', [$validated['start_date'], $validated['end_date']])
                    ->orWhereBetween('end_date', [$validated['start_date'], $validated['end_date']])
                    ->orWhere(function ($query) use ($validated) {
                        $query->where('start_date', '<=', $validated['start_date'])
                            ->where('end_date', '>=', $validated['end_date']);
                    });
            })
            ->exists();

        if ($conflict) {
            return response()->json([
                'success' => false,
                'message' => 'Tento termín je již rezervován.'
            ], 409);
        }

        try {
            // Uložení rezervace do databáze
            $reservation = Reservation::create([
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
                'car_id' => $validated['car_id'],
                'user_id' => Auth::id(),
                'status' => 'pending',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Rezervace byla úspěšně vytvořena',
                'redirect' => route('reservations.show', $validated['car_id'])
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Při vytváření rezervace došlo k chybě'
            ], 500);
        }
    }


    // Zobrazí detaily auta a jeho dostupnosti v kalendáři
    public function show($id)
    {
        $car = Car::findOrFail($id);
        
        // Získání všech rezervací pro toto auto
        $reservations = Reservation::where('car_id', $id)
            ->where('end_date', '>=', now())
            ->get();

        // Vytvoření pole rezervovaných dnů pro Flatpickr
        $reservedDates = [];
        foreach ($reservations as $reservation) {
            $start = Carbon::parse($reservation->start_date);
            $end = Carbon::parse($reservation->end_date);
            
            // Přidání všech dnů mezi start_date a end_date (včetně)
            while ($start->lte($end)) {
                $reservedDates[] = $start->format('Y-m-d');
                $start->addDay();
            }
        }

        return view('reservations.show', [
            'car' => $car,
            'reservedDates' => $reservedDates
        ]);
    }

    // Zruší rezervaci
    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $isAdminRoute = request()->route()->getName() === 'admin.reservations.destroy';

        // Admin může mazat pouze přes admin panel
        if (Auth::user()->is_admin) {
            if (!$isAdminRoute) {
                return redirect()->back()->with('error', 'Jako admin můžete mazat rezervace pouze přes admin panel.');
            }
            $reservation->delete();
            return redirect()->back()->with('success', 'Rezervace byla úspěšně smazána.');
        }

        // Běžný uživatel může smazat jen své nedokončené rezervace
        if ($reservation->user_id !== Auth::id()) {
            return redirect()->back()->with('error', 'Nemáte oprávnění smazat tuto rezervaci.');
        }

        if ($reservation->status === 'completed') {
            return redirect()->back()->with('error', 'Dokončenou rezervaci nelze smazat.');
        }

        $reservation->delete();
        return redirect()->route('profile.index')->with('success', 'Rezervace byla úspěšně smazána.');
    }


    // Dokončení rezervace
    public function complete($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->update(['status' => 'completed']);

        return redirect()->route('admin.reservations')
            ->with('success', 'Rezervace byla dokončena.');
    }


    // Editace rezervace
    public function edit($id)
    {
        $reservation = Reservation::findOrFail($id);
        return view('admin.reservations_edit', compact('reservation'));
    }

    // Aktualizace rezervace
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date|before_or_equal:' . Carbon::now()->addDays(30)->toDateString(),
        ]);

        $reservation = Reservation::findOrFail($id);
        $reservation->update([
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
        ]);

        return redirect()->route('admin.reservations')->with('success', 'Rezervace byla upravena.');
    }
}
