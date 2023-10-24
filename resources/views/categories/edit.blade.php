<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('categories.update', $category->id) }}" method="POST" class="p-4">
                    @csrf
                    @method('PUT') <!-- Use the PUT method for updating -->
                    <h2 class="font-weight-bold pb-4">Edit Category</h2>
                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" value="{{ $category->name }}" class="form-control">
                    </div>
                    <!-- Add any additional fields for category editing if needed -->
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
