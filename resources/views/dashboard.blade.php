<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Categories') }}
        </h2>   
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Ajoutez le bouton "Gérer les reclamations" -->
                <a href="{{ route('reclamationsindexall') }}" class="btn btn-primary">Gérer les reclamations</a>
                
                
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <!-- ... Le reste de votre formulaire pour ajouter une catégorie ... -->
                </form>
            </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <!-- Ajoutez le bouton "Gérer les événements" -->
                <a href="{{ route('events.index') }}" class="btn btn-primary">Gérer les événements</a>
                
                <!-- Ajoutez le bouton "Gérer les tâches" -->
                <a href="{{ route('tasks.index') }}" class="btn btn-primary">Gérer les tâches</a>

                 <!-- Ajoutez le bouton "Voir les réservations" -->
                 <a href="{{ route('admin.reservations') }}" class="btn btn-primary">Voir les réservations</a>
                
                <form action="{{ route('category.store') }}" method="POST">
                    @csrf
                    <!-- ... Le reste de votre formulaire pour ajouter une catégorie ... -->
                </form>
            </div>
        </div>








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
        <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <div class="d-flex justify-content-between align-items-center">
                <h2 class="font-semibold text-xl text-gray-800">{{ $category->name }}</h2>
                <div>
                    <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


            @php
                $i = 1;
            @endphp
            <table class="table">
            @foreach ($category->sub_category as $sub_category)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $sub_category->name }}</td>
                    <td>
                        <a href="{{ route('subcategories.edit', ['subcategory' => $sub_category->id]) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('subcategories.destroy', ['subcategory' => $sub_category->id]) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </table>
        </div>
    </div>
</div>

        @endforeach
</x-app-layout>
