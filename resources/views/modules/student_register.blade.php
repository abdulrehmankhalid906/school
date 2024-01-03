@extends('layouts.app')
@section('content')
<style>
    .form-check {
        padding-left: 11.5em !important;
    }
    .form-check-input[type=checkbox] {
        border-radius: 5.25em !important;
    }

</style>
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Register Student</h5>
                    <form action="{{ route('students.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="phone" id="phone" requireds>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Class</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="class" id="class" requireds>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Subjects</label>
                            <div class="col-sm-10">
                                <select class="form-select" multiple aria-label="multiple select example" name="subject_id[]" id="subject_id">
                                    <option value="" selected>Please select one</option>
                                    @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Fee <small>(Amount)</small></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="fee" id="fee" requireds>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="changesMade" name="status">
                            <label class="form-check-label" for="changesMade">
                                Student Verification ?
                            </label>
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
</section>
@endsection
