@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')

    <section class=" bg-gray py-5">
        <div class="container">
            <div class="flex-random">
                <h1>{{ $gig->title }}</h1>
                <a href="{{ route('thumbnail.create', ['id' => $gig->id]) }}" class="btn btn-primary d-block mt-2">Next</a>
            </div>
            <hr>
            <div class="row">
                @foreach ($gig->option as $option)
                    <div class="col-lg-4 col-md-6">
                        <div class="package-content bg-light border text-center p-5 my-2 my-lg-0">
                            <div class="package-content-heading border-bottom">
                                <i class="fa fa-paper-plane"></i>
                                <h2>{{ $option->name }}</h2>
                                <h4 class="py-3"> <span>${{ $option->price }}</span></h4>
                            </div>
                            <p>{!! $option->description !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <hr>
        </div>

        <div class="container">

            <form action="{{ route('option.store') }}" method="POST">
                @csrf
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Add New</h2>
                        </div>
                        <div class="col-lg-12">
                            <h6 class="font-weight-bold pt-4 pb-1">Option Title:</h6>
                            <input type="text" name="name" class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="Enter Option Title">
                            <input type="hidden" name="gig_id" class="border w-100 p-2 bg-white text-capitalize"
                                value="{{ $gig->id }}">
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" id="text-editor" class="border p-3 w-100" rows="7"
                                placeholder="Write details about your gig option"></textarea>
                            <h6 class="font-weight-bold pt-4 pb-1">Price:</h6>
                            <input type="text" name="price" class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="Enter Option Price">
                        </div>

                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
            </form>
        </div>
    </section>

@endsection
