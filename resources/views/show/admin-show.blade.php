@extends('master')
@section('title','Admin Show')

@section('content')
<style>
    body {
        background: #f5f7fb;
        font-family: 'Segoe UI', sans-serif;
    }
    .table-container {
        max-width: 1100px;
        margin: 50px auto;
        background: white;
        padding: 30px;
        border-radius: 16px;
        box-shadow: 0 8px 16px rgba(0,0,0,0.08);
    }
    .table-title {
        font-size: 1.6rem;
        font-weight: 600;
        margin-bottom: 20px;
        color: #0d6efd;
    }
    .table thead {
        background-color: #e9f0ff;
    }
    .table th {
        color: #0d6efd;
        font-weight: 600;
    }
    .action-btns button {
        margin-right: 6px;
    }
</style>
<div class="d-flex justify-content-between">
    <div>
        <a href="{{route('admin.add')}}" class="btn btn-primary" role="button">Add New <i class="ti ti-plus"></i></a>
    </div>
    <div>
        <input type="search" class="form-control" placeholder="Search...">
    </div>
</div>
<br>

<div class="table-responsive">
    <table class="table table-hover align-middle">
        <thead>
        <tr>
            <th>#</th>
            <th>Full Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>Abir Hasan</td>
            <td>abir@example.com</td>
            <td>+8801234567890</td>
            <td><span class="badge bg-primary">Super Admin</span></td>
            <td class="action-btns">
                <button class="btn btn-sm btn-success">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>Sadia Rahman</td>
            <td>sadia@example.com</td>
            <td>+8801999888777</td>
            <td><span class="badge bg-info text-dark">Manager</span></td>
            <td class="action-btns">
                <button class="btn btn-sm btn-success">Edit</button>
                <button class="btn btn-sm btn-danger">Delete</button>
            </td>
        </tr>
        <!-- More rows here -->
        </tbody>
    </table>
</div>
@endsection
