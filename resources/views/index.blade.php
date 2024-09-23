@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
<div>
    <a href="{{ route('tasks.create') }}">Add task!</a>
</div>

<!-- Instead if mixing any other kind of `for` loop with an `if` statement, we can use `forelse` directive
`forelse` will iterate aver all the elements in the list, if there are any. It the list is empty, it will display the alternative -->
@forelse($tasks as $task)
<div>
    <a href="{{ route('tasks.show', ['task'=>$task->id]) }}">{{ $task->title }}
    </a>
</div>
@empty
<div>There are no tasks!</div>
@endforelse

<!-- We use an 'if' statement to check if there are any tasks.
If tasks exist, we display the pagination links by calling the links method on the variable holding the tasks -->
@if($tasks->count())
<nav>
    {{ $tasks->links() }}
</nav>
@endif
@endsection