@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Reservations</h1>
    <form method="POST" action="{{ route('reservations.store') }}">
        @csrf
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" id="date" name="date" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="time" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Reserve</button>
    </form>
</div>
@endsection