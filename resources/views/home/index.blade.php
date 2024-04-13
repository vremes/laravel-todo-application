@extends('layouts.default')

@section('title', __('Home'))

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 d-flex justify-content-center">
            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal"
                data-bs-target="#createTodoModal">{{ __('Create todo') }}</button>
        </div>
    </div>
    @foreach ($todos as $todo)
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 d-flex justify-content-center">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">{{ $todo->title }}</h5>
                    @if ($todo->description)
                    <p class="card-text">{{ $todo->description }}</p>
                    @endif
                </div>
                <div class="card-footer">
                    <div>
                        <button class="btn btn-outline-danger delete-todo-button" data-bs-toggle="modal"
                            data-bs-target="#deleteTodoModal"
                            data-delete-url="{{ route('todos.delete', ['id' => $todo->id]) }}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="modal fade" tabindex="-1" id="createTodoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Create todo') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>
            <div class="modal-body">
                <div>
                    <form action="{{ route('todos.create') }}" method="POST" id="createTodoForm">
                        <div class="mb-3">
                            <input class="form-control" type="text" name="title" minlength="1"
                                placeholder="{{ __('Title') }}" autocomplete="off" required>
                        </div>
                        <div class="mb-3">
                            @csrf
                            <textarea class="form-control" name="description"
                                placeholder="{{ __('Description (optional)') }}" autocomplete="off" rows="3"></textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="button" class="btn btn-primary" id="createTodoSaveButton">{{ __('Save') }}</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" tabindex="-1" id="deleteTodoModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Delete todo') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="{{ __('Close') }}"></button>
            </div>
            <div class="modal-body">
                <div>
                    <p>{{ __('Are you sure you want to delete this todo?') }}</p>
                    <form id="deleteTodoForm" method="POST" id="deleteTodoForm">
                        @csrf
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
                <button type="button" class="btn btn-outline-danger" id="deleteTodoButton">{{ __('Delete') }}</button>
            </div>
        </div>
    </div>
</div>

<script>
    const createTodoSaveButton = document.querySelector('#createTodoSaveButton');
    const deleteTodoButton = document.querySelector('#deleteTodoButton');
    const createTodoForm = document.querySelector('#createTodoForm');
    const deleteTodoForm = document.querySelector('#deleteTodoForm');
    const deleteTodoButtons = document.querySelectorAll('.delete-todo-button');

    createTodoSaveButton.addEventListener('click', function (e) {
        submitForm(createTodoForm);
    });

    deleteTodoButton.addEventListener('click', function (e) {
        submitForm(deleteTodoForm);
    })

    deleteTodoButtons.forEach(function (button) {
        button.addEventListener('click', function (e) {
            const url = button.getAttribute('data-delete-url');
            deleteTodoForm.action = url;
        });
    });

    function submitForm(form) {
        if (!form instanceof HTMLFormElement) {
            return;
        }
        form.submit();
    }
</script>
@endsection