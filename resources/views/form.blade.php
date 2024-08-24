@extends('layouts.app')

@section('title', isset($task) ? 'Редактирование задачи' : 'Новая задача')

@section('content')
    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}"
          method="POST">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title"
                   @class(['border-red-500' => $errors->has('title')])
                   value="{{ $task->title ?? old('title') }}">

            @error('title')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">Описание</label>
            <textarea name="description" id="description" rows="5"
            @class(['border-red-500' => $errors->has('description')])>{{ $task->description ?? old('description') }}</textarea>

            @error('description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="long_description">Длинное Описание</label>
            <textarea name="long_description" id="long_description" rows="10"
            @class(['border-red-500' => $errors->has('long_description')])>{{ $task->long_description ?? old('long_description') }}</textarea>

            @error('long_description')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center gap-2">
            <button type="submit" class="btn">
                @isset($task)
                    Изменить задачу
                @else
                    Создать задачу
                @endisset
            </button>

            <a href="{{ route('tasks.index') }}" class="link">Назад</a>
        </div>
    </form>
@endsection
