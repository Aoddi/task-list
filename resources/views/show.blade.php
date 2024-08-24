@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <p>{{ $task->description }}</p>

    @if($task->long_description)
        <p>{{ $task->long_description }}</p>
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <p>
        @if ($task->completed)
            Завершена
        @else
            В работе
        @endif
    </p>

    <div class="">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}">Изменить</a>
    </div>

    <div class="">
        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit">
                {{ $task->completed ? 'Вернуть в работу' : 'Завершить' }}
            </button>
        </form>
    </div>

    <div class="">
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Удалить</button>
        </form>
    </div>
@endsection
