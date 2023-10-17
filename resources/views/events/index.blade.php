@extends('layouts.freelancer_layout')

@section('content')
<div class="container">
    <h2>Liste des événements</h2>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Créer un événement</a>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Lieu</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
                <tr>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->start_date }}</td>
                    <td>{{ $event->end_date }}</td>
                    <td>{{ $event->location }}</td>
                    <td>
                        <div>
                            <a href="{{ route('events.show', ['event' => $event]) }}">
                                <i class="fa fa-eye"></i> <!-- Icône pour Voir -->
                            </a>
                            <a href="{{ route('events.edit', ['event' => $event]) }}">
                                <i class="fa fa-pencil"></i> <!-- Icône pour Modifier -->
                            </a>
                            <form method="POST" action="{{ route('events.destroy', ['event' => $event]) }}" style="display: inline;">
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
</div>
@endsection




