@extends('layouts.freelancer_layout')


@section('content')
    <h1>Créer un événement</h1>
    <form method="post" action="{{ route('events.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group">
            <label for="start_date">Date de début</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="form-group">
            <label for="end_date">Date de fin</label>
            <input type="date" class "form-control" id="end_date" name="end_date" required>
        </div>
        <div class="form-group">
            <label for="location">Emplacement</label>
            <input type="text" class="form-control" id="location" name="location" required>
        </div>
        <div class="form-group">
    <label for="tasks">Tâches</label>
    <input type="text" class="form-control" id="tasks" name="tasks[0][description]" placeholder="Description de la tâche" required>
    <input type="date" class="form-control" name="tasks[0][due_date]" placeholder="Date d'échéance" required>
    <input type="text" class="form-control" name="tasks[0][status]" placeholder="Statut" required>
    <input type="text" class="form-control" name="tasks[0][priority]" placeholder="Priorité" required>
</div>

        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
@endsection
