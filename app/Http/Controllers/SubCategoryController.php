<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function index()
    {
        // You can retrieve a list of subcategories here and return a view to display them.
        $subCategories = SubCategory::all();
        return view('subcategories.index', compact('subCategories'));
    }

    public function create()
    {
        // You can return a view to create a new subcategory here.
        return view('subcategories.create');
    }

    public function store(Request $request)
    {
        $sub_category = new SubCategory();
        $sub_category->name = $request->name;
        $sub_category->category_id = $request->category_id;
        $sub_category->save();
        return redirect()->route('dashboard');
    }

    public function show($id)
    {
        // You can retrieve and display a specific subcategory here.
        $subCategory = SubCategory::find($id);
        return view('subcategories.show', compact('subCategory'));
    }

    public function edit($id)
    {
        $subCategory = SubCategory::find($id);
        $categories = Category::all(); // Vous devrez peut-être récupérer les catégories pour le formulaire d'édition.
        return view('subcategories.edit', compact('subCategory', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $subCategory = SubCategory::find($id);
    
        $request->validate([
            'name' => 'required',
            'category_id' => 'required',
        ]);
    
        $subCategory->name = $request->name;
        $subCategory->category_id = $request->category_id;
        $subCategory->save();
    
        return redirect()->route('dashboard');
    }
    public function destroy($id)
    {
        $subCategory = SubCategory::find($id);

        if (!$subCategory) {
            return redirect()->route('dashboard')->with('error', 'Subcategory not found.');
        }

        $subCategory->delete();

        return redirect()->route('dashboard')->with('success', 'Subcategory deleted successfully.');
    }
}
