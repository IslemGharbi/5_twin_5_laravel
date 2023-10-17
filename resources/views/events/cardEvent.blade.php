@extends('layouts.freelancer_layout')

@section('content')
<div class="container">
    <h2>Events</h2>
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($event->image)
                        <img src="{{ asset('storage/' . $event->image) }}" alt="Image de l'événement" class="card-img-top" style="height: 200px; object-fit: contain;">
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" alt="Image de l'événement" class="card-img-top" style="height: 200px; object-fit: contain;">
                    @endif
                    <div class="card-body" style="min-height: 200px;"> <!-- Ajustez la hauteur minimale selon vos besoins -->
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <a href="{{ route('events.showClient', ['event' => $event]) }}" class="btn btn-primary">Voir l'événement</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
