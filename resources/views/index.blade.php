<h1>
    The list of tasks
</h1>

<!-- We can use `if` directive and `count` php function to check if tasks array have any elements in it -->
<div>
    <!-- We can also use: count($tasks) > 0 -->
    <!-- @if(count($tasks))
@foreach($tasks as $task)
            <div>{{ $task->title }}</div>
@endforeach
@else
        <div>There are no tasks!</div>
@endif-->

    <!--
        Instead if mixing any other kind of `for` loop with an `if` statement, we can use `forelse` directive
        `forelse` will iterate aver all the elements in the list, if there are any. It the list is empty, it will display the alternative
    -->
    @forelse($tasks as $task)
        <div>
            <a
                href="{{ route('tasks.show', ['id'=>$task->id]) }}">{{ $task->title }}
            </a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse
</div>
