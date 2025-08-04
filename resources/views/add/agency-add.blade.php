@extends('master')
@section('title','Add Center')
@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-section {
            max-width: 900px;
            margin: 40px auto;
        }
        .form-card {
            border-radius: 1rem;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: 500;
        }
    </style>
    <div class="row">
        <div class="card form-card p-4">
            <h4 class="mb-4 text-primary text-center">Board / Center Details</h4>
            <form>
                <div class="row g-3">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Center / Board Name</label>
                            <input type="text" class="form-control" name="institution_name">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Institution Type</label>
                            <select class="form-select" name="institution_type">
                                <option selected disabled>Select type</option>
                                <option value="Board">Board</option>
                                <option value="University">University</option>
                                <option value="Center">Center</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Person</label>
                            <input type="text" class="form-control" name="contact_person">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" class="form-control" name="contact_email">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Phone</label>
                            <input type="tel" class="form-control" name="contact_phone">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Institution Address</label>
                            <textarea class="form-control" rows="2" name="institution_address"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" class="form-control" name="institution_country">
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">State/Province</label>
                            <input type="text" class="form-control" name="institution_state">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control" name="institution_city">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Postal Code</label>
                            <input type="text" class="form-control" name="institution_postal_code">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Account Details</label>
                            <input type="text" class="form-control" name="institution_bank_account">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Terms</label>
                            <input type="text" class="form-control" name="payment_terms" placeholder="e.g., Monthly, Semester-wise">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fee Per Student</label>
                            <input type="number" class="form-control" name="fee_per_student" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Payable Amount</label>
                            <input type="number" class="form-control" name="total_payable_amount" step="0.01">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remarks / Notes</label>
                            <textarea class="form-control" rows="2" name="institution_notes"></textarea>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
