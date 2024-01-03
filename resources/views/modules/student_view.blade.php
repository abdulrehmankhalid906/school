@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Student Record</h5>

                    <table class="table">
                        <div class="row">
                            <span><h6>Student ID: {{ $students->id }}</h6></span>
                        </div>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <td>{{ $students->name }}</td>
                            </tr>
                            <tr>
                                <th>Phone</th>
                                <td>{{ $students->phone }}</td>
                            </tr>
                            <tr>
                                <th>Class</th>
                                <td>{{ $students->class }}</td>
                            </tr>
                            <tr>
                                <th>Subjects</th>
                                <td>{{ $students->subject_id }}</td>
                            </tr>
                            <tr>
                                <th>Fee</th>
                                <td>{{ $students->fee }} PKR</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
