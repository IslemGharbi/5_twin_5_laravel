@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
<div>
    <form action="{{ route('freelancer.store') }} " method="POST">
        @csrf

        Experience: <input type="text" name="experience"><br>
        Rating: <input type="number" name="rating"><br>
        Available: <input type="text" name="available"><br>
        User: <input type="number" name="user_id"><br>

        <input type="submit" value="Create">
    </form>


    <br>
</div>
@endsection
