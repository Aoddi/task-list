@extends('layouts.app')

@section('title', 'Новая задача')

@section('content')
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title">
        </div>

        <div class="">
            <label for="description">Описание</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>

        <div class="">
            <label for="long_description">Длинное Описание</label>
            <textarea name="long_description" id="long_description" rows="10"></textarea>
        </div>

        <div class="">
            <button type="submit">Создать задачу</button>
        </div>
    </form>
@endsection
