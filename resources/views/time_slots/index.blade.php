<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <h1>Time Slots</h1>
    <a href="{{ route('time-slots.create') }}" class="btn btn-primary">Create Time Slot</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($timeSlots as $timeSlot)
                <tr>
                    <td>{{ $timeSlot->id }}</td>
                    <td>{{ $timeSlot->start_time }}</td>
                    <td>{{ $timeSlot->end_time }}</td>
                    <td>
                        <a href="{{ route('time-slots.edit', $timeSlot->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('time-slots.destroy', $timeSlot->id) }}" method="POST" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
