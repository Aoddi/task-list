@extends('layouts.app')

@section('title', isset($task) ? 'Редактирование задачи' : 'Новая задача')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: .8rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
        </div>
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="description">Описание</label>
            <textarea name="description" id="description" rows="5">{{ $task->description ?? old('description') }}</textarea>
        </div>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="long_description">Длинное Описание</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
        </div>
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <button type="submit">
                @isset($task)
                    Изменить задачу
                @else
                    Создать задачу
                @endisset
            </button>
        </div>
    </form>
@endsection
