@extends('layouts.freelancer_layout')

@section('content')
<div class="container">
    <h2>Détails de l'événement : {{ $event->title }}</h2>
    <p><strong>Date de début:</strong> {{ $event->start_date }}</p>
    <p><strong>Date de fin:</strong> {{ $event->end_date }}</p>
    <p><strong>Lieu:</strong> {{ $event->location }}</p>

    <h3>Tâches associées à l'événement :</h3>
    <ul>
        @foreach ($event->tasks as $task)
            <li>{{ $task->description }}</li>
        @endforeach
    </ul>

    <a href="{{ route('events.index') }}" class="btn btn-primary">Retour à la liste des événements</a>
</div>
@endsection
