<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Freelancer;

class SkillController extends Controller
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
        return view('skill.create',compact('freelancer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $skill = new Skill();
        $skill->name = $request->name;
        $skill->level = $request->level;
        $skill->freelancer_id = $request->freelancer_id;
        $skill->save();
        return redirect()->route('skill.create',['id'=>$request->freelancer_id]);
    }

   /**
 * Display the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    $skill = Skill::find($id);
    return view('skill.show', compact('skill'));
}

/**
 * Show the form for editing the specified resource.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function edit($id)
{
    $skill = Skill::find($id);
    return view('skill.edit', compact('skill'));
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
    $skill = Skill::find($id);
    $skill->name = $request->name;
    $skill->level = $request->level;
    $skill->save();
    return redirect()->route('skill.create', ['id' => $skill->freelancer_id]);
}

/**
 * Remove the specified resource from storage.
 *
 * @param  int  $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $skill = Skill::find($id);
    $freelancer_id = $skill->freelancer_id;
    $skill->delete();
    return redirect()->route('skill.create', ['id' => $freelancer_id]);
}

    
}
