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
    @if(session('danger'))
        <x-success-message type="danger" message="{{session('danger')}}" />
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
                        <span class="badge bg-{{$d->status=='Active'?'success':'danger'}}">{{ $d->status }}</span>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around">
                            <a class="btn btn-sm btn-outline-info" href="{{route('agency.edit',$d->id)}}" role="button"><i class="bi bi-pencil-square"></i></a>
                            <a class="btn btn-sm btn-outline-success" href="{{route('agency.details',$d->id)}}" role="button"><i class="bi bi-eye-fill"></i></a>
                            <form action="{{route('agency.destroy',$d->id)}}" method="post" onsubmit="return confirm('Are you sure to delete ?');">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-sm btn-outline-danger" type="submit"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
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
