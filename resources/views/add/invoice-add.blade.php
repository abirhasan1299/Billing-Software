@extends('master')
@section('title','Invoice Add')

@section('content')
<style>
    body {
        background-color: #f7f9fc;
    }
    .invoice-container {
        max-width: 1000px;
        margin: 40px auto;
    }
    .invoice-card {
        background: #ffffff;
        border-radius: 1rem;
        padding: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
    }
    .section-title {
        font-size: 1.2rem;
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 20px;
    }
    .form-label {
        font-weight: 500;
    }
</style>
<div class="invoice-card">
    <h3 class="mb-4 text-primary text-center">🧾 Generate Invoice</h3>
    <form>

        <!-- Invoice Info -->
        <div class="mb-4">
            <div class="section-title">📄 Invoice Details</div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Invoice Number</label>
                    <input type="text" name="invoice_number" class="form-control" placeholder="INV20250801">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Invoice Date</label>
                    <input type="date" name="invoice_date" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Due Date</label>
                    <input type="date" name="due_date" class="form-control">
                </div>
            </div>
        </div>

        <!-- Student Section -->
        <div class="mb-4">
            <div class="section-title">🎓 Student Information</div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Select Student</label>
                    <select class="form-select" name="student_id">
                        <option selected disabled>Choose student</option>
                        <option value="1">Abir Hasan</option>
                        <option value="2">Sadia Rahman</option>
                        <!-- Dynamic list from DB -->
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Course / Batch</label>
                    <input type="text" name="course_batch" class="form-control" placeholder="e.g. BBA - Spring 2025">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Total Fee</label>
                    <input type="number" name="total_fee" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Fee Paid</label>
                    <input type="number" name="fee_paid" class="form-control">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Balance Due</label>
                    <input type="number" name="balance_due" class="form-control">
                </div>
            </div>
        </div>

        <!-- Agency Section -->
        <div class="mb-4">
            <div class="section-title">🏢 Agency / Referral</div>
            <div class="row g-3">
                <div class="col-md-6">
                    <label class="form-label">Referring Agency</label>
                    <input type="text" name="ref_agency" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Amount to Pay Agency</label>
                    <input type="number" name="agency_payment" class="form-control">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Lead Reference (Optional)</label>
                    <input type="text" name="lead_reference" class="form-control">
                </div>
            </div>
        </div>

        <!-- Notes -->
        <div class="mb-3">
            <label class="form-label">Remarks / Notes</label>
            <textarea class="form-control" name="remarks" rows="3" placeholder="Any additional information..."></textarea>
        </div>

        <!-- Submit -->
        <div class="text-center mt-4">
            <button type="submit" class="btn btn-success px-5">💾 Save Invoice</button>
        </div>

    </form>
</div>
@endsection
