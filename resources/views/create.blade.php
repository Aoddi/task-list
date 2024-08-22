@extends('layouts.app')

@section('title', 'Новая задача')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: .8rem;
        }
    </style>
@endsection

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title">
        </div>
        @error('title')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="description">Описание</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>
        @error('description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <label for="long_description">Длинное Описание</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>
        @error('long_description')
        <p class="error-message">{{ $message }}</p>
        @enderror

        <div class="">
            <button type="submit">Создать задачу</button>
        </div>
    </form>
@endsection
