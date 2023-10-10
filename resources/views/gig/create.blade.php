@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')

    <section class=" bg-gray py-5">
        <div class="container">
            <form action="{{ route('gig.store') }}" method="POST">
                @csrf
                <!-- Post Your ad start -->
                <fieldset class="border border-gary p-4 mb-5">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Post Your Gig</h3>
                        </div>
                        <div class="col-lg-12">
                            <h6 class="font-weight-bold pt-4 pb-1">Title Of Gig:</h6>
                            <input type="text" name="title" class="border w-100 p-2 bg-white text-capitalize"
                                placeholder="Enter Gig Title">
                            <input type="hidden" name="freelancer_id" class="border w-100 p-2 bg-white text-capitalize"
                                value="{{ Auth::user()->id }}">
                            <h6 class="font-weight-bold pt-4 pb-1">Description:</h6>
                            <textarea name="description" id="text-editor" class="border p-3 w-100" rows="7"
                                placeholder="Write details about your gig"></textarea>
                        </div>
                        <div class="col-lg-12">
                            <h6 class="font-weight-bold pt-4 pb-1">Select Gig Category:</h6>
                            <select name="category_id" id="inputGroupSelect" class="w-100">
                                <option selected="true" disabled="disabled">Select category</option>
                                @foreach ($category as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            <h6 class="font-weight-bold pt-4 pb-1">Select Gig Sub Category:</h6>
                            <select name="sub_category_id" id="inputGroupSelect" class="w-100 ignore select2 form-control"
                                style="height: 15px">
                                <option selected="true" disabled="disabled">Select category</option>
                                @foreach ($sub_category as $sub_category)
                                    <option value="{{ $sub_category->id }}">{{ $sub_category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary d-block mt-2">Next</button>
            </form>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            $('select:not(.ignore)').niceSelect();
            FastClick.attach(document.body);
        });
    </script>

@endsection
