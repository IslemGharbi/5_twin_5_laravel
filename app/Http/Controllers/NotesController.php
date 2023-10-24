<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\NotePicture;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use CloudinaryLabs\CloudinaryLaravel\MediaAlly;
use Carbon\Carbon;
use App\Mail\DeadlineNotification;
use Illuminate\Support\Facades\Mail;
class NotesController extends Controller
{
 
   
    // Get all notes
    public function index()
    {    
        $notes = Note::with('pictures')->get(); 
        return view('notes.index',compact ('notes'));
    }

      


    public function store(Request $request)
    {
        // Validate and save the note
        $note = new Note;
        $note->subject = $request->input('subject');
        $note->details = $request->input('details');
        $note->deadline = $request->input('deadline');
        $note->save();
    
        // Handle picture upload
        if ($request->hasFile('picture')) {
            $uploadedFile = $request->file('picture');
    
            // Upload the image to Cloudinary
            $result = Cloudinary::upload($uploadedFile->getPathname(), [
                "folder" => "notes", 
            ]);
    
            // The result should be an object, not an array
    
            // Create a new NotePicture record
            $picture = new NotePicture;
            $picture->note_id = $note->id; // Associate the picture with the note
            $picture->public_id =$note->id;            
            $picture->url = $result->getSecurePath();
            $picture->save();
        }
    
        // Redirect to the notes list or show the newly created note
        return redirect('/notes')->with('success', 'Note created successfully');
    }

  
    public function update(Request $request, $id)
    {
        // Find the note to be updated
        $note = Note::findOrFail($id);
    
        // Validate the request data
        $this->validate($request, [
            'subject' => 'required',
            'details' => 'required',
            'deadline' => 'required',
        ]);
    
        // Update the note with the new data
        $note->subject = $request->input('subject');
        $note->details = $request->input('details');
        $note->deadline = $request->input('deadline');
        $note->save();
    
        // Handle picture update (assuming 'picture' is the input name)
        if ($request->hasFile('picture')) {
            $picture = $note->pictures->first(); // Assuming there is one picture associated with the note
    
            if (!$picture) {
                $picture = new NotePicture();
                $picture->note_id = $note->id;
            }
    
            // Update and save the picture using Cloudinary
            $uploadedFile = $request->file('picture');
            $result = $uploadedFile->storeOnCloudinary();
    
            $picture->public_id = $result->getPublicId();
            $picture->url = $result->getSecurePath();
    
            $picture->save();
        }
    
        // Redirect to the notes list or show the updated note
        return redirect('/notes')->with('success', 'Note updated successfully');
    }
    




   
 // Update a specific note
//  public function update(Request $request, Note $note)
//  {
//      // Validate and update the note
//      $note->subject = $request->input('subject');
//      $note->details = $request->input('details');
//      $note->deadline = $request->input('deadline');
//      $note->save();

//      // Handle picture update (assuming 'picture' is the input name)
//      if ($request->hasFile('picture')) {
//          $picture = $note->picture; // Assuming there is one picture associated with the note

//          // Update and save the picture using Cloudinary
//          $uploadedFile = $request->file('picture');
//          $result = $uploadedFile->storeOnCloudinary();;

//          $picture->public_id = $result->getPublicId();
//          $picture->url = $result->getSecurePath();

//          $picture->save();
//      }

//      return redirect()->route('notes.show', ['note' => $note])->with('success', 'Note updated successfully');
//  }

 public function destroy($id)
{
    $note = Note::find($id);

    if (!$note) {
        return redirect('/notes')->with('error', 'Note not found.');
    }

    // Delete associated pictures (assuming you want to delete them as well)
    $note->pictures()->delete();

    $note->delete();

    return redirect('/notes')->with('success', 'Note deleted successfully.');
}

public function checkExpiredNotes()
{
    // Get all notes with deadlines that are in the past (expired)
    $expiredNotes = Note::where('deadline', '<', Carbon::now())->get();

    // You can now work with the $expiredNotes collection
    // For example, you can loop through them and take action if needed.

    foreach ($expiredNotes as $note) {
        // Check if the note has an associated user
        if ($note->user) {
            // Do something with the expired note, e.g., send notifications, update status, etc.
            // For sending email notifications, you can use Laravel's Mail facade:
            Mail::to('saidi.omar@esprit.tn')->send(new DeadlineNotification($note));

            // Update the note status, mark it as expired, or perform any other action as needed.
        }
    }

}}