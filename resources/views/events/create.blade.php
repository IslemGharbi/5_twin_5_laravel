@extends('layouts.freelancer_layout')



@section('content')
<div class="container">
    <h2>Créer un nouvel événement</h2>
    <form method="POST" action="{{ route('events.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Titre de l'événement</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required></textarea>
        </div>

        <div class="form-group">
    <label for="start_date">Date de début</label>
    <input type="date" name="start_date" class="form-control" id="start_date" value="{{ old('start_date') }}">
    @error('start_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group">
    <label for="end_date">Date de fin</label>
    <input type="date" name="end_date" class="form-control" id="end_date" value="{{ old('end_date') }}">
    @error('end_date')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

        <div class="form-group">
            <label for="location">Lieu</label>
            <input type="text" name="location" id="location" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="tasks">Tâches</label>
            <select name="tasks[]" id="tasks" class="form-control" multiple>
                @foreach ($tasks as $task)
                    <option value="{{ $task->id }}">{{ $task->description }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Créer l'événement</button>
    </form>
</div>
@endsection
