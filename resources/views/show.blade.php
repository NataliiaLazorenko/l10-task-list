<!-- The template will get all the content from the `layouts.app` template and also render additional content (the code  below `extends`)  -->
@extends('layouts.app')

@section('title', $task->title)

@section('content')
<div class="mb-4">
    <a href="{{ route('tasks.index') }}" class="link">
        ← Go back to the task list!
    </a>
</div>

<p class="mb-4 text-slate-700">{{ $task->description }}</p>

<!-- Not all the tasks have long_description, so we should check if $task->long_description will return something truthy (not null) -->
@if($task->long_description)
<p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
@endif

<!-- diffForHumans() is a Laravel date method that works with date objects, specifically Carbon objects.
Carbon is a library used in Laravel for handling dates -->
<p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} • Updated {{ $task->updated_at->diffForHumans() }} </p>

<p class="mb-4">
    @if($task->completed)
    <span class="font-medium text-green-500">Completed</span>
    @else
    <span class="font-medium text-red-500">Not completed</span>
    @endif
</p>

<div class="flex gap-2">
    <a
        href="{{ route('tasks.edit', ['task' => $task]) }}"
        class="btn">Edit
    </a>

    <!-- Since the endpoint to toggle completion uses the PUT verb, a form is required to send the request.
    By default, the method is GET, so it needs to be POST for method spoofing to work -->
    <form method='POST' action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <button type='submit' class="btn">
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>

    <!-- Laravel knows that when passing an entity, it automatically takes the primary key (the id) value.
    Therefore, there is no need to pass $task->id, it is sufficient to pass the whole model -->
    <form
        action="{{ route('tasks.destroy', ['task' => $task]) }}"
        method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete</button>
    </form>
</div>
@endsection