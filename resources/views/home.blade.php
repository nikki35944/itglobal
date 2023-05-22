@extends('layouts.main')
@section('content')
    @if(session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="mt-10">
        <a href="{{ route('task.create') }}" class="btn btn-primary">Добавить задачу</a>
    </div>
    <div class="mt-10">
        <table class="table table-hover">
            <thead>
            <tr>
                <th >#</th>
                <th>
                    <a href="#" data-sort="title" class="table-sort">
                        <span>Название задачи</span>
                        <span class="float-right text-sm">
                            <i class="fa fa-arrow-up"></i>
                            <i class="fa fa-arrow-down text-muted"></i>
                        </span>
                    </a>
                </th>
                <th>
                    <a href="#" data-sort="user_id" class="table-sort">
                        <span>Имя пользователя</span>
                        <span class="float-right text-sm">
                            <i class="fa fa-arrow-up"></i>
                            <i class="fa fa-arrow-down text-muted"></i>
                        </span>
                    </a>
                </th>
                <th>
                    <a href="#" data-sort="status_id" class="table-sort">
                        <span>Статус</span>
                        <span class="float-right text-sm">
                            <i class="fa fa-arrow-up"></i>
                            <i class="fa fa-arrow-down text-muted"></i>
                        </span>
                    </a>
                </th>
                <th>
                    <a href="#" data-sort="due_time" class="table-sort">
                        <span>Срок</span>
                        <span class="float-right text-sm">
                            <i class="fa fa-arrow-up"></i>
                            <i class="fa fa-arrow-down text-muted"></i>
                        </span>
                    </a>
                </th>
                <th>
                    <a href="#" data-sort="completion_time" class="table-sort">
                        <span>Дата выполнения</span>
                        <span class="float-right text-sm">
                            <i class="fa fa-arrow-up"></i>
                            <i class="fa fa-arrow-down text-muted"></i>
                        </span>
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($tasks as $task)
                <tr onclick="window.location='{{ route('task.edit', $task->id) }}'"
                    class="clickable
                    {{ ($task->due_time < $currentDateTime &&  !$task->completion_time)? 'table-danger' : '' }}
                    {{ $task->completion_time ? 'table-success' : '' }}
                ">
                        <th>{{ $task->id }}</th>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->user->name }}</td>
                        <td>{{ $task->status->title }}</td>
                        <td>{{ $task->due_time }}</td>
                        <td>{{ $task->completion_time ? $task->completion_time : 'Не выполнено' }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex pagination mt-30">
        {{ $tasks->withQueryString()->links() }}
    </div>
@endsection
