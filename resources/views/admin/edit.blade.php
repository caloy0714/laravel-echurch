@extends('layouts.app')

@section('content')
    <h1>Edit Time Slot</h1>
    <form action="{{ route('time-slots.update', $timeSlot->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="start_time">Start Time:</label>
        <input type="datetime-local" name="start_time" value="{{ $timeSlot->start_time }}" required>
        <br>
        <label for="end_time">End Time:</label>
        <input type="datetime-local" name="end_time" value="{{ $timeSlot->end_time }}" required>
        <br>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
