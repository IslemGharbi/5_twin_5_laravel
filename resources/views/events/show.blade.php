@extends('layouts.freelancer_layout')

@section('content')
    <h1>Détails de l'événement : {{ $event->title }}</h1>
    <p>Description : {{ $event->description }}</p>
    <p>Date de début : {{ $event->start_date }}</p>
    <p>Date de fin : {{ $event->end_date }}</p>
    <p>Emplacement : {{ $event->location }}</p>

    <p>Tâches :</p>
    @if ($event->task)
        @foreach(json_decode($event->task) as $task)
            <p>Tâche : {{ $task->description }}</p>
            <p>Date d'échéance : {{ $task->due_date }}</p>
            <p>Statut : {{ $task->status }}</p>
            <p>Priorité : {{ $task->priority }}</p>
        @endforeach
    @else
        <p>Aucune tâche associée à cet événement.</p>
    @endif
@endsection
