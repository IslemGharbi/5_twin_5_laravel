@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')

<section class=" bg-gray py-5">
    <div class="container">
        <div class="row flex-random">
            <div>
                <h1>{{ $order->gig->title }}</h1>
            </div>
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
                    <textarea style="display:none;" name="description">{{ $order->description }}</textarea>
                    <button type="submit" class="btn btn-danger d-block mt-2">Cancel Order</button>
                </form>
            </div>
        </div>
        <br>
        <form action="{{ route('order.update', ['id' => $order->id]) }}" method="POST">
            @method('PUT')
            @csrf
            <!-- Post Your ad start -->
            <fieldset class="border border-gary p-4 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Add New</h2>
                    </div>
                    <div class="col-lg-12">
                        <input type="hidden" name="status" class="border w-100 p-2 bg-white text-capitalize"
                            value="Ordered">
                        <input type="hidden" name="gig_id" class="border w-100 p-2 bg-white text-capitalize"
                            value="{{ $order->gig->id }}">
                        <input type="hidden" name="option_id" class="border w-100 p-2 bg-white text-capitalize"
                            value="{{ $order->option->id }}">
                        <input type="hidden" name="freelancer_id" class="border w-100 p-2 bg-white text-capitalize"
                            value="{{ $order->freelancer->id }}">
                        <input type="hidden" name="user_id" class="border w-100 p-2 bg-white text-capitalize"
                            value="{{ $order->user->id }}">
                        <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                        <textarea name="description" id="text-editor" class="border p-3 w-100" rows="7"
                            placeholder="Write details about your gig option">{{ $order->description }}</textarea>
                        <h6 class="font-weight-bold pt-4 pb-1">Deadline:</h6>
                        <input type="datetime-local" name="deadline"
                            value="{{ date('Y-m-d\TH:i', strtotime($order->deadline)) }}"
                            class="border w-100 p-2 bg-white text-capitalize">
                    </div>

                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
        </form>
    </div>
</section>



@endsection
