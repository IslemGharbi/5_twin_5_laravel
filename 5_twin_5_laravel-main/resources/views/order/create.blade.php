@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')

    <section class=" bg-gray py-5">
        <div class="container">

            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h2>Add New Order</h2>
                        </div>
                        <div class="col-lg-12">
                            <input type="hidden" name="status" class="border w-100 p-2 bg-white text-capitalize"
                                value="Ordered">
                            <input type="hidden" name="gig_id" class="border w-100 p-2 bg-white text-capitalize"
                                value="{{ $option->gig->id }}">
                            <input type="hidden" name="option_id" class="border w-100 p-2 bg-white text-capitalize"
                                value="{{ $option->id }}">
                            <input type="hidden" name="freelancer_id" class="border w-100 p-2 bg-white text-capitalize"
                                value="{{ $option->gig->freelancer->id }}">
                            <input type="hidden" name="user_id" class="border w-100 p-2 bg-white text-capitalize"
                                value="{{ Auth::user()->id }}">
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" id="text-editor" class="border p-3 w-100" rows="7"
                                placeholder="Write details about your order requirements"></textarea>
                            <h6 class="font-weight-bold pt-4 pb-1">Deadline:</h6>
                            <input type="datetime-local" name="deadline" class="border w-100 p-2 bg-white text-capitalize">
                        </div>

                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
            </form>
        </div>
    </section>

@endsection
