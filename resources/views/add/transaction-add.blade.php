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
    <form>
        <div class="row g-3">
            <!-- Transaction Type -->
            <div class="col-md-6">
                <label for="transaction_type" class="form-label">Transaction Type</label>
                <select class="form-select" id="transaction_type" name="transaction_type" required>
                    <option value="">Select Type</option>
                    <option value="student_payment">Student Payment</option>
                    <option value="agency_payment">Agency Payment</option>
                    <option value="university_payment">University Payment</option>
                </select>
            </div>

            <!-- Payer/Receiver Name -->
            <div class="col-md-6">
                <label for="payer_receiver" class="form-label">Payer / Receiver</label>
                <input type="text" class="form-control" id="payer_receiver" name="payer_receiver" placeholder="e.g. John Doe / Agency Name" required>
            </div>

            <!-- Amount -->
            <div class="col-md-6">
                <label for="amount" class="form-label">Amount (৳)</label>
                <input type="number" class="form-control" id="amount" name="amount" placeholder="Enter amount" required>
            </div>

            <!-- Payment Mode -->
            <div class="col-md-6">
                <label for="payment_mode" class="form-label">Payment Mode</label>
                <select class="form-select" id="payment_mode" name="payment_mode" required>
                    <option value="">Select Mode</option>
                    <option value="cash">Cash</option>
                    <option value="bank_transfer">Bank Transfer</option>
                    <option value="cheque">Cheque</option>
                    <option value="upi">Mobile/UPI</option>
                </select>
            </div>

            <!-- Transaction Date -->
            <div class="col-md-6">
                <label for="transaction_date" class="form-label">Transaction Date</label>
                <input type="date" class="form-control" id="transaction_date" name="transaction_date" required>
            </div>

            <!-- Reference/Invoice ID -->
            <div class="col-md-6">
                <label for="reference_id" class="form-label">Reference / Invoice ID</label>
                <input type="text" class="form-control" id="reference_id" name="reference_id" placeholder="Optional">
            </div>

            <!-- Notes -->
            <div class="col-12">
                <label for="notes" class="form-label">Notes / Description</label>
                <textarea class="form-control" id="notes" name="notes" rows="3" placeholder="Optional details about the transaction"></textarea>
            </div>

            <!-- Submit -->
            <div class="col-12 text-end mt-3">
                <button type="submit" class="btn btn-primary">Make Transaction</button>
            </div>
        </div>
    </form>
</div>
@endsection
