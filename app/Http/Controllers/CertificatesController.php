<?php

namespace App\Http\Controllers;
use App\Models\Certificate;
use Illuminate\Http\Request;
use App\Models\Skill;


use Illuminate\Support\Facades\Storage;


class CertificatesController extends Controller
{
    public function index()
    {
        $certificates = Certificate::all();
        return view('certificates.index', compact('certificates'));
    }

    public function create($skillId)
    {
        $skill = Skill::find($skillId);
        return view('certificates.create', compact('skill'));
        
    }

    public function store(Request $request )
    {
        $request->validate([
            'description' => 'required',
            'pdf_file' => 'required|mimes:pdf|max:2048',
        ]);
        
                

        $pdfPath = $request->file('pdf_file')->store('certificates', 'public');

        $certificate = new Certificate([
            'description' => $request->get('description'),
            'pdf_file' => $pdfPath,
        ]);
        $certificate->skill_id = $request->get('skill_id');
        $certificate->save();

        $skill = Skill::find($request->skill_id);

if ($skill) {
    // Trouver le freelancer_id à partir de la compétence
    $freelancerId = $skill->freelancer_id;

    // Rediriger vers la création de compétence en passant le freelancer_id
    return redirect()->route('skill.create', ['id' => $freelancerId]);
}
    }
    

    public function show($id)
    {
        $certificate = Certificate::find($id);
        return view('certificates.show', compact('certificate'));
    }

    public function edit($id)
{
    $certificate = Certificate::find($id);
    return view('certificates.edit', compact('certificate'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'description' => 'required',
        'pdf_file' => 'mimes:pdf|max:2048',
    ]);

    $certificate = Certificate::find($id);
    if (!$certificate) {
        return redirect()->back()->with('error', 'Certificate not found.');
    }

    $certificate->description = $request->input('description');
    $freelancerId = $certificate->skill->freelancer_id;

    if ($request->hasFile('pdf_file')) {
        $existingPath = $certificate->pdf_file;
        if ($existingPath) {
            Storage::disk('public')->delete($existingPath);
        }
        $pdfPath = $request->file('pdf_file')->store('certificates', 'public');
        $certificate->pdf_file = $pdfPath;
    }

    $certificate->save();

    return redirect()->route('skill.create', ['id' => $freelancerId])->with('success', 'Certificate has been updated successfully.');
}



    public function destroy($id)
{
    $certificate = Certificate::find($id);
    if (!$certificate) {
        return redirect()->back()->with('error', 'Certificate not found.');
    }

    $freelancerId = $certificate->skill->freelancer_id;
    $certificate->delete();

    return redirect()->route('skill.create', ['id' => $freelancerId])->with('success', 'Certificate has been deleted successfully.');
}

}
