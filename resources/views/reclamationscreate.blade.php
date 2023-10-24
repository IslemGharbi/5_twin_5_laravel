@extends('layouts.freelancer_layout')

@section('title', 'Créer une Réclamation')

@section('content')

    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>Créer une Réclamation</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!-- page title -->

    <!-- Formulaire de création de réclamation -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content p-4">
                        <h5>Créer une Réclamation</h5>
                        <!-- <h1 class="pt-3">votre réclamation </h1> -->
                        <p class="pt-3 pb-5">Nous sommes là pour vous aider. Remplissez le formulaire ci-dessous pour créer votre réclamation.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    @if (Session::has('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message_sent') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('reclamations.store') }}" method="POST">
                        @csrf
                        <fieldset class="p-4">
                            <div class="form-group">
                                <label for="description">Description de la Réclamation :</label>
                                <textarea name="description" id="description" placeholder="Saisissez votre réclamation ici..."
                                    class="form-control" required></textarea>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary mt-2 float-right">ENREGISTRER LA RÉCLAMATION</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
