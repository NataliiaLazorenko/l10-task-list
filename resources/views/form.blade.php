<!-- The blade name 'create' is the typical name that we give to forms responsible for creating new stuff -->
@extends('layouts.app')

<!-- If the $task variable was passed, than it will be a form to edit task -->
@section('title',
isset($task) ? 'Edit Task' : 'Add Task'
)

@section('styles')
<style>
    .error-message {
        color: red;
        font-size: 0.8rem;
    }

</style>
@endsection
ioilijui
@section('content')
<!-- We can add only GET or POST as a html form methods.
But for cases where we update an existing resource, we should use PUT.
To solve this, we can use method directive, where we can specify PUT.
It will add hidden field to be sent with the form (underscore method that will contain the text PUT).
This is called method spoofing. Laravel will redirect the request with underscore method to a route which has PUT method -->

<!-- In 'action' parameter we generate the route we are going to submit the form -->
<form method="POST"
    action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route ('tasks.store') }}">
    @csrf
    <!-- If we update the task, than we use method spoofing -->
    @isset($task)
        @method('PUT')
    @endisset
    <div>
        <label for="title">
            Title
        </label>
        <!-- 'name' attribute would be used as the name of the data submitted by the form, 'id' attribute lets us bind a specific label to the input -->

        <!-- When invalid values are provided, errors will occur upon clicking the submit button, and all fields will be cleared.
        To preserve entered values, we can use the 'old' helper function. It will retain the previously entered data.
        The 'old' helper only works with forms submitted via the POST method, including those using method spoofing.
        However, avoid using the 'old' helper with sensitive information like passwords -->

        <!-- If someone is editing a task, they will pass the task title. The double question mark operator (??) will use
        task->title if it's not null without throwing any errors; otherwise, it will fall back to old('title') -->
        <input type="text" name="title" id="title"
            value="{{ $task->title ?? old('title') }}" />

        <!-- Validation errors are stored in the user session.
        Laravel automatically makes the 'errors' variable available to all views, so it doesn't need to be passed from routes.
        To display user input errors, we can use the 'error' directive. Inside it, we can access a variable called 'message' -->
        @error('title')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="description">
            Description
        </label>
        <textarea name="description" id="description"
            rows="5">{{ $task->description ?? old('description') }}</textarea>
        @error('description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="long_description">
            Long Description
        </label>
        <textarea name="long_description" id="long_description"
            rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
        @error('long_description')
            <p class="error-message">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit">
            <!-- We show different button text depending on whether the task is set -->
            @isset($task)
                Update Task
            @else
                Add Task
            @endisset
        </button>
    </div>
</form>
@endsection
