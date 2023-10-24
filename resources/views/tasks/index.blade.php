@extends('layouts.freelancer_layout')

@section('content')
    <h1>Liste des tâches</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-primary">Créer une tâche</a> <br/>
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
                        <div>
                            <a href="{{ route('tasks.show', $task) }}">
                                <i class="fa fa-eye"></i> <!-- Icône pour Voir -->
                            </a>
                            <a href="{{ route('tasks.edit', $task) }}">
                                <i class="fa fa-pencil"></i> <!-- Icône pour Modifier -->
                            </a>
                            
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">
                                    <i class="fa fa-trash"></i> <!-- Icône pour Supprimer -->
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
