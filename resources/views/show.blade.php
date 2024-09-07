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

<div>
    <form
        action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
        method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
</div>
@endsection
