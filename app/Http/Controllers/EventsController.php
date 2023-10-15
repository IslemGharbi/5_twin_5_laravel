<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Task;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

  
    public function create()
{
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
    ]);

    $event = Event::create($eventData);

    if ($request->has('tasks') && is_array($request->input('tasks'))) {
        // Attachez les tâches sélectionnées à l'événement
        $event->tasks()->attach($request->input('tasks'));
    }

    return redirect()->route('events.index');
}



   


    
public function show(Event $event)
{
    $event->load('tasks'); // Charge les tâches associées à l'événement
    return view('events.show', compact('event'));
}


    public function edit(Event $event)
    {
        $tasks = $event->tasks; // Récupérez les tâches associées à l'événement
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
}
