<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\TimeSlot;
use App\Models\Event;

class SubmissionController extends Controller
{
    public function create()
    {
        $timeSlots = TimeSlot::all();
        $events = Event::all();
        return view('submissions.create', compact('timeSlots', 'events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'names' => 'required|array',
            'time_slot_id' => 'required|exists:time_slots,id',
            'event_id' => 'required|exists:events,id',
            'submitter_name' => 'required|string',
        ]);

        $names = $request->input('names');
        $timeSlotId = $request->input('time_slot_id');
        $eventId = $request->input('event_id');
        $submitterName = $request->input('submitter_name');

        $submission = new Submission([
            'name' => implode(', ', $names),
            'time_slot_id' => $timeSlotId,
            'event_id' => $eventId,
            'submitter_name' => $submitterName,
        ]);

        $submission->save();

        return redirect()->route('submissions.create')->with('success', 'Form submitted successfully!');
    }
}
