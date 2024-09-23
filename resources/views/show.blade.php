<!-- The template will get all the content from the `layouts.app` template and also render additional content (the code  below `extends`)  -->
@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p>{{ $task->description }}</p>

<!-- Not all the tasks have long_description, so we should check if $task->long_description will return something truthy (not null) -->
@if($task->long_description)
<p>{{ $task->long_description }}</p>
@endif

<p>{{ $task->created_at }}</p>
<p>{{ $task->updated_at }}</p>

<p>
    @if($task->completed)
    Completed
    @else
    Not completed
    @endif
</p>

<div>
    <a
        href="{{ route('tasks.edit', ['task' => $task]) }}">Edit</a>
</div>

<div>
    <!-- Since the endpoint to toggle completion uses the PUT verb, a form is required to send the request.
    By default, the method is GET, so it needs to be POST for method spoofing to work -->
    <form method='POST' action="{{ route('tasks.toggle-complete', ['task' => $task]) }}">
        @csrf
        @method('PUT')
        <button type='submit'>
            Mark as {{ $task->completed ? 'not completed' : 'completed' }}
        </button>
    </form>
</div>

<div>
    <!-- Laravel knows that when passing an entity, it automatically takes the primary key (the id) value.
    Therefore, there is no need to pass $task->id, it is sufficient to pass the whole model -->
    <form
        action="{{ route('tasks.destroy', ['task' => $task]) }}"
        method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection