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

@if(session('success'))
    <x-success-message type="success" message="{{session('success')}}" />
@endif
@if(session('danger'))
    <x-success-message type="danger" message="{{session('danger')}}" />
@endif

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
            <th>Role</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @php $count=1; @endphp
        @forelse($data as $d)
        <tr>
            <td>{{$count++}}</td>
            <td>{{$d->name}}</td>
            <td>{{$d->email}}</td>
            <td>
                <span class="badge bg-@php
                    if($d->role=='superadmin')
                        {
                            echo 'warning';
                        }elseif ($d->role=='editor'){
                            echo 'primary';
                        }else{
                            echo 'info';
                        }
                @endphp">{{strtoupper($d->role)}}</span>
            </td>
            <td class="action-btns">
                <a href="{{route('admin.details',$d->id)}}" class="btn btn-sm btn-secondary" role="button">View</a>
                <form action="{{route('admin.destroy',$d->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment?');" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
            <tr >
                <td colspan="5" class="text-center text-danger fw-bolder"> No Administrative Found </td>
            </tr>
        @endforelse

        </tbody>
    </table>
</div>
@endsection
