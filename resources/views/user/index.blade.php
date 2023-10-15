@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
@foreach ($user as $user)
    <p>User: {{ $user->name }}</p>
    <table border='1'>
        <tr>
            <th>Title</th>
            <th>Title</th>
            <th>Freelancer</th>
        </tr>
        @foreach ($user->order as $order)
            <tr>
                <td>{{ $order->status }}</td>
                <td>{{ $order->gig->title }}</td>
                <td>{{ $order->freelancer->user->name }}</td>
            </tr>
        @endforeach
    </table>
@endforeach
@endsection
