@extends('layouts.freelancer_layout')

@section('title', 'Create')

@section('content')
<section class="bg-light py-5">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">{{ $freelancer->user->name }}</h1>
            <a href="{{ route('user.show', ['id' => $freelancer->user->id]) }}" class="btn btn-primary">Done</a>
        </div>
        <hr class="my-4">
    </div>

    <div class="container">
        <div class="border p-4 mb-5 bg-white">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="fw-bold mb-4">Current Qualifications</h4>
                    @foreach ($freelancer->qualification as $qualification)
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between align-items-center">
                                <div>
                                    <p class="mb-1">{{ $qualification->degree }} in {{ $qualification->subject }}</p>
                                    <p class="mb-1">{{ $qualification->start }} - {{ $qualification->end ? $qualification->end : 'Ongoing' }}</p>
                                    <p class="mb-1">{{ $qualification->school }}</p>
                                </div>
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('qualification.destroy', ['id' => $qualification->id]) }}" method="post" class="d-inline"
                                        onsubmit="return confirm('Are you sure you want to delete this qualification?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-link text-danger" onmouseover="this.style.color='red'" onmouseout="this.style.color=''">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                    <button class="btn btn-link text-info" onmouseover="this.style.color='red'" onmouseout="this.style.color=''" onclick="toggleEditForm('editForm_{{ $qualification->id }}')">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="editForm_{{ $qualification->id }}" style="display: none;">
                                <form action="{{ route('qualification.update', ['id' => $qualification->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="school" class="form-label">Institute:</label>
                                        <input type="text" name="school" class="form-control" value="{{ $qualification->school }}" required>
                                        @error('school')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="degree" class="form-label">Degree:</label>
                                        <input type="text" name="degree" class="form-control" value="{{ $qualification->degree }}" required>
                                        @error('degree')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="subject" class="form-label">Subject:</label>
                                        <input type="text" name="subject" class="form-control" value="{{ $qualification->subject }}" required>
                                        @error('subject')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="start" class="form-label">Start:</label>
                                        <input type="date" name="start" class="form-control" value="{{ $qualification->start }}" required>
                                        @error('start')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for "end" class="form-label">End:</label>
                                        <input type="date" name="end" class="form-control" value="{{ $qualification->end }}" required>
                                        @error('end')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" onclick="toggleEditForm('editForm_{{ $qualification->id }}')">Cancel</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('qualification.store') }}" method="POST" id="qualificationForm">
            @csrf
            <fieldset class="border p-4 mb-5 bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="fw-bold mb-4">Add New</h2>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            <label for="school" class="form-label">Institute:</label>
                            <input type="text" name="school" id="school" class="form-control" placeholder="Enter Institute Name" required>
                            @error('school')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="freelancer_id" value="{{ $freelancer->id }}">
                        </div>
                        <div class="mb-3">
                            <label for="degree" class="form-label">Degree:</label>
                            <input type="text" name="degree" id="degree" class="form-control" placeholder="Enter Degree" required>
                            @error('degree')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="subject" class="form-label">Subject:</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject Name" required>
                            @error('subject')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="start" class="form-label">Start:</label>
                            <input type="date" name="start" id="start" class="form-control" placeholder="Enter Start Date" required>
                            @error('start')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="end" class="form-label">End:</label>
                            <input type="date" name="end" id="end" class="form-control" placeholder="Enter End Date (Leave Empty if ongoing)" required>
                            @error('end')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Add Qualification</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</section>
<script>
    document.querySelector('form#qualificationForm').addEventListener('submit', function(event) {
        var schoolInput = document.querySelector('input[name="school"]');
        var degreeInput = document.querySelector('input[name="degree"]');
        var subjectInput = document.querySelector('input[name="subject"]');
        var startInput = document.querySelector('input[name="start"]');
        var endInput = document.querySelector('input[name="end"]');
        
        var schoolError = document.getElementById('schoolError');
        var degreeError = document.getElementById('degreeError');
        var subjectError = document.getElementById('subjectError');
        var startError = document.getElementById('startError');
        var endError = document.getElementById('endError');

        if (schoolInput.value.trim() === '') {
            schoolError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            schoolError.textContent = '';
        }

        if (degreeInput.value.trim() === '') {
            degreeError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            degreeError.textContent = '';
        }

        if (subjectInput.value.trim() === '') {
            subjectError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            subjectError.textContent = '';
        }

        if (startInput.value.trim() === '') {
            startError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            startError.textContent = '';
        }

        if (endInput.value.trim() === '') {
            endError.textContent = 'This field is required.';
            event.preventDefault();
        } else {
            endError.textContent = '';
        }
    });

    function toggleEditForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>
@endsection
