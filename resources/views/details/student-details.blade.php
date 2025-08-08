@extends('master')

@section('title', 'Student Details')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .section-title {
            font-weight: 600;
            font-size: 1.2rem;
            color: #0d6efd;
            border-bottom: 2px solid #dee2e6;
            padding-bottom: 5px;
            margin-bottom: 20px;
        }
        .data-label {
            font-weight: 500;
            color: #6c757d;
        }
        .data-value {
            font-weight: 600;
            color: #212529;
        }
    </style>
    <div class="d-flex justify-content-between">
        <div>
            <h2 class="mb-4 text-center fw-bold text-uppercase text-primary">Student Profile</h2>
        </div>
        <div>
            <!-- Navigation -->
            <div class="text-center">
                <a href="{{ route('student.show') }}" class="btn btn-outline-secondary px-4">
                    <i class="bi bi-arrow-left"></i> Back to List
                </a>
            </div>
        </div>
    </div>


    <!-- Basic Info -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="section-title">Personal Information</div>
            <div class="mb-2"><span class="data-label">Name:</span> <span class="data-value">{{ $student->name }}</span></div>
            <div class="mb-2"><span class="data-label">Enrollment No:</span> <span class="data-value">{{ $student->enrollment }}</span></div>
            <div class="mb-2"><span class="data-label">Gender:</span> <span class="data-value">{{ $student->gender }}</span></div>
            <div class="mb-2"><span class="data-label">Date of Birth:</span> <span class="data-value">{{ $student->dob }}</span></div>
            <div class="mb-2"><span class="data-label">Email:</span> <span class="data-value">{{ $student->email }}</span></div>
            <div class="mb-2"><span class="data-label">Phone:</span> <span class="data-value">{{ $student->phone }}</span></div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="section-title">Family & Status</div>
            <div class="mb-2"><span class="data-label">Father's Name:</span> <span class="data-value">{{ $student->father }}</span></div>
            <div class="mb-2"><span class="data-label">Mother's Name:</span> <span class="data-value">{{ $student->mother }}</span></div>
            <div class="mb-2"><span class="data-label">Status:</span>
                <span class="badge bg-{{ $student->status == 'Active' ? 'success' : 'danger' }}">{{ $student->status }}</span>
            </div>
            <div class="mb-2"><span class="data-label">Photo:</span><br>
                @if($student->photo)
                    <img src="{{ asset($student->photo) }}" alt="Photo" width="120" class="rounded mt-1 border">
                @else
                    <em class="text-muted">No photo uploaded</em>
                @endif
            </div>
        </div>
    </div>

    <!-- Course & Address Info -->
    <div class="row mb-4">
        <div class="col-md-6 mb-3">
            <div class="section-title">Course Details</div>
            <div class="mb-2"><span class="data-label">Course:</span> <span class="data-value">{{ $student->course }}</span></div>
            <div class="mb-2"><span class="data-label">Batch:</span> <span class="data-value">{{ $student->batch }}</span></div>
            <div class="mb-2"><span class="data-label">Admission Date:</span> <span class="data-value">{{ $student->admission_date }}</span></div>
        </div>

        <div class="col-md-6 mb-3">
            <div class="section-title">Address & Reference</div>
            <div class="mb-2"><span class="data-label">Address:</span> <span class="data-value">{{ $student->address ?? '-' }}</span></div>
            <div class="mb-2"><span class="data-label">City/State:</span>
                <span class="data-value">{{ $student->city ?? '-' }} / {{ $student->state ?? '-' }}</span>
            </div>
            <div class="mb-2"><span class="data-label">Postal Code:</span> <span class="data-value">{{ $student->postal_code ?? '-' }}</span></div>
            <div class="mb-2"><span class="data-label">Country:</span> <span class="data-value">{{ $student->country ?? '-' }}</span></div>
        </div>
    </div>

    <!-- Fees Section -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="section-title">Fees Info</div>
            <div class="mb-2"><span class="data-label">Total Fee:</span> <span class="data-value">৳ {{ number_format($student->total_fee) }}</span></div>
            <div class="mb-2"><span class="data-label">Paid:</span> <span class="data-value">৳ {{ number_format($student->fee_paid ?? 0) }}</span></div>
        </div>

        <div class="col-md-6">
            <div class="section-title">Referrals</div>
            <div class="mb-2"><span class="data-label">Referring Agency:</span> <span class="data-value">{{ $student->ref_agency ?? '-' }}</span></div>
            <div class="mb-2"><span class="data-label">Lead Reference:</span> <span class="data-value">{{ $student->ref_lead ?? '-' }}</span></div>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="section-title">Transaction History</div>
            <table class="table table-hover">
                @php $count=1; @endphp
                <tr>
                    <th>#</th>
                    <th>Amount</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
                <tbody>

                    @forelse($transaction as $t)
                        <tr>
                            <td>{{$count++}}</td>
                            <td>{{$t->amount}} INR</td>
                            <td>
                                <div class="small text-muted">{{ $t->created_at->format('M d, Y') }}</div>
                                <div class="small text-muted">{{ $t->created_at->format('h:i A') }}</div>
                            </td>
                            <td>
                                <a href="{{route('trans.details',$t->id)}}" role="button" class="btn btn-sm btn-outline-info ">SEE</a>
                            </td>
                        </tr>
                    @empty
                        <td colspan="4" class="text-center text-muted py-5">No Transaction found</td>
                    @endforelse



                </tbody>
            </table>
        </div>
    </div>



@endsection
