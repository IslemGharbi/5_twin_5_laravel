@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')

<section class="bg-gray py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>{{ $freelancer->user->name }}</h1>
            <a href="{{ route('user.show', ['id' => $freelancer->user->id]) }}" class="btn btn-primary">Done</a>
        </div>
        <hr class="my-4">
    </div>

    <div class="container">
        <fieldset class="border border-gray p-4 mb-5">
            <div class="row">
                <div class="col-lg-12">
                    <h3>Employment History</h3>
                    @foreach ($freelancer->employment as $employment)
                        <h6 style="margin: 0">{{ $employment->title }} as {{ $employment->status }}</h6>
                        <p style="margin: 0">{{ $employment->period }}</p>
                        <p style="margin: 0">{{ $employment->company }}</p>
                        <form action="{{ route('employment.destroy', ['id' => $employment->id]) }}" method="post" class="d-inline"
                            onsubmit="return confirm('Are you sure you want to delete this employment?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger" onmouseover="this.style.color='red'"
                                onmouseout="this.style.color=''">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                        <button class="btn btn-link text-info" onmouseover="this.style.color='red'"
                            onmouseout="this.style.color=''" onclick="toggleEditForm('editForm_{{ $employment->id }}')">
                            <i class="fa fa-pencil"></i>
                        </button>
                        <div id="editForm_{{ $employment->id }}" style="display: none;">
                            <form action="{{ route('employment.update', ['id' => $employment->id]) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mb-3">
                                    <label for="company" class="form-label">Company:</label>
                                    <input type="text" name="company" class="form-control"
                                        value="{{ $employment->company }}" required>
                                    @error('company')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title:</label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $employment->title }}" required>
                                    @error('title')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="period" class="form-label">Period:</label>
                                    <input type="text" name="period" class="form-control"
                                        value="{{ $employment->period }}" required >
                                    @error('period')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status:</label>
                                    <input type="text" name="status" class="form-control"
                                        value="{{ $employment->status }}" required>
                                    @error('status')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-secondary"
                                    onclick="toggleEditForm('editForm_{{ $employment->id }}')">Cancel</button>
                            </form>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </fieldset>
    </div>

    <div class="container">
        <form action="{{ route('employment.store') }}" method="POST">
            @csrf
            <fieldset class="border border-gray p-4 mb-5">
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Add New</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="company" class="form-label">Company:</label>
                            <input type="text" name="company" class="form-control" placeholder="Enter Company Name"
                                required>
                            @error('company')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="title" class="form-label">Title:</label>
                            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="period" class="form-label">Period:</label>
                            <input type="text" name="period" class="form-control" placeholder="Enter work period in years"
                                required>
                            @error('period')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <input type="text" name="status" class="form-control" placeholder="Enter Status" required>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <input type="hidden" name="freelancer_id" value="{{ $freelancer->id }}">
                        <button type="submit" class="btn btn-success">Add Employment</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<script>
    document.querySelector('form#qualificationForm').addEventListener('submit', function(event) {
        var companyInput = document.querySelector('input[name="company"]');
        var titleInput = document.querySelector('input[name="title"]');
        var periodInput = document.querySelector('input[name="period"]');
        var statusInput = document.querySelector('input[name="status"]');

        var companyError = document.getElementById('companyError');
        var titleError = document.getElementById('titleError');
        var periodError = document.getElementById('periodError');
        var statusError = document.getElementById('statusError');

        if (companyInput.value.trim() === '') {
            companyError.textContent = 'Company field is required.';
            event.preventDefault();
        } else {
            companyError.textContent = '';
        }

        if (titleInput.value.trim() === '') {
            titleError.textContent = 'Title field is required.';
            event.preventDefault();
        } else {
            titleError.textContent = '';
        }

        if (periodInput.value.trim() === '') {
            periodError.textContent = 'Period field is required.';
            event.preventDefault();
        } else {
            periodError.textContent = '';
        }

        if (statusInput.value.trim() === '') {
            statusError.textContent = 'Status field is required.';
            event.preventDefault();
        } else {
            statusError.textContent = '';
        }
    });

    function toggleEditForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endsection
