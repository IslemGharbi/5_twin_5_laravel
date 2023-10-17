@extends('layouts.freelancer_layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body text-center">
                    <h2 class="card-title mb-4">Event Details : {{ $event->title }}</h2>
                    @if ($event->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $event->image) }}" alt="Image de l'événement" class="img-fluid rounded" style="max-width: 300px; max-height: 200px;"> <!-- Ajoutez max-height pour définir une hauteur maximale -->
                        </div>
                    @endif
                    <p class="mb-2"><strong>Date de début :</strong> {{ date('d/m/Y', strtotime($event->start_date)) }}</p>
                    <p class="mb-2"><strong>Date de fin :</strong> {{ date('d/m/Y', strtotime($event->end_date)) }}</p>
                    <p class="mb-3"><strong>Lieu :</strong> {{ $event->location }}</p>
                    
                    <h4 class="mt-4">Tâches associées à l'événement :</h4>
                    <ul class="list-group mb-4">
                        @foreach ($event->tasks as $task)
                            <li class="list-group-item">{{ $task->description }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <a href="{{ route('events.cardEvent') }}" class="btn btn-primary">Retour à la liste des événements</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
