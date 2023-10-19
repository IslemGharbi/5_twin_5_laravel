<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Freelancer;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $freelancer = Freelancer::find($id);
        return view('language.create',compact('freelancer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $language = new Language();
        $language->name = $request->name;
        $language->level = $request->level;
        $language->freelancer_id = $request->freelancer_id;
        $language->save();
        return redirect()->route('language.create',['id'=>$request->freelancer_id]);
    }

   /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $language = Language::find($id);
    return view('language.show', compact('language'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $language = Language::find($id);
    return view('language.edit', compact('language'));
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
    $language = Language::find($id);
    $language->name = $request->name;
    $language->level = $request->level;
    $language->save();
    return redirect()->route('language.create', ['id' => $language->freelancer_id]);
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $language = Language::find($id);
    $freelancer_id = $language->freelancer_id;
    $language->delete();
    return redirect()->route('language.create', ['id' => $freelancer_id]);
}

    
}
