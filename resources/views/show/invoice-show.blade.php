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
        <input type="search" class="form-control" id="searchInput" placeholder="Search...">
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
    <table class="table table-bordered table-hover align-middle shadow-sm" id="invoiceTable">
        <thead class="table-dark text-light">
        <tr>
            <th>#</th>
            <th>Invoice No</th>
            <th>Student</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th class="text-center">Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse($invoices as $key => $invoice)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td><strong>{{ $invoice->invoice_number }}</strong></td>
                <td>{{ $invoice->students->name ?? 'N/A' }}</td>
                <td>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M, Y') }}</td>
                <td>৳ {{ number_format($invoice->pay_amount_student+$invoice->pay_amount_agency, 2) }}</td>
                <td>
                    @if($invoice->status=='2')
                        <span class="badge bg-success">Paid</span>
                    @elseif($invoice->status=='1')
                        <span class="badge bg-warning text-dark">Running</span>
                    @elseif($invoice->status=='0')
                        <span class="badge bg-danger text-dark">Pending</span>
                    @else
                        <span class="badge bg-success">Paid</span>
                    @endif
                </td>
                <td class="text-center">
                    <a href="{{route('invoice.details',$invoice->id)}}" class="btn btn-sm btn-outline-info me-1" title="View">
                        <i class="bi bi-eye"></i>
                    </a>
                    <a href="{{route('invoice.edit',$invoice->id)}}" class="btn btn-sm btn-outline-primary me-1" title="Edit">
                        <i class="bi bi-pencil-square"></i>
                    </a>
                    <form action="{{route('invoice.destroy',$invoice->id)}}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this invoice?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger me-1" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    <a href="{{route('invoice.download',$invoice->id)}}" class="btn btn-sm btn-outline-secondary" title="Download PDF">
                        <i class="bi bi-download"></i>
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="7" class="text-center text-muted py-4">No invoices available.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>
<script>
    document.getElementById("searchInput").addEventListener("keyup", function () {
        const input = this.value.toLowerCase();
        const rows = document.querySelectorAll("#invoiceTable tbody tr");

        rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(input) ? "" : "none";
        });
    });
</script>
@endsection
