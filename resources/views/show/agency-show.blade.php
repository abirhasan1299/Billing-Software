@extends('master')
@section('title','Dashboard')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .table-container {
            max-width: 100%;
            padding: 30px;
        }
        .table-responsive {
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            background: #ffffff;
            overflow-x: auto;
        }
        table th {
            white-space: nowrap;
        }
    </style>

    @if(session('success'))
        <x-success-message type="success" message="{{session('success')}}" />
    @endif

       <div class="d-flex justify-content-between">
           <div>
               <a href="{{route('agency.add')}}" class="btn btn-primary" role="button">Add New <i class="ti ti-plus"></i></a>
           </div>
           <div>
               <input type="search" id="searchInput" class="form-control" placeholder="Search...">
           </div>
       </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle" id="agencyTable">
                <thead class="table-dark text-center">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Contact Phone</th>
                    <th>Fee/Student</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @php $count=1; @endphp
                <!-- Sample row (You can loop through actual data here) -->
                @foreach($data as $d)
                <tr>
                    <td>{{$count++}}</td>
                    <td>{{$d->name}}</td>
                    <td>{{$d->type}}</td>
                    <td>{{$d->contact_phone}}</td>
                    <td>{{$d->fee_per_student}}</td>
                    <td>{{$d->total_amount}}</td>
                    <td>
                        <div class="form-check form-switch">
                            <input {{ $d->status === 'Active' ? 'checked' : '' }} class="form-check-input" type="checkbox"  id="statusToggle">
                            <label class="form-check-label" for="statusToggle" id="statusLabel">{{$d->status}}</label>
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-success">View</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                @endforeach
                <!-- Add more rows dynamically from backend -->
                </tbody>
            </table>
        </div>
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function () {
            const input = this.value.toLowerCase();
            const rows = document.querySelectorAll("#agencyTable tbody tr");

            rows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(input) ? "" : "none";
            });
        });
    </script>
@endsection
