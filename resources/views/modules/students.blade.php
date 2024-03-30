@extends('layouts.app')
@section('content')
<section class="section">
    <div class="row">
        <div class="col-12">
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">Students</h5>

                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Subjects</th>
                                <th scope="col">Status</th>
                                <th scope="col">Fee</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <th>{{ $student->id }}</th>
                                    <td>{{ $student->name}}</td>
                                    <td>
                                        @foreach ($student->subjects as $subject)
                                            {{ $subject->name }}
                                            @if (!$loop->last)
                                                ,
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @if( $student->status == 0)
                                            <span class="badge rounded-pill bg-danger">Unverified</span>
                                        @else
                                            <span class="badge rounded-pill bg-success">Verfied</span>
                                        @endif
                                    </td>
                                    <td>{{ $student->fee }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-eye"></i></a>
                                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-info btn-sm"><i class="bi bi-eyedropper"></i></a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger btn-sm bi bi-trash"></button>
                                        </form>
                                    </td>
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
