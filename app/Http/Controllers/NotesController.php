<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Note;
use App\Models\NotePicture;
use Illuminate\Support\Facades\Log;

class NotesController extends Controller
{
    // ...    // Get a specific note
    // public function show(Note $note)
    // {
    //     $pictures = $note->pictures;

    //     return view('notes.show', ['note' => $note, 'pictures' => $pictures]);
    // }
   
    // Get all notes
    public function index()
    {
        $notes = Note::all();
    
        return view('notes', ['notes' => $notes]);
    }

      

    // Store a newly created note in the database
    public function store(Request $request)
    {
        // Validate and save the note
        $note = new Note;
        $note->subject = $request->input('subject');
        $note->details = $request->input('details');
        $note->deadline = $request->input('deadline');
        $note->save();

        // Handle picture upload (assuming 'picture' is the input name)
        if ($request->hasFile('picture')) {
            $picture = new NotePicture;
            $picture->note_id = $note->id;

            // Upload and save the picture using Cloudinary
            $uploadedFile = $request->file('picture');
            $result = $uploadedFile->storeOnCloudinary();;

            $picture->public_id = $result->getPublicId();
            $picture->url = $result->getSecurePath();

            $picture->save();
        }

        // Redirect to the notes list or show the newly created note
        return redirect('/notes')->with('success', 'Note created successfully');
    }

   
 // Update a specific note
 public function update(Request $request, Note $note)
 {
     // Validate and update the note
     $note->subject = $request->input('subject');
     $note->details = $request->input('details');
     $note->deadline = $request->input('deadline');
     $note->save();

     // Handle picture update (assuming 'picture' is the input name)
     if ($request->hasFile('picture')) {
         $picture = $note->picture; // Assuming there is one picture associated with the note

         // Update and save the picture using Cloudinary
         $uploadedFile = $request->file('picture');
         $result = $uploadedFile->storeOnCloudinary();;

         $picture->public_id = $result->getPublicId();
         $picture->url = $result->getSecurePath();

         $picture->save();
     }

     return redirect()->route('notes.show', ['note' => $note])->with('success', 'Note updated successfully');
 }

 // Delete a specific note
 public function destroy(Note $note)
 {
     // Delete associated pictures (assuming there's a relationship)
     $note->pictures()->delete();

     // Delete the note
     $note->delete();

     return redirect('/notes')->with('success', 'Note deleted successfully');
 }

    // ...
}
