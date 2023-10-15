@extends('layouts.freelancer_layout')

@section('content')
    <h1>Modifier l'événement : {{ $event->title }}</h1>
    <form method="post" action="{{ route('events.update', $event) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $event->title }}" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $event->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ $event->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ $event->end_date }}" required>
        </div>
        <div class="form-group">
            <label for="location">Emplacement</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ $event->location }}" required>
        </div>
        <div class="form-group">
            <label for="tasks">Tâches</label>
            @foreach ($event->tasks as $task)
                <input type="text" class="form-control" name="tasks[{{ $task->id }}][description]" value="{{ $task->description }}" required>
                <input type="date" class="form-control" name="tasks[{{ $task->id }}][due_date]" value="{{ $task->due_date }}" required>
                <input type="text" class="form-control" name="tasks[{{ $task->id }}][status]" value="{{ $task->status }}" required>
                <input type="text" class="form-control" name="tasks[{{ $task->id }}][priority]" value="{{ $task->priority }}" required>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
