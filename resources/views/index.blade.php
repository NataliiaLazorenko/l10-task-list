@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
<nav class="mb-4">
    <a href="{{ route('tasks.create') }}" class="link">
        Add task!
    </a>
</nav>

<!-- Instead if mixing any other kind of `for` loop with an `if` statement, we can use `forelse` directive
`forelse` will iterate aver all the elements in the list, if there are any. It the list is empty, it will display the alternative -->
@forelse($tasks as $task)
<div>
    <!-- The @class directive simplifies adding conditional classes. You can pass an array of classes:
    some that are always applied (e.g., font-bold) and others conditionally (e.g., line-through if a task is completed).
    If the condition is true, the class is added; otherwise, it's not
    E.g.: @class(['line-through'=> $task->completed]) -->
    <a href="{{ route('tasks.show', ['task'=>$task->id]) }}"
        @class(['line-through'=> $task->completed])>{{ $task->title }}
    </a>
</div>
@empty
<div>There are no tasks!</div>
@endforelse

<!-- We use an 'if' statement to check if there are any tasks.
If tasks exist, we display the pagination links by calling the links method on the variable holding the tasks -->
@if($tasks->count())
<nav class="mt-4">
    {{ $tasks->links() }}
</nav>
@endif
@endsection