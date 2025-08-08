@extends('master')
@section('title','Transaction Add')

@section('content')
<style>
    body {
        background: #f1f4f9;
        font-family: 'Segoe UI', sans-serif;
    }
    .form-section {
        background: #fff;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);

        margin: 40px auto;
    }
    .form-title {
        font-weight: 600;
        font-size: 1.5rem;
        color: #0d6efd;
        margin-bottom: 20px;
    }
    .form-control, .form-select {
        border-radius: 10px;
    }
    .btn-primary {
        border-radius: 10px;
        padding: 10px 30px;
    }
</style>
<div class="form-section">
    <div class="form-title text-center">💳 Add New Transaction</div>
    <form method="post" action="{{route('trans.store')}}" autocomplete="off">
        @csrf
        <div class="row g-3">
            <!-- Transaction Type -->
            <div class="col-md-6">
                <label for="transaction_type" class="form-label">Transaction Type</label>
                <select class="form-select" id="type_selector" name="type" required>
                    <option selected disabled>Select Type</option>
                    <option value="0">Student Payment</option>
                    <option value="1">Agency Payment</option>
                    <option value="2">Custom Payment</option>
                </select>
                @error('type')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <!-- Payer/Receiver Name -->
            <div class="col-md-6">
                <div id="student_div" class="d-none">
                    <label class="form-label">Select Student</label><br>
                    <select class="select2 form-select" id="student" name="student_id">
                        <option value="">--Select---</option>
                        @foreach($student as $s)
                            <option value="{{ $s->id }}">{{ $s->enrollment }} | {{ $s->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="agency_div" class="d-none">
                    <label class="form-label">Select Agency</label><br>
                    <select class="select2 form-select" id="agency" name="agency_id">
                        <option value="">--Select---</option>
                        @foreach($agency as $s)
                            <option value="{{ $s->id }}">{{ $s->name }} | {{ $s->type }}</option>
                        @endforeach
                    </select>
                </div>

                <div id="payer_div" class="d-none">
                    <label class="form-label">Custom Payer/Receiver Email*</label><br>
                    <input type="email" class="form-control" id="custom" name="custom_payer" placeholder="John Doe. eg" >
                </div>
            </div>

            <!-- Amount -->
            <div class="col-md-6">
                <label for="amount" class="form-label">Amount (৳)</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
                @error('amount')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
            <input type="hidden" name="transaction_id" value="{{$idTrans}}">
            <!-- Payment Mode -->
            <div class="col-md-6">
                <label for="payment_mode" class="form-label">Payment Mode</label>
                <select class="form-select" id="payment_mode" name="method" required>
                    <option value="">Select Mode</option>
                    <option value="cash">Cash</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="cheque">Cheque</option>
                    <option value="upi">Mobile/UPI</option>
                </select>
                @error('method')
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <!-- Transaction Date -->
            <div class="col-md-6">
                <label for="transaction_date" class="form-label">Transaction Date</label>
                <input type="date" class="form-control" id="date" name="date" required>
                @error('date')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <!-- Reference/Invoice ID -->
            <div class="col-md-6">
                <label class="form-label">Select Invoice</label><br>
                <select class="select2 form-select" id="invoice" name="invoice_id">
                    <option value="">--Select---</option>
                    @foreach($invoice as $s)
                        <option value="{{ $s->id }}">{{ $s->invoice_number }} </option>
                    @endforeach
                </select>
                @error('invoice_id')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <!-- Notes -->
            <div class="col-12">
                <label for="notes" class="form-label">Notes / Description</label>
                <textarea class="form-control" id="notes" name="note" rows="3" placeholder="Optional details about the transaction"></textarea>
            </div>

            <!-- Submit -->
            <div class="col-12 text-end mt-3">
                <button type="submit" class="btn btn-primary">Make Transaction</button>
            </div>
        </div>
    </form>
</div>
@push('scripts')
    <script>
        $(document).ready(function () {
            $('#type_selector').on('change', function () {
                const selected = $(this).val();

                // Hide all specific sections first
                $('#student_div, #agency_div, #payer_div').addClass('d-none');


                if (selected === '0') {
                    $('#student_div').removeClass('d-none');
                    $('#agency').val('');
                    $('#custom').val('');
                    $('#student').select2({
                        placeholder: "Search & Select Student",
                        allowClear: true,
                        width: '100%'
                    });
                } else if (selected === '1') {
                    $('#agency_div').removeClass('d-none');
                    $('#student').val('');
                    $('#custom').val('');
                    $('#agency').select2({
                        placeholder: "Search & Select Agency",
                        allowClear: true,
                        width: '100%'
                    });
                } else if (selected === '2') {
                    $('#agency').val('');
                    $('#student').val('');
                    $('#payer_div').removeClass('d-none');
                }
            });
            $('#invoice').select2({
                placeholder: "Search & Select Invoices",
                allowClear: true,
                width: '100%'
            });
        });
    </script>
@endpush

@endsection
