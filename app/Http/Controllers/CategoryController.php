<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $category2 = Category::all();
        $sub_category = SubCategory::all();
        if(Auth::user()->email == 'admin@email.com'){
            return view('dashboard', compact('category','category2','sub_category'));
        }else{            
            return redirect()->route('gig.list');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
/**
 * Show the form for creating a new resource.
 *
 * @return \Illuminate\Http\Response
 */
public function create()
{
    // This method should display a form for creating a new category.
    return view('categories.create');
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    // This method should display a form for editing an existing category.
    $category = Category::find($id);
    
    if (!$category) {
        return redirect()->route('dashboard')->with('error', 'Category not found.');
    }

    return view('categories.edit', compact('category'));
}

/**
 * Update the specified resource in storage.
 *
 * @param  \Illuminate\Http\Request  $request
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    // This method should handle the update of an existing category.
    $category = Category::find($id);

    if (!$category) {
        return redirect()->route('dashboard')->with('error', 'Category not found.');
    }

    $category->name = $request->name;
    $category->save();

    return redirect()->route('dashboard')->with('success', 'Category updated successfully.');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    // This method should handle the deletion of a category.
    $category = Category::find($id);

    if (!$category) {
        return redirect()->route('dashboard')->with('error', 'Category not found.');
    }

    $category->delete();

    return redirect()->route('dashboard')->with('success', 'Category deleted successfully.');
}

}
