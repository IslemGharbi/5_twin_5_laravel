@extends('layouts.freelancer_layout')

@section('content')
    <h1>Modifier la Tâche</h1>
    <form method="POST" action="{{ route('tasks.update', $task) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ $task->description }}" required>
        </div>
        <div class="form-group">
            <label for="due_date">Date d'échéance</label>
            <input type="date" class="form-control" id="due_date" name="due_date" value="{{ $task->due_date }}" required>
        </div>
        <div class="form-group">
            <label for="status">Statut</label>
            <input type="text" class="form-control" id="status" name="status" value="{{ $task->status }}" required>
        </div>
        <div class="form-group">
            <label for="priority">Priorité</label>
            <input type="text" class="form-control" id="priority" name="priority" value="{{ $task->priority }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
