@extends('master')
@section('title','Student List')

@section('content')
    <style>
        body {
            background-color: #f5f7fa;
        }
        .table-container {
            max-width: 1000px;
            margin: 50px auto;
        }
        .table-title {
            font-weight: bold;
            font-size: 1.5rem;
            color: #1d3557;
            margin-bottom: 20px;
        }
        .status-active {
            background-color: #d1e7dd;
            color: #0f5132;
            border-radius: 0.375rem;
            padding: 4px 8px;
            font-size: 0.875rem;
        }
        .status-inactive {
            background-color: #f8d7da;
            color: #842029;
            border-radius: 0.375rem;
            padding: 4px 8px;
            font-size: 0.875rem;
        }
    </style>
    <div class="d-flex justify-content-between">
        <div>
            <a href="{{route('student.add')}}" class="btn btn-primary" role="button">Add New <i class="ti ti-plus"></i></a>
        </div>
        <div>
            <input type="search" id="searchInput" class="form-control" placeholder="Search...">
        </div>
    </div>
    <br>
    @if(session('success'))
        <x-success-message type="success" message="{{session('success')}}" />
    @endif
    @if(session('danger'))
        <x-success-message type="danger" message="{{session('danger')}}" />
    @endif

        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover align-middle" id="studentTable">
                <thead class="table-dark text-center">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Enrollment</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
@php $count=1; @endphp
                <tbody class="text-center">
                @forelse($students as $student)
                    <tr>
                        <td>{{$count++}}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->enrollment }}</td>
                        <td>{{ $student->phone }}</td>
                        <td>{{ $student->course }}</td>
                        <td>
                            <span class="badge bg-{{$student->status=='Active'?'success':'danger'}}">{{ $student->status }}</span>
                        </td>
                        <td>
                            <a href="{{route('student.details',$student->id)}}" class="btn btn-sm btn-outline-primary me-1" title="View">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="{{route('student.edit',$student->id)}}" class="btn btn-sm btn-outline-warning me-1" title="Edit">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            @can('admin-only')
                            <form action="{{route('student.destroy',$student->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure to delete this student?');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                            @endcan
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6"><em>No students found.</em></td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    <script>
        document.getElementById("searchInput").addEventListener("keyup", function () {
            const input = this.value.toLowerCase();
            const rows = document.querySelectorAll("#studentTable tbody tr");

            rows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(input) ? "" : "none";
            });
        });
    </script>
@endsection
