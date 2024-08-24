@extends('layouts.app')

@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">← К списку задач</a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Создано {{ $task->created_at->diffForHumans() }} • Обновлено {{ $task->updated_at->diffForHumans() }}</p>
    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Завершено</span>
        @else
            <span class="font-medium text-red-500">В работе</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
        class="btn">Изменить</a>

        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                {{ $task->completed ? 'Вернуть в работу' : 'Завершить' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Удалить</button>
        </form>
    </div>
@endsection
