@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">User Profile</h5>
                        <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" readonly> --}}
                            <div class="row mb-3">
                                <div class="col-sm-2">
                                    <label for="inputText">Profile Image:</label>
                                    <img src="{{ asset('storage/images/' .$user->user_image) }}" alt="{{ $user->user_image ?? 'No Image' }} {{ $user->name }}" class="img-fluid">
                                </div>

                                <div class="col-sm-10">
                                    <input type="file" class="form-control" name="user_image" id="user_image">
                                    <span>Old Image Absolute Path: "{{$user->user_image ? $user->user_image : 'NILL' }}"</span>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <label for="inputText">Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{$user && $user->name ? $user->name : ''}}">
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputText">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{$user && $user->email ? $user->email : ''}}">
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputText">Loggedin As</label>
                                    <input type="text" class="form-control" name="loggedin" id="loggedin" disabled value="{{ $user && $user->loggedin ? $user->loggedin : 'Admin' }}">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <label for="inputText">Old Password</label>
                                    <input type="password" class="form-control" name="old-password" id="old-password">
                                </div>

                                <div class="col-sm-4">
                                    <label for="inputText">New Password</label>
                                    <input type="password" class="form-control" name="new-password" id="new-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-primary" value="Update Profile">
                                </div>
                            </div>
                        </form>

                        <hr>

                        <h5 class="card-title">Delete Profile</h5>
                        <form action="{{ route('delete-profile') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="row mb-3">
                                <div class="col-sm-12">
                                    <label for="inputText">Are you sure? You want to delete your profile.</label>
                                    <input type="checkbox" name="delete_profile" id="delete_profile" value="on">
                                </div>
                                @error('delete_profile')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-4">
                                    <input type="submit" class="btn btn-danger" value="Delete Profile">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="section profile">
        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('storage/images/' . Auth::user()->user_image) }}" alt="Profile" class="rounded-circle">
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>{{ Auth::user()->loggedin ?? 'Admin' }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body pt-3">
                        <ul class="nav nav-tabs nav-tabs-bordered">

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                        </li>

                        <li class="nav-item">
                            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-delete">Delete Account</button>
                        </li>
                        </ul>

                        <div class="tab-content pt-2">

                            <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                                <form action="{{ route('update-profile') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row mb-3">
                                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                        <div class="col-md-8 col-lg-9">
                                        <img src="{{ asset('storage/images/' . Auth::user()->user_image) }}" alt="Profile">
                                        <div class="pt-2">
                                            <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                            <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                                        </div>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="name" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="name" id="name" value="{{$user && $user->name ? $user->name : ''}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="email" class="form-control" name="email" id="email" value="{{$user && $user->email ? $user->email : ''}}">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="loggedin" class="col-md-4 col-lg-3 col-form-label">LoggedIn As</label>
                                        <div class="col-md-8 col-lg-9">
                                            <input type="text" class="form-control" name="loggedin" id="loggedin" disabled value="{{ $user && $user->loggedin ? $user->loggedin : 'Admin' }}">
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <input type="submit" class="btn btn-primary" value="Save Changes">
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane fade pt-3" id="profile-change-password">
                                <form action="{{ route('update-profile') }}" method="POST">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <label for="inputText">Old Password</label>
                                            <input type="password" class="form-control" name="old-password" id="old-password">
                                        </div>

                                        <div class="col-sm-4">
                                            <label for="inputText">New Password</label>
                                            <input type="password" class="form-control" name="new-password" id="new-password">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <input type="submit" class="btn btn-primary" value="Update Profile">
                                        </div>
                                    </div>
                                </form>

                            </div>

                            <div class="tab-pane fade pt-3" id="profile-delete">
                                <form action="{{ route('delete-profile') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="row mb-3">
                                        <div class="col-sm-12">
                                            <label for="inputText">Are you sure? You want to delete your profile.</label>
                                            <input type="checkbox" name="delete_profile" id="delete_profile" value="on">
                                        </div>
                                        @error('delete_profile')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-4">
                                            <input type="submit" class="btn btn-danger" value="Delete Profile">
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
