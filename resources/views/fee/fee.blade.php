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
                                <h4>Fee Details</h4>
                            </div>

                            <div class="col-lg-4">
                            </div>
                            <div class="col-lg-2 col-sm-2 justify-content-end">
                                <a href="{{ route('create-fee') }}" class="btn btn-primary btn-sm">Add New</a>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-sm-4 justify-content-end">
                                <select class="form-select" aria-label="Default select example" id="filter_month">
                                    <option selected>Filter Months</option>
                                    <option value="January">January</option>
                                    <option value="February">February</option>
                                    <option value="March">March</option>
                                    <option value="April">April</option>
                                    <option value="May">May</option>
                                    <option value="June">June</option>
                                    <option value="July">July</option>
                                    <option value="August">August</option>
                                    <option value="September">September</option>
                                    <option value="October">October</option>
                                    <option value="November">November</option>
                                    <option value="December">December</option>
                                </select>
                            </div>
                        </div> --}}
                    </div>

                    <table class="table datatable" id="monthly_search">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Payment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
{{-- <script>
    $(document).ready(function(){
        $('#filter_month').change(function(){
            var filter_data = $('#filter_month').val();

            $.ajax({

                url: "{{ route('fetch-monthly-data') }}",
                type: "GET",
                data:
                {
                    //variable send to controller : variable of getting value with id like var filter_data
                    search_month: filter_data
                },

                success:function(data)
                {
                    console.log(data);
                    $('#monthly_search').empty();

                    if (data.length > 0)
                    {
                        data.forEach(function (getData)
                        {
                            var html =
                            `
                                <tr>
                                    <td>${getData.id}</td>
                                    <td>${getData.student.name }</td>
                                    <td>${getData.student.payment_status === 'on' ? 'Paid' : 'UnPaid'}</td>
                                </tr>
                            `;
                            $('#monthly_search').append(html);
                        });
                    }
                    else
                    {
                        $('#monthly_search').append(`<span>There are no data</span>`);
                    }
                },

                error:function(error)
                {
                    console.error("Error");
                },
            });
        });
    });
</script> --}}
