@extends('layout')
@section('title', "Employee")
@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">
                    @if (isset($user))
                        Update User Details
                    @else
                        Create New User
                    @endif
                </h2>
                <form name="myForm" method="post"
                      action="{{ isset($user) ? route('user.update', ['user' => $user->id]) : route('user.user') }}">
                    @csrf
                    @if (isset($user))
                        @method('PUT')
                        <input type="hidden" name="sno" id="sno" value="{{ $user->id }}">
                    @endif

                    <div class="mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" name="name" id="name" class="form-control"
                               placeholder="Enter your Name" value="{{ $user->name ?? '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail:</label>
                        <input type="email" name="email" id="email" class="form-control"
                               placeholder="Enter your Email" value="{{ $user->email ?? '' }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="age" class="form-label">Age:</label>
                        <input type="number" name="age" id="age" class="form-control"
                               placeholder="Enter your Age" value="{{ $user->age ?? '' }}">
                    </div>

                    <div class="mb-3">
                        <label for="position" class="form-label">Position:</label>
                        <input type="text" name="position" id="position" class="form-control"
                               placeholder="Enter your Position" value="{{ $user->position ?? '' }}">
                    </div>

                    <div class="mb-4">
                        <label for="company" class="form-label">Company:</label>
                        <input type="text" name="company" id="company" class="form-control"
                               placeholder="Enter your Company" value="{{ $user->company ?? '' }}">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            {{ isset($user) ? 'Update' : 'Submit' }}
                        </button>

                        <button type="button" id="{{ isset($user) ? 'cancelEdit' : 'cancel' }}"
                                class="btn btn-secondary">
                            {{ isset($user) ? 'Cancel Edit' : 'Reset' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

