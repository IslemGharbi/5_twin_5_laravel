<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <!-- Post Your ad start -->
                    <fieldset class="border border-gary p-4 mb-5">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Add New Category</h2>
                            </div>
                            <div class="col-lg-12">
                                <h6 class="font-weight-bold pt-4 pb-1">Name:</h6>
                                <input type="text" name="name" class="border w-100 p-2 bg-white text-capitalize"
                                    placeholder="Enter Category">
                                <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <form action="{{ route('sub_category.store') }}" method="POST">
                        @csrf
                        <!-- Post Your ad start -->
                        <fieldset class="border border-gary p-4 mb-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h2>Add New Sub Category</h2>
                                </div>
                                <div class="col-lg-12">
                                    <h6 class="font-weight-bold pt-4 pb-1">Name:</h6>
                                    <input type="text" name="name" class="border w-100 p-2 bg-white text-capitalize"
                                        placeholder="Enter Sub Category">
                                    <h6 class="font-weight-bold pt-4 pb-1">Category:</h6>
                                    <select name="category_id" id="inputGroupSelect" class="w-100">
                                        <option selected="true" disabled="disabled">Select Category </option>
                                        @foreach ($category as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type="submit" class="btn btn-primary d-block mt-2">Post</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>

        @foreach ($category2 as $category)
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $category->name }}
                        </h2>
                        @php
                            $i = 1;
                        @endphp
                        <table class="table">
                            @foreach ($category->sub_category as $sub_category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $sub_category->name }}</td>
                                    <td>Edit Delete</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
</x-app-layout>
