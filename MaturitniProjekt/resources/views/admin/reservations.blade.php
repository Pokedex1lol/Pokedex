@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="text-center">Správa Rezervací</h1>

        <table class="table table-striped table-dark">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Uživatel</th>
                    <th>Vůz</th>
                    <th>Začátek</th>
                    <th>Konec</th>
                    <th>Stav</th>
                    <th>Akce</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->id }}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->car->name }}</td>
                        <td>{{ $reservation->start_date }}</td>
                        <td>{{ $reservation->end_date }}</td>
                        <td>
                            @if ($reservation->status == 'pending')
                                <span class="badge bg-warning">Čeká</span>
                            @elseif ($reservation->status == 'completed')
                                <span class="badge bg-success">Dokončeno</span>
                            @else
                                <span class="badge bg-secondary">Neznámý</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.reservations.edit', $reservation->id) }}" class="btn btn-primary btn-sm">Upravit</a>
                            <form action="{{ route('admin.reservations.complete', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-success btn-sm">Dokončit</button>
                            </form>
                            <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Smazat</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
