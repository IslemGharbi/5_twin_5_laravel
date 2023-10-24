@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')

<section class=" bg-gray py-5">
    <div class="container">
        <div class="flex-random">
            <h1>{{ $freelancer->user->name }}</h1>
            <a href="{{ route('user.show', ['id' => $freelancer->user->id]) }}"
                class="btn btn-primary d-block mt-2">Done</a>
        </div>
        <hr>
    </div>

    <div class="container">
        <fieldset class="border border-gary p-4 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Employment History</h3>
                    @foreach ($freelancer->employment as $employment)
                        <h6 style="margin: 0">{{ $employment->title }} as
                            {{ $employment->status }}</h6>
                        <p style="margin: 0">{{ $employment->period }}</p>
                        <p style="margin: 0">{{ $employment->company }}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </fieldset>
    </div>
    <div class="container">

        <form action="{{ route('employment.store') }}" method="POST">
            @csrf
            <!-- Post Your ad start -->
            <fieldset class="border border-gary p-4 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Add New</h2>
                    </div>
                    <div class="col-lg-12">
                        <h6 class="font-weight-bold pt-4 pb-1">Company:</h6>
                        <input type="text" name="company" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter Company Name">
                        <h6 class="font-weight-bold pt-4 pb-1">Title:</h6>
                        <input type="text" name="title" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter Title">
                        <h6 class="font-weight-bold pt-4 pb-1">Period:</h6>
                        <input type="text" name="period" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter work period in years">
                        <h6 class="font-weight-bold pt-4 pb-1">Status:</h6>
                        <input type="text" name="status" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter Status">
                        <input type="hidden" name="freelancer_id" class="border w-100 p-2 bg-white text-capitalize"
                            value="{{ $freelancer->id }}">
                    </div>

                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
        </form>
    </div>
</section>

@endsection
