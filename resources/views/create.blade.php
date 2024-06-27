<!-- The blade name 'create' is the typical name that we give to forms responsible for creating new stuff -->
@extends('layouts.app')

@section('title', 'Add task')

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }

</style>
@endsection

@section('content')
<!-- Validation errors are stored inside the user session.
Laravel makes errors variable to all views so it doesn't have to be passed from any routes -->
<!-- {{ $errors }} -->
<!-- POST method is used to create new stuff (we will always send post request) -->
<!-- In 'action' parameter we generate the route we are going to submit the form -->
<form method="POST" action="{{ route ('tasks.store') }}">
    @csrf
    <div>
        <label for="title">
            Title
        </label>
        <!-- We use both the 'name' and 'id' parameter because 'name' would be used as the name of the data submitted by the form.
        And 'id' attribute lets us bind a specific label to the input -->
        <input type="text" name="title" id="title" />
        <!-- To display the user input errors we can use 'error' directive. Inside it we can get access to a variable 'message' -->
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">
            Description
        </label>
        <textarea name="description" id="description" rows="5"></textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">
            Long Description
        </label>
        <textarea name="long_description" id="long_description" rows="10"></textarea>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">Add Task</button>
    </div>
</form>
@endsection
