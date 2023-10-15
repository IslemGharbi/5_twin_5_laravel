@extends('layouts.freelancer_layout')


@section('content')
    <h1>Liste des événements</h1>
    <a href="{{ route('events.create') }}" class="btn btn-primary">Créer un événement</a>
    <table class="table">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Date de début</th>
                <th>Date de fin</th>
                <th>Emplacement</th>
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
                        <a href="{{ route('events.show', $event) }}" class="btn btn-info">Voir</a>
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-warning">Éditer</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
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
