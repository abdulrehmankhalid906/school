@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <div class="card-title">
                        <div class="row">
                            <div class="col-lg-6">
                                <h4>Subjects</h4>
                            </div>

                            <div class="col-lg-6 d-flex justify-content-end">
                                <a href="{{ route('subjects.create') }}" class="btn btn-primary btn-sm">Add New</a>
                            </div>
                        </div>
                    </div>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <td scope="col">{{ $subject->id }}</td>
                                    <td scope="col">{{ $subject->name }}</td>
                                    <td scope="col">{{ $subject->created_at }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
