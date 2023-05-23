@extends('layouts.main')
@section('content')

    @include('includes.navbar')
    @include('includes.alert')

    <div class="tasks-container mt-30">
        <div class="mt-10">
            @foreach($tasks as $task)
                <div class="card mb-3
                {{ ($task->due_time < $currentDateTime) ? 'task__bg-danger' : ''}}
                {{ ($task->completion_time === null && $task->due_time > $currentDateTime) ? 'bg-white' : '' }}">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center">
                        <div class="user-info__container d-flex align-items-center">
                            <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="22" cy="22" r="21" fill="#F0C5FF" stroke="white" stroke-width="2"/>
                                <path d="M17.5176 28.2109C15.7656 28.2109 14.374 27.6221 13.3428 26.4443C12.3174 25.2607 11.8047 23.6641 11.8047 21.6543C11.8047 19.6621 12.3232 18.0742 13.3604 16.8906C14.3975 15.7012 15.7832 15.1064 17.5176 15.1064C18.9004 15.1064 20.0723 15.4932 21.0332 16.2666C22 17.0342 22.583 18.0508 22.7822 19.3164H21.1826C20.9775 18.4844 20.541 17.8193 19.873 17.3213C19.2051 16.8174 18.4199 16.5654 17.5176 16.5654C16.2812 16.5654 15.291 17.0283 14.5469 17.9541C13.8027 18.8799 13.4307 20.1133 13.4307 21.6543C13.4307 23.2129 13.7998 24.4521 14.5381 25.3721C15.2764 26.292 16.2725 26.752 17.5264 26.752C18.458 26.752 19.2432 26.5381 19.8818 26.1104C20.5205 25.6826 20.9541 25.082 21.1826 24.3086H22.7822C22.4893 25.5625 21.8887 26.5264 20.9805 27.2002C20.0723 27.874 18.918 28.2109 17.5176 28.2109ZM26.2363 28H24.6543V15.3174H32.3535V16.7412H26.2363V21.1006H31.8525V22.5068H26.2363V28Z" fill="#002D2D"/>
                            </svg>
                            <h3>{{ $task->user->name }} {{ $task->user->lastname }}</h3>
                        </div>
                        <div class="edit-link">
                            <div class="task__edit-link">
                                <svg width="16" height="4" viewBox="0 0 16 4" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4 2C4 3.104 3.104 4 2 4C0.896 4 0 3.104 0 2C0 0.896 0.896 0 2 0C3.104 0 4 0.896 4 2ZM10 2C10 3.104 9.104 4 8 4C6.896 4 6 3.104 6 2C6 0.896 6.896 0 8 0C9.104 0 10 0.896 10 2ZM16 2C16 3.104 15.104 4 14 4C12.896 4 12 3.104 12 2C12 0.896 12.896 0 14 0C15.104 0 16 0.896 16 2Z" fill="#5C5F62"/>
                                </svg>
                                <div class="edit-link__container
                                ">
                                    <a href="{{ route('task.edit', $task->id) }}">Просмотр / Редактирование задачи</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title">{{ $task->title }}</h2>
                        <p class="card-text">{{ $task->description }}</p>
                    </div>
                    <div class="card-footer bg-white">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="status-info__container">
                                    <p>Статус задачи</p>
                                    <div class="status-info {{ $task->completion_time ? 'bg-success' : 'bg-gray' }}"><span>{{ $task->status->title }}</span></div>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                            <div class="col-md-3">
                                <div class="due-time__container">
                                    <p>Срок выполнения</p>
                                    <div class="status-info bg-gray"><span>{{ date('d-m-Y H:i', strtotime($task->due_time)) }}</span></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="completion-time__container">
                                    <p>Дата выполнения</p>
                                    <div class="status-info bg-gray"><span>{{ $task->completion_time ? date( 'd-m-Y H:i', strtotime($task->completion_time) )  : '--' }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

<div class="tasks-container mt-30 mb-50">
    <div class="d-flex pagination ">
        {{ $tasks->withQueryString()->links() }}
    </div>
</div>

@endsection
