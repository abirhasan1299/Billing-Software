@extends('master')
@section('title','Invoice')
@section('content')
<style>
    body {
        background-color: #f0f4f8;
    }
    .table-container {
        max-width: 1000px;
        margin: 50px auto;
    }
    .table-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #0d6efd;
        margin-bottom: 20px;
    }
    .action-btns .btn {
        margin-right: 6px;
    }
    .table td, .table th {
        vertical-align: middle;
    }
</style>
<div class="d-flex justify-content-between">
    <div>
        <a href="{{route('invoice.add')}}" class="btn btn-primary" role="button">Add New <i class="ti ti-plus"></i></a>
    </div>
    <div>
        <input type="search" class="form-control" placeholder="Search...">
    </div>
</div>
<br>
<div class="table-responsive">
    <table class="table table-hover table-bordered bg-white align-middle">
        <thead class="table-primary text-center">
        <tr>
            <th>Invoice #</th>
            <th>Student</th>
            <th>Total Fee</th>
            <th>Paid</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody class="text-center">
        <!-- Sample Row -->
        <tr>
            <td>INV-1001</td>
            <td>Abir Hasan</td>
            <td>৳50,000</td>
            <td>৳45,000</td>
            <td class="action-btns">
                <button class="btn btn-sm btn-info">View</button>
                <button class="btn btn-sm btn-warning text-white">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>INV-1002</td>
            <td>Sadia Rahman</td>
            <td>৳40,000</td>
            <td>৳40,000</td>
            <td class="action-btns">
                <button class="btn btn-sm btn-info">View</button>
                <button class="btn btn-sm btn-warning text-white">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        <!-- More rows dynamically from backend -->
        </tbody>
    </table>
</div>

@endsection
