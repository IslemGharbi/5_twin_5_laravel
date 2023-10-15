@extends('layouts.freelancer_layout')

@section('title', 'Modifier une Réponse')

@section('content')

    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>Modifier une Réponse</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!-- page title -->

    <!-- Formulaire de modification de la réponse -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content p-4">
                        <h5>Modifier une Réponse</h5>
                        <p class="pt-3 pb-5"> Utilisez le formulaire ci-dessous pour modifier la réponse.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    @if (Session::has('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message_sent') }}
                        </div>
                    @endif
                    <form action="{{ route('reponses.update', ['Reclamationid' => $reclamation->id, 'id' => $reponse->id]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <fieldset class="p-4">
                            <div class="form-group">
                                <label for="content">Réponse à la Réclamation :</label>
                                <textarea name="content" id="content" class="form-control" required>{{ $reponse->content }}</textarea>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary mt-2 float-right">ENREGISTRER LA MODIFICATION</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
