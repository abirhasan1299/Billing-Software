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

       <div class="d-flex justify-content-between">
           <div>
               <a href="{{route('agency.add')}}" class="btn btn-primary" role="button">Add New <i class="ti ti-plus"></i></a>
           </div>
           <div>
               <input type="search" class="form-control" placeholder="Search...">
           </div>
       </div>
        <br>
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Contact Person</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Fee/Student</th>
                    <th>Total Payable</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- Sample row (You can loop through actual data here) -->
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>ABC University</td>
                    <td>University</td>
                    <td>John Doe</td>
                    <td>john@abc.edu</td>
                    <td>+880123456789</td>
                    <td>123 Main Street</td>
                    <td>Dhaka</td>
                    <td>
                        <button class="btn btn-sm btn-info">Edit</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <!-- Add more rows dynamically from backend -->
                </tbody>
            </table>
        </div>

@endsection
