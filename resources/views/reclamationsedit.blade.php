@extends('layouts.freelancer_layout')

@section('title', 'Modifier une Réclamation')

@section('content')

    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>Modifier une Réclamation</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!-- page title -->

    <!-- Formulaire de modification de réclamation -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content p-4">
                        <h5>Modifier une Réclamation</h5>
                        <p class="pt-3 pb-5">Vous pouvez mettre à jour votre réclamation en remplissant le formulaire ci-dessous.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    @if (Session::has('message_updated'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message_updated') }}
                        </div>
                    @endif
                    <form action="{{ route('reclamations.update', $reclamation->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Utilisez la méthode PUT pour mettre à jour la réclamation existante -->

                        <fieldset class="p-4">
                            <div class="form-group">
                            <input type="text" name="description" id="description" class="form-control" value="{{ $reclamation->description }}" required>
                            </div>

                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary mt-2 float-right">METTRE À JOUR LA RÉCLAMATION</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
