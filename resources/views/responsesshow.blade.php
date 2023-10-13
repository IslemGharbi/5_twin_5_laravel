@extends('layouts.freelancer_layout')

@section('title', 'Réponses à la Réclamation')

@section('content')
    <section class="page-title">
        <!-- Your page title content here -->
    </section>

    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    @if (count($responses) > 0)
                        <ul>
                            @foreach ($responses as $response)
                                <div class="card mb-3">
                                    <div class="card-body">
                                           <p class="card-title">{{$response->created_at->format('d/m/Y H:i') }}</p>
                                            <h1 class="card-body lead">{{$response->content }}</h1>
                                    </div>
                                    <div class="reclamation-actions text-right">
                                     
                                        <form action="" method="GET" class="d-inline">
                                            <button type="submit">
                                                <i class="fa fa-pencil"></i> 
                                            </button>
                                        </form>
                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">
                                                <i class="fa fa-trash"></i> 
                                            </button>
                                        </form>

                                    </div>
                                  
                                </div>
                            @endforeach
                        </ul>
                    @else
                        <p>Aucune réponse trouvée.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
