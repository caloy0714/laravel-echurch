
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
                <h1>Create Time Slot</h1>
    <form action="{{ route('time-slots.store') }}" method="POST">
        @csrf
        <label for="start_time">Start Time:</label>
        <input type="datetime-local" name="start_time" required>
        <br>
        <label for="end_time">End Time:</label>
        <input type="datetime-local" name="end_time" required>
        <br>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
