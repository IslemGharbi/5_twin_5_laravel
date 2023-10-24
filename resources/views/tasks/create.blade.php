@extends('layouts.freelancer_layout')

@section('content')
    <h1>Créer une Tâche</h1>
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" required>
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="due_date">Date d'échéance</label>
            <input type="date" class="form-control" id="due_date" name="due_date" required>
            @error('due_date')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for "status">Statut</label>
            <input type="text" class="form-control" id="status" name="status" required>
            @error('status')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="priority">Priorité</label>
            <input type="text" class="form-control" id="priority" name="priority" required>
            @error('priority')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
