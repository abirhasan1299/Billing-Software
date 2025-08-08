@extends('master')
@section('title','Student Add')

@section('content')
    <style>
        body {
            background-color: #f5f7fa;
        }
        .form-section {
            /*max-width: 1000px;*/
            /*margin: 40px auto;*/
        }
        .form-card {
            background: #fff;
            border-radius: 1rem;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            padding: 30px;
        }
        .form-label {
            font-weight: 500;
        }
        .form-title {
            font-weight: bold;
            color: #1d3557;
        }
        .form-control, .form-select {
            border-radius: 0.375rem;
        }
        .photo-preview {
            width: 120px;
            height: 120px;
            border-radius: 0.5rem;
            object-fit: cover;
            border: 2px solid #ccc;
        }
    </style>

    <div class="form-section">
        <div class="form-card">
            <h4 class="mb-4 form-title text-center" >🎓 Student Enrollment Form</h4>
            <form action="{{ route('student.insert') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row g-3">

                    <!-- Left Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Enrollment Number</label>
                            <input type="text" name="enrollment" class="form-control" value="{{ old('enrollment') }}">
                            @error('enrollment') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
                            @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" id="date" class="form-control" value="{{ old('dob') }}">
                            @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}">
                            @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="tel" name="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-select">
                                <option disabled selected>Select gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                                <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Father's Name</label>
                            <input type="text" name="father" class="form-control" value="{{ old('father') }}">
                            @error('father') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Mother's Name</label>
                            <input type="text" name="mother" class="form-control" value="{{ old('mother') }}">
                            @error('mother') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2">{{ old('address') }}</textarea>
                            @error('address') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">City</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}">
                            @error('city') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">State</label>
                            <input type="text" name="state" class="form-control" value="{{ old('state') }}">
                            @error('state') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Postal Code</label>
                            <input type="text" name="postal_code" class="form-control" value="{{ old('postal_code') }}">
                            @error('postal_code') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Country</label>
                            <input type="text" name="country" class="form-control" value="{{ old('country') }}">
                            @error('country') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Course / Program</label>
                            <input type="text" name="course" class="form-control" value="{{ old('course') }}">
                            @error('course') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Batch / Session</label>
                            <input type="text" name="batch" class="form-control" value="{{ old('batch') }}">
                            @error('batch') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Admission Date</label>
                            <input type="date" id="date" name="admission_date" class="form-control" value="{{ old('admission_date') }}">
                            @error('admission_date') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Full Row -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label">Status</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="Active" {{ old('status') == 'Active' ? 'checked' : '' }}>
                                <label class="form-check-label">Active</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" value="Inactive" {{ old('status') == 'Inactive' ? 'checked' : '' }}>
                                <label class="form-check-label">Inactive</label>
                            </div>
                            @error('status') <br><small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Fee</label>
                            <input type="number" name="total_fee" class="form-control" value="{{ old('total_fee') }}">
                            @error('total_fee') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fee Paid</label>
                            <input type="number" name="fee_paid" class="form-control" value="{{ old('fee_paid') }}">
                            @error('fee_paid') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Referring Agency (optional)</label>
                            <input type="text" name="ref_agency" class="form-control" value="{{ old('ref_agency') }}">
                            @error('ref_agency') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Lead Reference (optional)</label>
                            <input type="text" name="ref_lead" class="form-control" value="{{ old('ref_lead') }}">
                            @error('ref_lead') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Image Upload & Preview -->
                    <div class="col-md-6 text-center">
                        <label class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control mb-2" onchange="previewImage(event)">
                        <img id="preview" class="photo-preview" src="https://via.placeholder.com/120" alt="Preview">
                        @error('photo') <br><small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
            </form>

        </div>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('preview').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>


@endsection
