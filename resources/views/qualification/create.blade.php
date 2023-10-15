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
                    <h3>Current Qualifications</h3>
                    @foreach ($freelancer->qualification as $qualification)
                        <h6 style="margin: 0">{{ $qualification->degree }} in
                            {{ $qualification->subject }}</h6>
                        <p style="margin: 0">{{ $qualification->start }} - {{ $qualification->end }}</p>
                        <p style="margin: 0">{{ $qualification->school }}</p>
                        <hr>
                    @endforeach
                </div>
            </div>
        </fieldset>
    </div>
    <div class="container">

        <form action="{{ route('qualification.store') }}" method="POST">
            @csrf
            <!-- Post Your ad start -->
            <fieldset class="border border-gary p-4 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Add New</h2>
                    </div>
                    <div class="col-lg-12">
                        <h6 class="font-weight-bold pt-4 pb-1">Institute:</h6>
                        <input type="text" name="school" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter Institute Name">
                        <h6 class="font-weight-bold pt-4 pb-1">Degree:</h6>
                        <input type="text" name="degree" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter Degree">
                        <h6 class="font-weight-bold pt-4 pb-1">Subject:</h6>
                        <input type="text" name="subject" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter Subject Name">
                        <h6 class="font-weight-bold pt-4 pb-1">Start:</h6>
                        <input type="date" name="start" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter Start Date">
                        <h6 class="font-weight-bold pt-4 pb-1">End:</h6>
                        <input type="date" name="end" class="border w-100 p-2 bg-white text-capitalize"
                            placeholder="Enter End Date (Leave Empty if ongoing)">
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
