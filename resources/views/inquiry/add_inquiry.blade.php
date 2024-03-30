@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add/Create Inquiry</h5>
                        <form action="{{ route('inquires.store') }}" method="POST">
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" id="title" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Users</label>
                                <div class="col-sm-10">
                                    <select class="form-select" aria-label="select example" name="user_id" id="user_id" required>
                                        <option value="" selected>Please select one</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <input type="hidden" name="selected_subjects" id="selected_subjects" value="" readonly>

                            <div class="row mb-3">
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#subjectModal"> Add Subjects </button>
                                    <input type="submit" class="btn btn-primary btn-sm" value="Add">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- Location Modal --}}
    <div class="modal fade" id="subjectModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table datatable" id="dataTable">
                        <thead>
                            <tr>
                                <input type="checkbox" id="checkAll"><th></th>
                                <th scope="col">Name</th>
                            </tr>
                        </thead>

                        <tbody id="showsubjects">
                            @foreach($subjects as $subject)
                                <tr>
                                    <td scope="col"><input type="checkbox" class="checkbox" value="{{ $subject->id }}"></td>
                                    <td scope="col">{{ $subject->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-dark" id="apply_button">Apply</button>
                </div>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
        // Add checkbox for select all
        $("#checkAll").click(function() {
            var isChecked = $(this).prop("checked");
            $('input[type="checkbox"].checkbox').each(function() {
                $(this).prop("checked", isChecked);
            });
        });

        // Handle "Apply" button click
        $('#apply_button').click(function() {
            var selectedIds = [];
            $('#subjectModal input[type="checkbox"].checkbox:checked').each(function() {
                selectedIds.push($(this).val());
            });

            $('#selected_subjects').val(selectedIds.join(','));
            $('#subjectModal').modal('hide');
        });
    });
</script>
@endsection
