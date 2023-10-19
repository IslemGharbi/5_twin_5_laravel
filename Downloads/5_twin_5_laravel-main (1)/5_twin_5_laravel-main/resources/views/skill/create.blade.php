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
                    <h4 class="fw-bold mb-4">Current Skills</h4>

                    @foreach ($freelancer->skill as $skill)
                        <div class="card mb-3">
                            <div class="card-body d-flex justify-content-between">
                                <div>
                                    <p class="mb-1">{{ $skill->name }}</p>
                                    <ul class="list-inline mb-0">
                                        @php
                                            $stars = ['Professional' => 5, 'Semi-Professional' => 4, 'Advance' => 3, 'Limited' => 2, 'Beginner' => 1];
                                        @endphp
                                        @for ($i = 0; $i < $stars[$skill->level]; $i++)
                                            <li class="list-inline-item"><i class="fa fa-star text-primary"></i></li>
                                        @endfor
                                        @for ($i = 0; $i < 5 - $stars[$skill->level]; $i++)
                                            <li class="list-inline-item"><i class="fa fa-star-o text-muted"></i></li>
                                        @endfor
                                    </ul>
                                </div>
                                <div class="d-flex">
                                <form action="{{ route('skill.destroy', ['id' => $skill->id]) }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this skill?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn text-muted me-2" onmouseover="this.style.color='red'" onmouseout="this.style.color=''">
        <i class="fa fa-trash"></i>
    </button>
</form>

                                    <button class="btn text-muted" onmouseover="this.style.color='red'" onmouseout="this.style.color=''" onclick="toggleEditForm('editForm_{{ $skill->id }}')">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" id="editForm_{{ $skill->id }}" style="display: none;">
                                <form action="{{ route('skill.update', ['id' => $skill->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Skill:</label>
                                        <input type="text" name="name" class="form-control" value="{{ $skill->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="level" class="form-label">Proficiency:</label>
                                        <select name="level" class="form-select">
                                            <option value="Beginner" {{ $skill->level == 'Beginner' ? 'selected' : '' }}>Beginner(1)</option>
                                            <option value="Limited" {{ $skill->level == 'Limited' ? 'selected' : '' }}>Limited(2)</option>
                                            <option value="Advance" {{ $skill->level == 'Advance' ? 'selected' : '' }}>Advance(3)</option>
                                            <option value="Semi-Professional" {{ $skill->level == 'Semi-Professional' ? 'selected' : '' }}>Semi-Professional(4)</option>
                                            <option value="Professional" {{ $skill->level == 'Professional' ? 'selected' : '' }}>Professional(5)</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <button type="button" class="btn btn-secondary" onclick="toggleEditForm('editForm_{{ $skill->id }}')">Cancel</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <form action="{{ route('skill.store') }}" method="POST">
            @csrf
            <fieldset class="border p-4 mb-5 bg-white">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="fw-bold mb-4">Add New</h2>
                    </div>
                    <div class="col-lg-12">
                    <div class="mb-3">
    <label for="name" class="form-label">Skill:</label>
    <input type="text" name="name" id="name" class="form-control" placeholder="Enter Skill">
    <input type="hidden" name="freelancer_id" value="{{ $freelancer->id }}">
    <div id="nameError" style="color: red;"></div>
</div>

<script>
    document.querySelector('form[action="{{ route('skill.store') }}"]').addEventListener('submit', function(event) {
        var nameInput = document.getElementById('name');
        var nameError = document.getElementById('nameError');

        if (nameInput.value.trim() === '') {
            nameError.textContent = 'Please enter a skill .';
            event.preventDefault(); // Prevent the form from submitting
        } else {
            nameError.textContent = ''; // Clear the error message
        }
    });
</script>


<div class="mb-3">
    <label for="level" class="form-label">Proficiency:</label>
    <select name="level" id="level" class="form-select">
        <option selected disabled>Select Proficiency</option>
        <option value="Beginner">Beginner(1)</option>
        <option value="Limited">Limited(2)</option>
        <option value="Advance">Advance(3)</option>
        <option value="Semi-Professional">Semi-Professional(4)</option>
        <option value="Professional">Professional(5)</option>
    </select>
    <div id="levelError" style="color: red;"></div>
</div>

<script>
    document.querySelector('form[action="{{ route('skill.store') }}"]').addEventListener('submit', function(event) {
        var levelSelect = document.getElementById('level');
        var levelError = document.getElementById('levelError');

        if (levelSelect.value === 'Select Proficiency') {
            levelError.textContent = 'Please select a proficiency level.';
            event.preventDefault(); // Prevent the form from submitting
        } else {
            levelError.textContent = ''; // Clear the error message
        }
    });
</script>

                    </div>
                </div>
            </fieldset>
            <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
        </form>
    </div>

</section>

<script>
    function toggleEditForm(formId) {
        var form = document.getElementById(formId);
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    }
</script>

@endsection
