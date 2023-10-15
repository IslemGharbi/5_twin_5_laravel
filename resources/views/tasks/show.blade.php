@extends('layouts.freelancer_layout')


@section('content')
    <h1>Détails de la Tâche</h1>
    <p><strong>Description :</strong> {{ $task->description }}</p>
    <p><strong>Date d'échéance :</strong> {{ $task->due_date }}</p>
    <p><strong>Statut :</strong> {{ $task->status }}</p>
    <p><strong>Priorité :</strong> {{ $task->priority }}</p>
    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-primary">Supprimer</button>
    </form>
</div>
