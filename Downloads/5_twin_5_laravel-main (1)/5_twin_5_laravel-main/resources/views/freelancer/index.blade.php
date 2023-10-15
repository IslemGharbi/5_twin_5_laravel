@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Phone</th>
            <th>DOB</th>
            <th>Experience</th>
            <th>Rating</th>
            <th>Available</th>
            <th>Action</th>
        </tr>
        @foreach ($freelancer as $freelancer)
            <tr>
                <td>{{ $freelancer->user->name }}</td>
                <td>{{ $freelancer->user->email }}</td>
                <td>{{ $freelancer->user->gender }}</td>
                <td>{{ $freelancer->user->phone }}</td>
                <td>{{ $freelancer->user->dob }}</td>
                <td>{{ $freelancer->experience }}</td>
                <td>{{ $freelancer->rating }}</td>
                <td>{{ $freelancer->available }}</td>
                <td><a href="{{ route('freelancer.show', ['id' => $freelancer->id]) }}">View
                        Detail</a>
                    <a href="{{ route('freelancer.edit', ['id' => $freelancer->id]) }}">Edit</a>
                    <a href="{{ route('freelancer.delete', ['id' => $freelancer->id]) }}">Delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
