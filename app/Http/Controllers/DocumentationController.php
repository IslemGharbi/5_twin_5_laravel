<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Documentation;
use Illuminate\Support\Facades\Storage;
class DocumentationController extends Controller
{

    public function index()
    {
        $documentation = Documentation::all();
        return view('documentation.index', compact('documentation'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'file' => 'required|file|mimes:pdf,doc,docx',
           
        ]);

        $pdfPath = $request->file('file')->store('documentation', 'public');

        Documentation::create([
            'title' => $request->input('title'),
            'file' => $pdfPath, // Store the file name in the database
        ]);

        return redirect('/documentation')->with('success', 'Documentation added successfully');
    }
}
