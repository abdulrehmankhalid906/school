@extends('layouts.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Edit Role</h4>
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0">
                            <div class="card-body">
                                <form action="{{ route('users.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row mb-3">
                                        <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $user->name }}" name="name" id="name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $user->email }}" name="email" id="email" requireds>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label class="col-sm-2 col-form-label">Role</label>
                                        <div class="col-sm-10">
                                            <select class="form-select" name="role" id="role">
                                                <option value="" selected>Please select one</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
            
                                    <div class="row mb-3">
                                        <div class="col-sm-10">
                                            <input type="submit" class="btn btn-primary" value="Register">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</main>
@endsection