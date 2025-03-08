<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\Car;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Zobrazení stránky rezervací pro admina
    public function adminIndex()
    {
        $reservations = Reservation::with(['user', 'car'])->get();
        return view('admin.reservations', compact('reservations'));
    }

    // Uloží rezervaci
    public function store(Request $request)
    {
        // Validace vstupů - start_date nesmí být v minulosti, maximálně 30 dní dopředu
        $validated = $request->validate([
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after_or_equal:start_date|before_or_equal:' . Carbon::now()->addDays(30)->toDateString(),
            'car_id' => 'required|exists:cars,id',
        ], [
            'start_date.after_or_equal' => 'Datum začátku musí být dnešní nebo pozdější.',
            'end_date.after_or_equal' => 'Datum konce musí být stejné nebo pozdější než datum začátku.',
            'end_date.before_or_equal' => 'Rezervace může být maximálně 30 dní dopředu.',
        ]);

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
            // Vložíme chybu do $errors a vrátíme se s původními vstupy
            return back()
                ->withInput()
                ->withErrors(['Tento termín je již rezervován.']);
        }

        // Uložení rezervace do databáze
        Reservation::create([
            'start_date' => $validated['start_date'],
            'end_date' => $validated['end_date'],
            'car_id' => $validated['car_id'],
            'user_id' => Auth::id(),
            'status' => 'pending',
        ]);

        // Přesměrování s úspěšnou zprávou
        return redirect()
            ->route('reservations.show', $validated['car_id'])
            ->with('success', 'Rezervace byla úspěšně vytvořena.');
    }


    // Zobrazí detaily auta a jeho dostupnosti v kalendáři
    public function show($id)
    {
        $car = Car::findOrFail($id);
        $calendar = [];
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addDays(30);

        for ($date = $startDate; $date <= $endDate; $date->addDay()) {
            // Zkontroluj, jestli je den zarezervovaný
            $reserved = Reservation::where('car_id', $id)
                ->where('start_date', '<=', $date->toDateString())
                ->where('end_date', '>=', $date->toDateString())
                ->exists();

            $calendar[] = [
                'date' => $date->toDateString(),
                'reserved' => $reserved
            ];
        }

        return view('reservations.show', [
            'car' => $car,
            'calendar' => $calendar
        ]);
    }

    // Zruší rezervaci
    public function destroy($id)
    {
        $reservation = Reservation::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        // Pokud je rezervace dokončená, akci zablokujeme
        if ($reservation->status === 'completed') {
            return redirect()->route('profile.index')
                ->with('error', 'Dokončenou rezervaci nelze smazat.');
        }

        // V opačném případě rezervaci odstraníme
        $reservation->delete();

        return redirect()->route('profile.index')
            ->with('success', 'Rezervace byla úspěšně smazána.');
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
