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
                                <h4>Generate Invoice</h4>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4 justify-content-end">
                                <select class="form-select" id="student-id">
                                    <option value="">Select Student</option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-2">
                                <button class="btn btn-primary" id="generate-invoice" style="display:none;"><i class="ri-download-cloud-fill"></i></button>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Month</th>
                                                <th>Paid Amount</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                        <tbody id="invoice_report">
                                            <td colspan="5" class="text-center">Select Student to Get Data</td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
    $(document).ready(function(){

        // Generate Invoice
        $('#student-id').change(function(){
            var student_data = $('#student-id').val();
            var generateInvoice = $('#generate-invoice').hide();

            $.ajax({
                url: "{{ route('generate-user-invoice') }}",
                type: "GET",
                data: {
                    search_student_data: student_data
                },
                success:function(data)
                {
                    $('#invoice_report').empty();
                    $('#generate-invoice').show(300);

                    var grandTotal = 0;

                    $.each(data, function(index, invoice) {
                        var newRow =
                        `<tr>
                            <td>${invoice.id}</td>
                            <td>${invoice.student.name}</td>
                            <td>${invoice.payment_month}</td>
                            <td>${invoice.paid_amount}</td>
                            <td>${invoice.payment_date}</td>
                        </tr>`;

                        $('#invoice_report').append(newRow);

                        grandTotal += parseInt(invoice.paid_amount);
                    });

                    var footerRow =
                    `<tr>
                        <th colspan="3"></th>
                        <th>Grand Total:</th>
                        <th>${grandTotal}</th>
                    </tr>`;
                    $('#invoice_report').append(footerRow);
                },
                error:function(error) {
                    console.error("Error");
                },
            });
        });


        //PDF Generation
        $('#generate-invoice').click(function(){

            var student_data = document.getElementById('student-id').value;

            $.ajax([
                url: "{{ route('generate-invoice-pdf') }}",
                type: "GET",

            ])
        })

    });
</script>
