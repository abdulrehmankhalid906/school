@extends('layouts.app')
@section('content')
<style>
    .form-check {
        padding-left: 2.5em !important;
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
                    <h5 class="card-title">Fee Terrif</h5>
                    <form action="{{ route('generate-fee-tarrif') }}" method="POST">
                        @csrf
                        <div class="row">
                            <p>Payable : <span id="payable">N.A</span></p>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label class="form-label">Select Student</label>
                                <select class="form-select" aria-label="Default select example" name="student_id" id="name">
                                    <option>Select One</option>
                                    @if(count($students)>0)
                                        @foreach ($students as $student)
                                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">Select Month</label>
                                <select class="form-select" aria-label="Default select example" name="payment_month" id="payment_month">
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
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="inputNumber" class="form-label">Total Amount</label>
                                <input type="text" class="form-control" name="total_amount" id="total_amount" readonly>
                            </div>

                            <div class="col-sm-6">
                                <label for="inputNumber" class="form-label">Paid Amount</label>
                                <input type="text" class="form-control" name="paid_amount" id="paid_amount" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <label for="inputNumber" class="form-label">Remining Amount</label>
                                <input type="text" class="form-control" name="remaining_amount" id="remaining_amount" readonly>
                            </div>

                            <div class="col-sm-6">
                                <label for="inputNumber" class="form-label">Payment Date</label>
                                <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" name="payment_date" id="payment_date" readonly>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" id="changesMade" name="payment_status">
                                <label class="form-check-label" for="changesMade">
                                    Fee Status ?
                                </label>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-sm-10">
                                <input type="submit" class="btn btn-primary" value="Fee Slip">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script>
$(document).ready(function () {
    $('#name').change(function () {
        var getValue = $('#name').val();

        $.ajax({
            url: "{{ route('get-user-fee') }}",
            type: "GET",
            data: {
                value: getValue
            },
            success: function (res) {
                $('#payable').empty();

                if (res.length > 0) {
                    res.forEach(function (student) {
                        var html = `<span>${student.fee}</span>`;
                        $('#payable').append(html);
                    });

                    // Get the total amount and set it to the #total_amount input
                    var totalAmount = res.reduce(function (total, student) {
                        return total + student.fee;
                    }, 0);

                    $('#total_amount').val(totalAmount);
                } else {
                    $('#payable').append(`<span>N.A</span>`);
                }
            },
            error: function () {
                console.error("Error");
            },
        });
    });

    //calculating the amount....
    function CalculatingAmount() {
        var get_totalAmount = parseFloat($('#total_amount').val()) || 0;
        var get_paidAmount = parseFloat($('#paid_amount').val()) || 0;

        if (get_paidAmount > get_totalAmount) {
            alert("Paid amount cannot be greater than the total amount.");

            $('#paid_amount').val(get_totalAmount);
            get_paidAmount = get_totalAmount;
        }

        var get_remainingAmount = get_totalAmount - get_paidAmount;
        $('#remaining_amount').val(get_remainingAmount);
    }

    $('#paid_amount').keyup(function () {
        CalculatingAmount();
    });
});
</script>
