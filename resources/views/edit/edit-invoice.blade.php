@extends('master')
@section('title','Invoice Edit')

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

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class="invoice-card">
        <h3 class="mb-4 text-primary text-center">📝 Edit Invoice</h3>
        <form action="{{route('invoice.update',$invoice->id)}}" method="POST" autocomplete="off">
            @csrf
            @method('PUT')

            <!-- Invoice Info -->
            <div class="mb-4">
                <div class="section-title">📄 Invoice Details</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Invoice Number</label>
                        <input type="text" name="invoice_number" class="form-control" value="{{ $invoice->invoice_number }}" readonly>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Invoice Date</label>
                        <input type="date" name="invoice_date" class="form-control @error('invoice_date') is-invalid @enderror" value="{{ old('invoice_date', $invoice->invoice_date) }}">
                        @error('invoice_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Due Date</label>
                        <input type="date" name="due_date" class="form-control @error('due_date') is-invalid @enderror" value="{{ old('due_date', $invoice->due_date) }}">
                        @error('due_date')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Student Section -->
            <div class="mb-4">
                <div class="section-title">🎓 Student Information</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Select Student</label><br>
                        <select class="select2 form-control @error('student_id') is-invalid @enderror" id="student" name="student_id" onchange="RetriveInfoStudent();">
                            <option value="">--select---</option>
                            @foreach($student as $s)
                                <option value="{{ $s->id }}" {{ (old('student_id', $invoice->student_id) == $s->id) ? 'selected' : '' }}>
                                    {{ $s->enrollment }} | {{ $s->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('student_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Course / Batch</label>
                        <input type="text" id="course_batch" class="form-control" value="{{ $course_batch ?? '' }}" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Total Fee</label>
                        <input type="number" id="total_fee" class="form-control" value="{{ $total_fee ?? '' }}" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label text-danger"><b>Balance Due</b></label>
                        <input type="number" id="balance_due" class="form-control" value="{{ $balance_due ?? '' }}" readonly>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label text-success">*Current Payable Amount*</label>
                        <input type="number" id="payment" name="pay_amount_student" class="form-control @error('pay_amount_student') is-invalid @enderror" value="{{ old('pay_amount_student', $invoice->pay_amount_student) }}">
                        @error('pay_amount_student')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Agency Section -->
            <div class="mb-4">
                <div class="section-title">🏢 Agency / Referral</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Select Agency</label><br>
                        <select class="select2 form-control @error('agency_id') is-invalid @enderror" id="agency" name="agency_id">
                            <option value="">--select---</option>
                            @foreach($agency as $s)
                                <option value="{{ $s->id }}" {{ (old('agency_id', $invoice->agency_id) == $s->id) ? 'selected' : '' }}>
                                    {{ $s->name }} | {{ $s->type }}
                                </option>
                            @endforeach
                        </select>
                        @error('agency_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Amount to Pay Agency</label>
                        <input type="number" name="pay_amount_agency" class="form-control @error('pay_amount_agency') is-invalid @enderror" value="{{ old('pay_amount_agency', $invoice->pay_amount_agency) }}">
                        @error('pay_amount_agency')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Lead Reference (Optional)</label>
                        <input type="text" name="lead_ref" class="form-control @error('lead_ref') is-invalid @enderror" value="{{ old('lead_ref', $invoice->lead_ref) }}">
                        @error('lead_ref')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Notes -->
            <div class="mb-3">
                <label class="form-label">Remarks / Notes</label>
                <textarea class="form-control @error('notes') is-invalid @enderror" name="notes" rows="3">{{ old('notes', $invoice->notes) }}</textarea>
                @error('notes')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Submit -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5">💾 Update Invoice</button>
            </div>
        </form>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function () {
                $('#student').select2({
                    placeholder: "Search & Select Student",
                    allowClear: true
                });
                $('#agency').select2({
                    placeholder: "Search & Select Agency",
                    allowClear: true
                });

                // Automatically fetch student info on edit load
                if ($('#student').val()) {
                    RetriveInfoStudent();
                }
            });

            function RetriveInfoStudent() {
                var studentId = $('#student').val();
                var csrf = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('invoice.ajaxShow') }}",
                    method: "POST",
                    data: { student_id: studentId, _token: csrf },
                    success: function (response) {
                        $("#total_fee").val(response[0].total_fee);
                        $("#course_batch").val("Batch: " + response[0].batch + " & Course: " + response[0].course);
                        $("#balance_due").val(response[0].total_fee - response[0].fee_paid);
                    },
                    error: function () {
                        alert("No Data Found");
                    }
                });
            }
        </script>
    @endpush

@endsection
