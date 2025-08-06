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
            <h4 class="mb-4 text-primary text-center">Board / Center Update</h4>
            <form action="{{route('agency.update',$agency->id)}}" method="post" >
                @csrf
                <div class="row g-3">
                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Center / Board Name</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$agency->name}}">
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Institution Type</label>
                            <select class="form-select @error('type') is-invalid @enderror" name="type">
                                <option selected value="{{$agency->type}}">{{$agency->type}}</option>
                                <option value="Board">Board</option>
                                <option value="University">University</option>
                                <option value="Center">Center</option>
                                <option value="Agency">Agency</option>
                                <option value="None">None</option>
                            </select>
                            @error('type')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Person</label>
                            <input type="text" class="form-control @error('contact_person') is-invalid @enderror" name="contact_person" value="{{$agency->contact_person}}">
                            @error('contact_person')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Email</label>
                            <input type="email" class="form-control  @error('contact_email') is-invalid @enderror" name="contact_email" value="{{$agency->contact_email}}">
                            @error('contact_email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Contact Phone</label>
                            <input type="tel" class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone" value="{{$agency->contact_phone}}">
                            @error('contact_phone')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Institution Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" rows="2" name="address" >{{$agency->address}}</textarea>
                            @error('address')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{$agency->country}}">
                            @error('country')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Institution Status</label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status">
                                <option selected value="{{$agency->status}}">{{$agency->status}}</option>
                                <option value="Active">Active</option>
                                <option value="Inactive">Inactive</option>
                            </select>
                            @error('status')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">State/Province</label>
                            <input type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{$agency->state}}">
                            @error('state')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{$agency->city}}">
                            @error('city')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Postal Code</label>
                            <input type="text" class="form-control @error('postal_code') is-invalid @enderror" name="postal_code" value="{{$agency->postal_code}}">
                            @error('postal_code')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Bank Account Details</label>
                            <input type="text" class="form-control @error('bank_details') is-invalid @enderror" name="bank_details" value="{{$agency->bank_details}}">
                            @error('bank_details')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Payment Terms</label>
                            <input type="text" class="form-control @error('payment_term') is-invalid @enderror" name="payment_term" placeholder="e.g., Monthly, Semester-wise" value="{{$agency->payment_term}}">
                            @error('payment_term')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fee Per Student</label>
                            <input type="number" class="form-control @error('fee_per_student') is-invalid @enderror" name="fee_per_student" step="0.01" value="{{$agency->fee_per_student}}">
                            @error('fee_per_student')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Payable Amount</label>
                            <input type="number" class="form-control @error('total_amount') is-invalid @enderror" name="total_amount" step="0.01" value="{{$agency->total_amount}}">
                            @error('total_amount')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Remarks / Notes</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" rows="2" name="notes">{{$agency->notes}}</textarea>
                            @error('notes')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
