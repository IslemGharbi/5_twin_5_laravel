@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
    <section class="section bg-gray">
        <div class="container">
            <div class="flex-random">
                <h1>{{ $order->gig->title }}</h1><br>
                <div>
                    <a href="{{ route('gig.list') }}" class="btn btn-primary d-block mt-2">Done</a>
                </div>
            </div>
            <h2>Gig type:{{ $order->option->name }}</h2>
            <p>{{ $order->status }}</p>
            <p>{{ $order->deadline }}</p>
            <hr>
            <h3>Description</h3>
            <p>{!! $order->description !!}</p>

            <div class="flex-random">
                @if (Auth::user()->id == $order->user_id)
                    @if ($order->status == 'Ordered' && $order->status != 'Cancelled')
                        <a href="{{ route('order.edit', ['id' => $order->id]) }}"
                            class="btn btn-primary d-block mt-2">Edit</a>
                        <div>
                            <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value="Cancelled">
                                <input type="hidden" name="gig_id" value="{{ $order->gig->id }}">
                                <input type="hidden" name="option_id" value="{{ $order->option->id }}">
                                <input type="hidden" name="freelancer_id" value="{{ $order->freelancer->id }}">
                                <input type="hidden" name="user_id" value="{{ $order->user->id }}">
                                <input type="hidden" name="deadline" value="{{ $order->deadline }}">
                                <textarea style="display:none;" name="description">{!! $order->description !!}</textarea>
                                <button type="submit" class="btn btn-danger d-block mt-2">Cancel Order</button>
                            </form>
                        </div>
                    @endif
                @else
                    @if ($order->status == 'Ordered' && $order->status != 'Cancelled')
                        <div>
                            <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value="Accepted">
                                <input type="hidden" name="gig_id" value="{{ $order->gig->id }}">
                                <input type="hidden" name="option_id" value="{{ $order->option->id }}">
                                <input type="hidden" name="freelancer_id" value="{{ $order->freelancer->id }}">
                                <input type="hidden" name="user_id" value="{{ $order->user->id }}">
                                <input type="hidden" name="deadline" value="{{ $order->deadline }}">
                                <textarea style="display:none;" name="description">{{ $order->description }}</textarea>
                                <button type="submit" class="btn btn-success d-block mt-2">Accept Order</button>
                            </form>
                        </div>
                        <div>
                            <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value="Declined">
                                <input type="hidden" name="gig_id" value="{{ $order->gig->id }}">
                                <input type="hidden" name="option_id" value="{{ $order->option->id }}">
                                <input type="hidden" name="freelancer_id" value="{{ $order->freelancer->id }}">
                                <input type="hidden" name="user_id" value="{{ $order->user->id }}">
                                <input type="hidden" name="deadline" value="{{ $order->deadline }}">
                                <textarea style="display:none;" name="description">{{ $order->description }}</textarea>
                                <button type="submit" class="btn btn-danger d-block mt-2">Decline Order</button>
                            </form>
                        </div>
                    @endif

                    @if ($order->status == 'Accepted')
                        <div>
                            <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" name="status" value="Completed">
                                <input type="hidden" name="gig_id" value="{{ $order->gig->id }}">
                                <input type="hidden" name="option_id" value="{{ $order->option->id }}">
                                <input type="hidden" name="freelancer_id" value="{{ $order->freelancer->id }}">
                                <input type="hidden" name="user_id" value="{{ $order->user->id }}">
                                <input type="hidden" name="deadline" value="{{ $order->deadline }}">
                                <textarea style="display:none;" name="description">{{ $order->description }}</textarea>
                                <button type="submit" class="btn btn-warning d-block mt-2">Mark Completed</button>
                            </form>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    </section>

@endsection
