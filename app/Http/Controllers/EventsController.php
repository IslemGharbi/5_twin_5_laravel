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
        return view('events.create');
    }

    
    public function store(Request $request)
    {
        // Valider les données du formulaire pour l'événement
        $eventData = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'location' => 'required',
        ]);
    
        // Créer l'événement
        $event = Event::create($eventData);
    
        // Vérifier si des tâches ont été soumises
        if ($request->has('tasks') && is_array($request->input('tasks'))) {
            foreach ($request->input('tasks') as $taskData) {
                // Créez chaque tâche avec un tableau d'attributs
                $task = new Task([
                    'description' => $taskData['description'],
                    'due_date' => $taskData['due_date'],
                    'status' => $taskData['status'],
                    'priority' => $taskData['priority'],
                ]);
                $task->event_id = $event->id; // Associez la tâche à l'événement
                $task->save(); // Enregistrez la tâche
            }
        }
    
        return redirect()->route('events.index');
    }
    

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
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
