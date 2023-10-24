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

    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'title' => 'required',
            'file' => 'sometimes|file|mimes:pdf,doc,docx', // Use "sometimes" to allow file to be optional
        ]);
    
        // Find the documentation record by its ID
        $documentation = Documentation::findOrFail($id);
    
        // Update the title
        $documentation->title = $request->input('title');
    
        // Update the file if a new one is provided
        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            Storage::disk('public')->delete($documentation->file);
    
            // Store the new file
            $pdfPath = $request->file('file')->store('documentation', 'public');
            $documentation->file = $pdfPath;
        }
    
        // Save the changes to the database
        $documentation->save();
    
        return redirect('/documentation')->with('success', 'Documentation updated successfully');
    }
    


    public function destroy($id)
    {
        // Find the documentation by its ID
        $documentation = Documentation::findOrFail($id);
    
        // Delete the file from storage
        Storage::disk('public')->delete($documentation->file);
    
        // Delete the documentation record from the database
        $documentation->delete();
    
        return redirect('/documentation')->with('success', 'Documentation deleted successfully');
    }
    
}
