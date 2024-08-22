@extends('layouts.app')

@section('title', 'Список задач')

@section('content')
    @forelse($tasks as $task)
        <div class="">
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div class="">Задач нет, но вы держитесь!</div>
    @endforelse
@endsection
