<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TimeSlot;


class TimeSlotController extends Controller
{
    public function index()
    {
        $timeSlots = TimeSlot::all();
        return view('time_slots.index', compact('timeSlots'));
    }

    public function create()
    {
        return view('time_slots.create');
    }

    public function store(Request $request)
    {
        // Validate the input
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        TimeSlot::create($request->all());

        return redirect()->route('time-slots.index')->with('success', 'Time slot created successfully.');
    }

    public function edit(TimeSlot $timeSlot)
    {
        return view('time_slots.edit', compact('timeSlot'));
    }

    public function update(Request $request, TimeSlot $timeSlot)
    {
        // Validate the input
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $timeSlot->update($request->all());

        return redirect()->route('time-slots.index')->with('success', 'Time slot updated successfully.');
    }

    public function destroy(TimeSlot $timeSlot)
    {
        $timeSlot->delete();

        return redirect()->route('time-slots.index')->with('success', 'Time slot deleted successfully.');
    }
}