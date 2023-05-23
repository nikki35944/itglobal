<nav class="nav">
    <div class="inner-nav__container">
        <div class="col-md-6 left-container d-flex">
            <a href="{{ route('task.create') }}" class="btn btn-primary mr-5">Добавить задачу</a>
            <select class="form-select" id="nav__sort-tasks">
                <option selected disabled>Сортировать по ...</option>
                <option value="user_lastname">Сортировать по имени пользователя</option>
                <option value="status_title">Сортировать по статусу</option>
                <option value="due_time">Сортировать по сроку выполнения</option>
                <option value="completion_time">Сортировать по дате выполения</option>
            </select>
        </div>
        <div class="col-md-6 right-container d-flex justify-content-md-end">
            <div class="user-info__container">
                <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="18" cy="18" r="17" fill="#91E0D6" stroke="white" stroke-width="2"/>
                    <path d="M13.8301 12.7031C11.041 12.7031 9.30468 14.6924 9.30468 17.8643C9.30468 21.0225 11 23.0322 13.8301 23.0322C16.6465 23.0322 18.3555 21.0156 18.3555 17.8643C18.3555 14.6992 16.6328 12.7031 13.8301 12.7031ZM13.8301 13.8379C15.8467 13.8379 17.0908 15.3965 17.0908 17.8643C17.0908 20.3115 15.8535 21.8975 13.8301 21.8975C11.7793 21.8975 10.5693 20.3115 10.5693 17.8643C10.5693 15.3965 11.8203 13.8379 13.8301 13.8379ZM26.5996 21.6924H21.7187V18.3018H26.3467V17.208H21.7187V14.043H26.5996V12.9355H20.4883V22.7998H26.5996V21.6924Z" fill="#002D2D"/>
                </svg>
                <h3>Alex Hernandez</h3>
            </div>
            <a href="#" class="btn btn-default">Выйти</a>
        </div>
    </div>
</nav>
