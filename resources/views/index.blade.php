<h1 class="">Список задач</h1>

<div class="">
    @forelse($tasks as $task)
        <div class="">
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div class="">Задач нет, но вы держитесь!</div>
    @endforelse
</div>
