@extends('layouts.freelancer_layout')

@section('content')
<div class="container">
    <h2>Liste des événements</h2>
    
    <div class="d-flex justify-content-end mb-3">
        <!-- Bouton pour créer un événement -->
        <a href="{{ route('events.create') }}" class="btn btn-primary">Créer un événement</a>
        
        <!-- Bouton de filtrage -->
        <button type="button" class="btn btn-light ml-2" data-toggle="modal" data-target="#filterModal">
            <i class="fa fa-filter"></i> <!-- Icône de filtre en bleu -->
        </button>
    </div>
   

    <!-- Formulaire de filtrage (dans un modal) -->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
           
                <form method="GET" action="{{ route('events.index') }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filterModalLabel">Filtrer les événements</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="location">Filtrer par lieu :</label>
                            <select name="location" id="location" class="form-control">
                                <option value="">Tous les lieux</option>
                                @foreach ($locations as $location)
                                    <option value="{{ $location }}">{{ $location }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="title">Filtrer par titre :</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Filtrer</button>
                    </div>
                </form>
               
            </div>
        </div>
    </div>

    @if (count($events) > 0)
        <p>{{ count($events) }} événement(s) trouvé(s) correspondant à vos critères de filtrage.</p>
    @else
        <p>Aucun événement ne correspond aux critères de filtrage.</p>
    @endif

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
            @forelse ($events as $event)
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
            @empty
                <tr>
                    <td colspan="5">Aucun événement ne correspond aux critères de filtrage.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
