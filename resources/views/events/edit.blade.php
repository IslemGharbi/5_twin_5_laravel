@extends('layouts.freelancer_layout')


@section('content')
<div class="container">
    <h2>Modifier l'événement : {{ $event->title }}</h2>
    <form method="POST" action="{{ route('events.update', ['event' => $event]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titre de l'événement</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" required>{{ $event->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $event->start_date }}" required>
        </div>

        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $event->end_date }}" required>
        </div>

        <div class="form-group">
            <label for="location">Lieu</label>
            <input type="text" name="location" id="location" class="form-control" value="{{ $event->location }}" required>
        </div>

        <div class="form-group">
            <label for="tasks">Tâches</label>
            <select name="tasks[]" id="tasks" class="form-control" multiple>
                @foreach ($tasks as $task)
                    <option value="{{ $task->id }}" @if(in_array($task->id, $event->tasks->pluck('id')->toArray())) selected @endif>{{ $task->description }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Mettre à jour l'événement</button>
    </form>
</div>
@endsection
