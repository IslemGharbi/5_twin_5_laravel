@extends('layouts.freelancer_layout')

@section('title', 'Edit Gig')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Edit Gig</h1>
                <form action="{{ route('gig.update', ['id' => $gig->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" name="title" class="form-control" value="{{ $gig->title }}">
                    </div>

                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea name="description" class="form-control">{{ $gig->description }}</textarea>
                    </div>
                    <input type="hidden" name="freelancer_id" value="{{ $gig->freelancer_id }}">
    

                    <div class="form-group">
                        <label for="category_id">Category:</label>
                        <select name="category_id" class="form-control">
                        @foreach ($category as $category)

                                <option value="{{ $category->id }}" {{ $category->id == $gig->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
    <label for="sub_category_id">Sub Category:</label>
    <select name="sub_category_id" class="form-control">
        @foreach ($sub_category as $subCategory)
            <option value="{{ $subCategory->id }}" {{ $subCategory->id == $gig->sub_category_id ? 'selected' : '' }}>
                {{ $subCategory->name }}
            </option>
        @endforeach
    </select>
</div>

                    <!-- Add other fields as needed for your gig editing form -->

                    <div class="form-group">
    <label for="thumbnail">Thumbnail Image:</label>
    <input type="file" name="thumbnail" class="form-control-file">
</div>


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Update Gig</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
