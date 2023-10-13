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
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="card-title">{{$reclamation->created_at->format('d/m/Y H:i') }}</p>
                                            <h1 class="card-body lead">{{$reclamation->description }}</h1>
                                        </div>
                                       
                                    </div>

                                    <div class="reclamation-actions text-right">
                                        <button><i class="fa fa-caret-down" aria-hidden="true"></i>  Réponses</button>

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


                                    <!-- <form action="" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <textarea name="comment_text" placeholder="Ajouter une reponse..." class="form-control"></textarea>
                                                <button type="submit" class="float-right"><i class="fa fa-plus-square" aria-hidden="true"> repondre</i></button>

                                            </div>
                                        </form> -->
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
