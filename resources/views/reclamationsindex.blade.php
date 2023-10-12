@extends('layouts.freelancer_layout')

@section('title', 'Mes Réclamations')

@section('content')

    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    
                    <!-- Title text -->
                    <h3>Mes Réclamations</h3>

                </div>

                <div class="col-md-2 text-right ">
            <div class="border p-2  ">
                <a class="nav-link" href="{{ route('reclamationscreate') }}">
                <i class="fa fa-pencil-square-o "> Ajouter une réclamation</i> 
                </a>
            </div>
        </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!-- page title -->

    <!-- Formulaire de création de réclamation -->
    <section class="section">
  
        <div class="container">
            <div class="row  justify-content-center">

                <div class="col-md-6">
                     <!-- Votre contenu de page ici -->
                        @if (count($reclamations) > 0)
                            <ul>
                            @foreach ($reclamations as $reclamation)
                                    <div class="card mb-3">
                                        <div class="card-body">
                                        <h4 class="card-title">{{$reclamation->created_at->format('d/m/Y H:i') }}</h4>
                                        <p class="card-title lead">{{$reclamation->description }}</p>

                                            <div class="reclamation-actions text-right">
                                            <form action="{{ route('reclamationsedit', $reclamation->id) }}" method="GET" class="d-inline">
                                                    <button type="submit">
                                                        <i class="fa fa-pencil"></i> 
                                                    </button>
                                                </form>
                                            <form action="{{ route('reclamation.destroy', $reclamation->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit">
                                                    <i class="fa fa-trash"></i> 
                                                </button>
                                            </form>


                                        </div>

                                        </div>
                                    </div>
                                @endforeach

                            </ul>
                        @else
                            <p>Aucune réclamation trouvée.</p>
                        @endif
                </div>
            </div>
        </div>
    </section>

@endsection
