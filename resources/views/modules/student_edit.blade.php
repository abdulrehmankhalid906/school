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
                    <h5 class="card-title">Edit Student</h5>
                    <form action="{{ route('students.update', $student->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="name" id="name" value={{ $student->name }}>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Phone</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="phone" id="phone" value="{{ $student->phone }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Class</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="class" id="class" value="{{ $student->class }}" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Subjects</label>
                            <div class="col-sm-10">
                                <select class="form-select" multiple aria-label="multiple select example" name="subject_id[]" id="subject_id">
                                    <option value="">Please select one</option>
                                        @if(count($subjects)>0)
                                            @foreach ($subjects as $subject)
                                                <option value="{{ $subject->id }}" {{ in_array($subject->id, old('subject_id', json_decode($student->subject_id, true) ?? [])) ? 'selected' : '' }}>
                                                    {{ $subject->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Fee <small>(Amount)</small></label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="fee" id="fee" value="{{ $student->fee }}" required>
                            </div>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="changesMade" name="status" {{ $student->status ? 'checked' : '' }}>
                            <label class="form-check-label" for="changesMade">
                                Student Verification ?
                            </label>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
