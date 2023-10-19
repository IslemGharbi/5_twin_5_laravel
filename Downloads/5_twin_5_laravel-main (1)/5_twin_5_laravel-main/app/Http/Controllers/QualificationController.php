<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Qualification;
use App\Models\Freelancer;

class QualificationController extends Controller
{
    public function create($id)
    {
        $freelancer = Freelancer::find($id);
        $qualifications = Qualification::where('freelancer_id', $id)->get();
        return view('qualification.create', compact('freelancer', 'qualifications'));
    }

    public function store(Request $request)
    {
        $qualification = new Qualification();
        $qualification->school = $request->school;
        $qualification->start = $request->start;
        $qualification->end = $request->end;
        $qualification->degree = $request->degree;
        $qualification->subject = $request->subject;
        $qualification->freelancer_id = $request->freelancer_id;
        $qualification->save();
        return redirect()->route('qualification.create', ['id' => $request->freelancer_id]);
    }

    public function edit($id)
    {
        $qualification = Qualification::find($id);
        return view('qualification.edit', compact('qualification'));
    }

    public function update(Request $request, $id)
    {
        $qualification = Qualification::find($id);
        $qualification->school = $request->school;
        $qualification->start = $request->start;
        $qualification->end = $request->end;
        $qualification->degree = $request->degree;
        $qualification->subject = $request->subject;
        $qualification->save();
        return redirect()->route('qualification.create', ['id' => $qualification->freelancer_id]);
    }

    public function destroy($id)
    {
        $qualification = Qualification::find($id);
        $freelancerId = $qualification->freelancer_id;
        $qualification->delete();
        return redirect()->route('qualification.create', ['id' => $freelancerId]);
    }
}
