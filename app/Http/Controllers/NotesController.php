<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotesController extends Controller
{
    
    public function index()
    {
        // Retrieve and display a list of notes
        $notes = Note::all();
        return view('notes.index', ['notes' => $notes]);
    }

    // Show the form for creating a new note
    public function create()
    {
        return view('notes.create');
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

        // Redirect to the notes list or show the newly created note
        return redirect('/notes')->with('success', 'Note created successfully');
    }

    // Show the specified note
    public function show(Note $note)
    {
        return view('notes.show', ['note' => $note]);
    }

    // Show the form for editing the specified note
    public function edit(Note $note)
    {
        return view('notes.edit', ['note' => $note]);
    }

    // Update the specified note in the database
    public function update(Request $request, Note $note)
    {
        // Validate and update the note
        $note->subject = $request->input('subject');
        $note->details = $request->input('details');
        $note->deadline = $request->input('deadline');
        $note->save();

        // Redirect to the notes list or show the updated note
        return redirect('/notes')->with('success', 'Note updated successfully');
    }

    // Remove the specified note from the database
    public function destroy(Note $note)
    {
        $note->delete();

        // Redirect to the notes list or show a success message
        return redirect('/notes')->with('success', 'Note deleted successfully');
    }
}
