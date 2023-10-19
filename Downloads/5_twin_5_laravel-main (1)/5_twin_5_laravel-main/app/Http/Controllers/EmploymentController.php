<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Employment;
use App\Models\Freelancer;

class EmploymentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $freelancer = Freelancer::find($id);
        $employments = Employment::where('freelancer_id', $id)->get();
        return view('employment.create', compact('freelancer', 'employments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employment = new Employment();
        $employment->company = $request->company;
        $employment->period = $request->period;
        $employment->title = $request->title;
        $employment->status = $request->status;
        $employment->freelancer_id = $request->freelancer_id;
        $employment->save();

        return redirect()->route('employment.create', ['id' => $request->freelancer_id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employment = Employment::find($id);
        return view('employment.edit', compact('employment'));
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
        $employment = Employment::find($id);
        $employment->company = $request->company;
        $employment->period = $request->period;
        $employment->title = $request->title;
        $employment->status = $request->status;
        $employment->save();

        return redirect()->route('employment.create', ['id' => $employment->freelancer_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employment = Employment::find($id);
        $freelancerId = $employment->freelancer_id;
        $employment->delete();

        return redirect()->route('employment.create', ['id' => $freelancerId]);
    }
}
