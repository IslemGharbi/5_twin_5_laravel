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
                            <div class="card mb-3 " style="border: 1px solid #000;">
                                <div class="card-body ">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="card-title">{{$reclamation->created_at->format('d/m/Y H:i') }}</p>
                                            <h2 class="card-title lead"><strong>{{$reclamation->user->name }}</strong></h2>
                                            <h1 class="card-body lead">{{$reclamation->description }}</h1>
                                        </div>
                                       
                                    </div>

                                    <div class="reclamation-actions text-right">
                   
                                        <form action="{{ route('reclamationsedit', $reclamation->id) }}" method="GET" class="d-inline">
                                            <button type="submit"  style="background-color: #2c75ff ; color: white;">
                                                <i class="fa fa-pencil" > modifier</i> 
                                            </button>
                                        </form>
                                        <form action="{{ route('reclamation.destroy', $reclamation->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  style="background-color: #2c75ff ; color: white;">
                                                <i class="fa fa-trash"> supprimer</i> 
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3"  >
                                <div class="card-body ">
                                @if ($reclamation->reponses->count() > 0)
                                    <h3>Réponses:</h3>
                                    <ul>
                                        @foreach ($reclamation->reponses as $response)
                                        <li class="card" >                                       
                                                <div class="card-body">{{ $response->content }}</div>
                                        </li>
                                        <br>

                                        @endforeach
                                    </ul>
                                @else
                                    <p>Aucune réponse trouvée.</p>
                                @endif
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


