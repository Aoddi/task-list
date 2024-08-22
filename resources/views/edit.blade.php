@extends('layouts.app')

@section('title', 'Редактирование задачи')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: .8rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" value="{{ $task->title }} ">
        </div>
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="description">Описание</label>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
        </div>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="long_description">Длинное Описание</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
        </div>
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <button type="submit">Редактировать задачу</button>
        </div>
    </form>
@endsection
