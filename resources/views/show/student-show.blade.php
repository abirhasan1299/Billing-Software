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
            <input type="search" class="form-control" placeholder="Search...">
        </div>
    </div>
    <br>
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle bg-white">
            <thead class="table-primary text-center">
            <tr>
                <th>SL</th>
                <th>Enrollment No</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Batch</th>
                <th>Fee Paid</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody class="text-center">
            <!-- Sample Row -->
            <tr>
                <td>1</td>
                <td>STU2025001</td>
                <td>Abir Hasan</td>
                <td>B.Sc in CS</td>
                <td>Spring 2025</td>
                <td>৳45,000</td>
                <td><span class="status-active">Active</span></td>
                <td>
                    <button class="btn btn-sm btn-info">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            <tr>
                <td>2</td>
                <td>STU2025002</td>
                <td>Sadia Rahman</td>
                <td>BBA</td>
                <td>Fall 2025</td>
                <td>৳30,000</td>
                <td><span class="status-inactive">Inactive</span></td>
                <td>
                    <button class="btn btn-sm btn-info">Edit</button>
                    <button class="btn btn-sm btn-danger">Delete</button>
                </td>
            </tr>
            <!-- Add more rows dynamically -->
            </tbody>
        </table>
    </div>
@endsection
