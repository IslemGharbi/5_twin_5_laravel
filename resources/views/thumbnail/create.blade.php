@extends('layouts.freelancer_layout')

@section('title', 'Home')

@section('content')
<div class="container bg-gray py-5">
    <h1>{{ $gig->title }}</h1>
    <hr>
    <div class="row py-4">
        <div class="col-lg-6 mx-auto">
            <div class="product-slider">
                @foreach ($gig->thumbnail as $thumbnail)
                    <div class="product-slider-item my-4" data-image="{{ $thumbnail->url }}">
                        <img class="img-fluid w-100" src="{{ $thumbnail->url }}" alt="product-img">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="container bg-gray py-5">
    <div class="row py-4">
        <div class="col-lg-6 mx-auto">
            <h2>Upload Image</h2>
            <form action="{{ route('thumbnail.store') }} " method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="gig_id" value="{{ $gig->id }}">
                <!-- Upload image input-->
                <div class="input-group mb-3 px-2 py-2 rounded-pill bg-white shadow-sm">
                    <input id="upload" type="file" name="image" onchange="readURL(this);" class="form-control border-0">
                    <label id="upload-label" for="upload" class="font-weight-light text-muted">Choose file</label>
                    <div class="input-group-append">
                        <label for="upload" class="btn btn-light m-0 rounded-pill px-4"> <i
                                class="fa fa-cloud-upload mr-2 text-muted"></i><small
                                class="text-uppercase font-weight-bold text-muted">Choose file</small></label>
                    </div>
                </div>
                <div class="flex-random">
                    <input type="submit" class="btn btn-primary d-block mt-2" value="Add">
                    <a href="{{ route('gig.show', ['id' => $gig->id]) }}"
                        class="btn btn-primary d-block mt-2">Post</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var input = document.getElementById('upload');
    var infoArea = document.getElementById('upload-label');

    input.addEventListener('change', showFileName);

    function showFileName(event) {
        var input = event.srcElement;
        var fileName = input.files[0].name;
        infoArea.textContent = 'File name: ' + fileName;
        document.getElementById("upload-label").innerHTML = fileName;
        console.log(fileName);
    }
</script>
@endsection


{{-- <form action="{{ route('thumbnail.store') }} " method="POST" enctype="multipart/form-data">
    @csrf
    Image: <input type="file" name="image"><br>
    Gig: <input type="number" name="gig_id"><br>
    <input type="submit" value="Create">
</form> --}}
