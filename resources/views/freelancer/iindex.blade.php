@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
    <div>
        <p>Name : {{ $freelancer->user->name }}</p>
        <p>Email : {{ $freelancer->user->email }}</p>
        <p>Gender : {{ $freelancer->user->gender }}</p>
        <p>Phone : {{ $freelancer->user->phone }}</p>
        <p>DOB : {{ $freelancer->user->dob }}</p>
        <p>Experience : {{ $freelancer->experience }}</p>
        <p>Rating : {{ $freelancer->rating }}</p>
        <p>Available : {{ $freelancer->available }}</p>
        <br>
        <p>Qualification: </p>
        @foreach ($freelancer->qualification as $qualification)
            <p>
                Institiute: {{ $qualification->school }}
            </p>
            <p>
                Start: {{ $qualification->start }}
            </p>
            <p>
                End :{{ $qualification->end }}
            </p>
            <p>
                Degree: {{ $qualification->degree }}
            </p>
            <p>
                Subject: {{ $qualification->subject }}
            </p>
        @endforeach
        <br>

        <p>Employments</p>
        @foreach ($freelancer->employment as $employment)
            <p>
                Company: {{ $employment->company }}
            </p>
            <p>
                Title: {{ $employment->title }}
            </p>
            <p>
                Period :{{ $employment->period }}
            </p>
            <p>
                Status: {{ $employment->status }}
            </p>
        @endforeach
        <br>

        <p>Languages</p>
        @foreach ($freelancer->language as $language)
            <p>
                Name: {{ $language->name }}
            </p>
            <p>
                Profficiency: {{ $language->level }}
            </p>
        @endforeach
        <br>

        <p>Skills</p>
        @foreach ($freelancer->skill as $skill)
            <p>
                Name: {{ $skill->name }}
            </p>
            <p>
                Profficiency: {{ $skill->level }}
            </p>
        @endforeach
        <br>

        <p>Gigs</p>
        @foreach ($freelancer->gig as $gig)
            <p>
                Name: {{ $gig->title }}
            </p>
            <p>
                About: {{ $gig->description }}
            </p>
        @endforeach
    </div>
@endsection
