@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="content mt-30 mb-50">
            @if($task->completion_time)
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <div>
                        Задача была завершена <b>{{ date('d-m-Y H:i', strtotime($task->completion_time))  }}</b> и закрыта для редактирования.
                    </div>
                </div>
            @endif

            @include('includes.alert')

            <div class="row">
                <div class="col-sm-6 mt-10">
                    <a href="{{ route('home') }}" class="btn btn-primary">Назад к списку задач</a>
                </div>
                <div class="col-sm-6 d-sm-flex justify-content-sm-end mt-10">
                    <form action="{{ route('task.delete', $task->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить задачу" class="btn btn-danger">
                    </form>
                </div>
            </div>

            <form action="{{ route('task.update', $task->id) }}" method="post" class="mt-30">
                @csrf
                @method('patch')
                @if($task->completion_time)
                    <fieldset disabled>
                        @endif
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Название задачи</label>
                            <input type="text" name="title" class="form-control" id="title" value="{{ $task->title }}" required>
                            @error('title')
                            <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">Описание</label>
                            <textarea type="text" name="description" class="form-control" id="description">{{ $task->description }}</textarea>
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
                                            <input type="text" class="form-control" name="due_time" data-field="datetime" value="{{ $task->due_time }}" required>
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
                                                {{ $user->id === $task->user->id ? ' selected' : '' }}

                                                value="{{ $user->id }}">{{ $user->name }} {{ $user->lastname }}</option>
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
                                                {{ $status->id === $task->status->id ? ' selected' : '' }}
                                                value="{{ $status->id }}">{{ $status->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('statuses')
                                    <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Сохранить</button>
                        @if($task->completion_time)
                    </fieldset>
                @endif
            </form>
        </div>
    </div>

@endsection
