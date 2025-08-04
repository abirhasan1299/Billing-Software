@extends('master')
@section('title','Admin')

@section('content')
<style>
    body {
        background: #eef3f8;
        font-family: 'Segoe UI', sans-serif;
    }
    .form-container {
        max-width: 600px;
        background: white;
        margin: 50px auto;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }
    .form-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #0d6efd;
        text-align: center;
        margin-bottom: 30px;
    }
    .form-control {
        border-radius: 12px;
    }
    .btn-submit {
        background: #0d6efd;
        color: white;
        border-radius: 12px;
        padding: 10px 20px;
        font-weight: bold;
    }
    .btn-submit:hover {
        background: #0b5ed7;
    }
</style>
<div class="form-container">
    <div class="form-title">➕ Add New Admin</div>
    <form action="/admin/store" method="POST">
        <!-- Include CSRF token if in Laravel -->
        <!-- @csrf -->

        <div class="mb-3">
            <label for="admin_name" class="form-label">Full Name</label>
            <input type="text" class="form-control" id="admin_name" name="admin_name" placeholder="e.g. Abir Hasan" required>
        </div>

        <div class="mb-3">
            <label for="admin_email" class="form-label">Email Address</label>
            <input type="email" class="form-control" id="admin_email" name="admin_email" placeholder="admin@example.com" required>
        </div>

        <div class="mb-3">
            <label for="admin_phone" class="form-label">Phone Number</label>
            <input type="text" class="form-control" id="admin_phone" name="admin_phone" placeholder="+8801234567890" required>
        </div>

        <div class="mb-3">
            <label for="admin_role" class="form-label">Role</label>
            <select class="form-select" id="admin_role" name="admin_role" required>
                <option value="">-- Select Role --</option>
                <option value="superadmin">Super Admin</option>
                <option value="manager">Manager</option>
                <option value="editor">Editor</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="admin_password" class="form-label">Password</label>
            <input type="password" class="form-control" id="admin_password" name="admin_password" placeholder="••••••••" required>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-submit">Create Admin</button>
        </div>
    </form>
</div>
@endsection
