<?php
namespace App\Http\Controllers;
use App\Mail\EventParticipationConfirmation;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Task;
use App\Models\EventReservation;

class EventsController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->check() && auth()->user()->email !== 'admin@email.com') {
            abort(403, 'Access denied');
        }

        $query = Event::query();
    
        // Filtrer par lieu
        if ($request->has('location')) {
            $query->where('location', $request->input('location'));
        }
    
        // Filtrer par titre
        if ($request->has('title')) {
            $query->where('title', 'like', '%' . $request->input('title') . '%');
        }
    
        $events = $query->get();
    
        $locations = Event::distinct('location')->pluck('location');
    
        return view('events.index', compact('events', 'locations'));
    }
    
    public function create()
    {
        if (auth()->check() && auth()->user()->email !== 'admin@email.com') {
            abort(403, 'Access denied');
        }
        $tasks = Task::all();
        return view('events.create', compact('tasks'));
    }

    public function store(Request $request)
    {
        $eventData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date' => 'required|date|after:start_date',
            'location' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validation de l'image
        ]);

        // Gestion de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('event_images', 'public');
            $eventData['image'] = $imagePath;
        }

        $event = Event::create($eventData);

        if ($request->has('tasks') && is_array($request->input('tasks'))) {
            // Attachez les tâches sélectionnées à l'événement
            $event->tasks()->attach($request->input('tasks'));
        }

        return redirect()->route('events.index');
    }

    public function show(Event $event)
    {
        if (auth()->check() && auth()->user()->email !== 'admin@email.com') {
            abort(403, 'Access denied');
        }
        $event->load('tasks');
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        if (auth()->check() && auth()->user()->email !== 'admin@email.com') {
            abort(403, 'Access denied');
        }
        $tasks = $event->tasks;
        return view('events.edit', compact('event', 'tasks'));
    }

    public function update(Request $request, Event $event)
    {
        $eventData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required',
        ]);

        $event->update($eventData);

        return redirect()->route('events.index');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index');
    }


    public function cardEvent()
{
    $events = Event::all();
    return view('events.cardEvent', compact('events'));
}


public function showClient(Event $event)
{
    $event->load('tasks');
    return view('events.showClient', compact('event'));
}



public function reserveEvent($eventId)
{
    if (auth()->check()) {
        $user = auth()->user();
        $event = Event::find($eventId);

        if (!$event) {
            return redirect()->back()->with('error', 'L\'événement n\'existe pas.');
        }

        $existingReservation = EventReservation::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé cet événement.');
        }

        $reservation = new EventReservation();
        $reservation->user_id = $user->id;
        $reservation->event_id = $event->id;
        $reservation->save();

        return redirect()->back()->with('success', 'Réservation réussie.');
    } else {
        return redirect()->route('login')->with('error', 'Connectez-vous pour réserver cet événement.');
    }
}










/*
public function filter(Request $request)
{
    $location = $request->input('location');

    if ($location) {
        $events = Event::where('location', $location)->get();
    } else {
        $events = Event::all();
    }

    return view('events.index', compact('events'));
}

*/

}
