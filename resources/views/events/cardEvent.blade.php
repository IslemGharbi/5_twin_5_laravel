@extends('layouts.freelancer_layout')

@section('content')
<div class="container">
    <h2>Events</h2>
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card">
                    @if ($event->image)
                        <img src="{{ asset('/storage/'. $event->image) }}" alt="Image de l'événement" class="card-img-top" style="height: 200px; object-fit: contain;">
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" alt="Image de l'événement" class="card-img-top" style="height: 200px; object-fit: contain;">
                    @endif
                    <div class="card-body" style="min-height: 200px;">
                        <h5 class="card-title">{{ $event->title }}</h5>
                        <a href="{{ route('events.showClient', ['event' => $event]) }}" class="btn btn-primary">Voir l'événement</a>
                        
                        @if (auth()->check())
                            @if (!$event->reservations->contains('user_id', auth()->user()->id))
                                <form action="{{ route('events.reserve', ['event' => $event->id]) }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success mt-2">Réserver</button>
                                </form>
                            @else
                                <p class="mt-2">Vous avez déjà réservé cet événement.</p>
                            @endif
                        @else
                            <p class="mt-2">Connectez-vous pour réserver cet événement.</p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@endsection
