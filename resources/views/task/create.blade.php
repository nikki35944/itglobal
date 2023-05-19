@extends('layouts.main')
@section('content')

    <div class="row">
        <div class="col-sm-6 mt-10">
            <a href="{{ route('home') }}" class="btn btn-primary">Назад к списку задач</a>
        </div>
    </div>

    <form action="{{ route('task.store') }}" method="post" class="mt-30">
        @csrf
        <div class="form-group mb-3">
            <label for="title" class="form-label">Название задачи</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ old('title') }}" required>
            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group mb-3">
            <label for="description" class="form-label">Описание</label>
            <textarea type="text" name="description" class="form-control" id="description" required>{{ old('description') }}</textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group mb-3">
                    <label for="due_time" class="form-label">Срок выполнения</label>
                    <div class="form-outline">
                        <div class="input-group date">
                            <input type="text" class="form-control" name="due_time" data-field="datetime" value="{{ old('due_time') }}" required>
                            <span class="input-group-append">
                        <span class="input-group-text d-block bg-white">
                            <i class="fa fa-calendar"></i>
                        </span>
                    </span>
                            <div id="dtBox" class="dtpicker-overlay" data-view="Dropdown"></div>
                        </div>
                    </div>
                    @error('due_time')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="users">Ответственный пользователь за выполнение задачи</label>
                    <select class="form-select" id="users" name="user_id">
                        @foreach( $users as $user )
                            <option
                                {{ old('user_id') == $user->id ? ' selected' : '' }}
                                value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    @error('users')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group mb-3">
                    <label for="statuses">Статус задачи</label>
                    <select class="form-select" id="statuses" name="status_id">
                        @foreach( $statuses as $status )
                            <option
                                {{ old('status') == $status->id ? ' selected' : '' }}
                                value="{{ $status->id }}">{{ $status->title }}</option>
                        @endforeach
                    </select>
                    @error('statuses')
                    <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Добавить задачу</button>
    </form>
@endsection
