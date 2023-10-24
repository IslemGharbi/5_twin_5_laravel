<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Freelancer;
use Validator;

class LanguageController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $freelancer = Freelancer::find($id);
        return view('language.create', compact('freelancer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Define validation rules
        $rules = [
            'name' => 'required',
            'level' => 'required',
        ];

        // Create a validator with the rules
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $language = new Language();
        $language->name = $request->name;
        $language->level = $request->level;
        $language->freelancer_id = $request->freelancer_id;
        $language->save();
        return redirect()->route('language.create', ['id' => $request->freelancer_id]);
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
        // Define validation rules
        $rules = [
            'name' => 'required',
            'level' => 'required',
        ];

        // Create a validator with the rules
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $language = Language::find($id);
        $language->name = $request->name;
        $language->level = $request->level;
        $language->save();
        return redirect()->route('language.create', ['id' => $language->freelancer_id]);
    }
}