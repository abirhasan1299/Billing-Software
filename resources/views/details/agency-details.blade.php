@extends('master')
@section('title', "Agency Details")

@section('content')

        <div class="card shadow-lg ">
            <div class="card-header bg-gradient bg-success text-white  py-4 px-4">
                <h3 class="mb-0">
                    <i class="bi bi-building"></i> Agency Details
                </h3>
            </div>

            <div class="card-body px-4 py-5">
                <div class="row g-4">

                    {{-- Basic Info --}}
                    <div class="col-lg-6">
                        <h5 class="border-bottom pb-2 text-primary">🗂 Basic Information</h5>
                        <p><strong>Name:</strong> {{ $agency->name }}</p>
                        <p><strong>Type:</strong> {{ $agency->type }}</p>
                        <p><strong>Status:</strong>
                            <span class="badge bg-{{ $agency->status === 'Active' ? 'success' : 'danger' }}">
                            {{ $agency->status }}
                        </span>
                        </p>
                        <p><strong>Notes:</strong> {{ $agency->notes ?? 'N/A' }}</p>
                    </div>

                    {{-- Contact Info --}}
                    <div class="col-lg-6">
                        <h5 class="border-bottom pb-2 text-primary">📞 Contact Information</h5>
                        <p><strong>Contact Person:</strong> {{ $agency->contact_person }}</p>
                        <p><strong>Email:</strong> <a href="mailto:{{ $agency->contact_email }}">{{ $agency->contact_email }}</a></p>
                        <p><strong>Phone:</strong> {{ $agency->contact_phone }}</p>
                        <p><strong>Address:</strong> {{ $agency->address }}</p>
                        <p><strong>City:</strong> {{ $agency->city }}</p>
                        <p><strong>State:</strong> {{ $agency->state }}</p>
                        <p><strong>Country:</strong> {{ $agency->country }}</p>
                        <p><strong>Postal Code:</strong> {{ $agency->postal_code }}</p>
                    </div>

                    {{-- Financial Info --}}
                    <div class="col-lg-6">
                        <h5 class="border-bottom pb-2 text-primary">💰 Financial Information</h5>
                        <p><strong>Bank Details:</strong> {{ $agency->bank_details }}</p>
                        <p><strong>Payment Terms:</strong> {{ $agency->payment_term }}</p>
                        <p><strong>Fee per Student:</strong> ${{ $agency->fee_per_student }}</p>
                        <p><strong>Total Amount:</strong> ${{ $agency->total_amount }}</p>
                    </div>
                </div>
            </div>

            <div class="card-footer bg-light rounded-bottom-5 text-end py-3 px-4">
                <a href="{{ route('agency.show') }}" class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left-circle"></i> Back
                </a>
                <a href="{{route('agency.edit',$agency->id)}}" class="btn btn-primary">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
            </div>
        </div>

@endsection
