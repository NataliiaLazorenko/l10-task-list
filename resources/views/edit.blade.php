@extends('layouts.app')

@section('title', 'Edit task')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }

</style>
@endsection

@section('content')
<!-- We can add only GET or POST as a html form methods.
But for cases where we update an existing resource, we should use PUT.
To solve this, we can use method directive, where we can specify PUT.
It will add hidden field to be sent with the form (underscore method that will contain the text PUT).
This is called method spoofing. Laravel will redirect the request with underscore method to a route which has PUT method -->
<form method="POST"
    action="{{ route ('tasks.update', ['task' =>$task->id]) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">
            Title
        </label>
        <input type="text" name="title" id="title" value="{{ $task->title }}" />
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">
            Description
        </label>
        <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">
            Long Description
        </label>
        <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">Edit Task</button>
    </div>
</form>
@endsection
