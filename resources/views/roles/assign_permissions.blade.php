@extends('layouts.app')
@section('content')
<main>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Mange Permissions</h4>
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card shadow-lg border-0">
                            <div class="card-header">Role : {{ $role->name }}</div>
                            <div class="card-body">
                                <form action="{{ route('store-assign-permissions', $role->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        @foreach ($permissions as $permission)
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" name="permission[]" value="{{ $permission->name }}" 
                                                    {{ in_array($permission->name, $rolePermissions) ? 'checked' : '' }}>
                                                <label for="permission" class="form-check-label">{{ $permission->name }}</label>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-primary" value="Submit">
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

