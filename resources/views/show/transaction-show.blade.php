@extends('master')
@section('title','Transaction')

@section('content')
    <style>
        body {
            background: #f1f4f9;
            font-family: 'Segoe UI', sans-serif;
        }
        .table-container {
            max-width: 1000px;
            margin: 50px auto;
            background: #fff;
            padding: 30px;
            border-radius: 16px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
        }
        .table-title {
            font-weight: 600;
            font-size: 1.5rem;
            color: #0d6efd;
            margin-bottom: 20px;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        .table thead {
            background-color: #e9f0ff;
        }
        .table th {
            color: #0d6efd;
        }
        .action-btns button {
            margin-right: 5px;
        }
        .form-control {
            border-radius: 10px;
        }
    </style>
    <div class="container table-container">


        <div class="d-flex justify-content-between">
            <div>
                <a href="{{route('trans.add')}}" class="btn btn-primary" role="button">Add New <i class="ti ti-plus"></i></a>
            </div>
            <div>
                <input type="search" class="form-control" placeholder="Search...">
            </div>
        </div>
        <br>

        <!-- Transaction Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle" id="transactionTable">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Payer / Receiver</th>
                    <th>Amount (৳)</th>
                    <th>Mode</th>
                    <th>Reference</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>5,000</td>
                    <td>Cash</td>
                    <td>INV12345</td>
                    <td>2025-08-01</td>
                    <td class="action-btns">
                        <button class="btn btn-sm btn-primary">View</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Global Agency</td>
                    <td>12,000</td>
                    <td>Bank Transfer</td>
                    <td>AGX9987</td>
                    <td>2025-07-28</td>
                    <td class="action-btns">
                        <button class="btn btn-sm btn-primary">View</button>
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </td>
                </tr>
                <!-- Add more transaction rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function searchTable() {
            const input = document.getElementById("searchInput").value.toLowerCase();
            const rows = document.querySelectorAll("#transactionTable tbody tr");
            rows.forEach(row => {
                const text = row.innerText.toLowerCase();
                row.style.display = text.includes(input) ? "" : "none";
            });
        }
    </script>
@endsection
