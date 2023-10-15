@extends('layouts.freelancer_layout')

@section('content')
    <h1>Liste des tâches</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Créer une tâche</a>
    <table class="table">
        <thead>
            <tr>
                <th>Description</th>
                <th>Date d'échéance</th>
                <th>Statut</th>
                <th>Priorité</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
                <tr>
                    <td>{{ $task->description }}</td>
                    <td>{{ $task->due_date }}</td>
                    <td>{{ $task->status }}</td>
                    <td>{{ $task->priority }}</td>
                    <td>
                        <a href="{{ route('tasks.show', $task) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('tasks.edit', $task) }}" class="btn btn-primary">Modifier</a>
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
