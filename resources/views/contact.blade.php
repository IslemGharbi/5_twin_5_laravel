@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')

    <section class="page-title">
        <!-- Container Start -->
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2 text-center">
                    <!-- Title text -->
                    <h3>Contact Us</h3>
                </div>
            </div>
        </div>
        <!-- Container End -->
    </section>
    <!-- page title -->

    <!-- contact us start-->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="contact-us-content p-4">
                        <h5>Contact Us</h5>
                        <h1 class="pt-3">Hello, what's on your mind?</h1>
                        <p class="pt-3 pb-5">Want to get in touch? We'd love to hear from you. Fill up the form to reach
                            us...</p>
                    </div>
                </div>
                <div class="col-md-6">
                    @if (Session::has('message_sent'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('message_sent') }}
                        </div>
                    @endif
                    <form action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <fieldset class="p-4">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6 py-2">
                                        <input type="text" name="name" placeholder="Name *" class="form-control" required>
                                    </div>
                                    <div class="col-lg-6 pt-2">
                                        <input type="email" name="email" placeholder="Email *" class="form-control"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <textarea name="message" id="" name="message" placeholder="Message *"
                                class="border w-100 p-3 mt-3 mt-lg-4"></textarea>
                            <div class="btn-grounp">
                                <button type="submit" class="btn btn-primary mt-2 float-right">SUBMIT</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
