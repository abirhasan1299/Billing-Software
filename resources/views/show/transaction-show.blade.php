@extends('master')
@section('title','Transaction')

@section('content')
    <style>
        /* Modern card + table styling */
        body { background: #f6f8fb; font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial; }
        .payments-card { border: 0; border-radius: 16px; box-shadow: 0 8px 30px rgba(34,41,47,0.08); overflow: hidden; }
        .table thead th { border-bottom: 0; }
        .table tbody tr { background: linear-gradient(180deg, rgba(255,255,255,1) 0%, rgba(250,251,253,1) 100%); }
        .table tbody tr:hover { transform: translateY(-3px); box-shadow: 0 6px 22px rgba(16,24,40,0.06); }
        .payer-avatar { width: 42px; height: 42px; border-radius: 50%; display:inline-flex; align-items:center; justify-content:center; font-weight:600; }
        .amount { font-weight:700; }
        .mode-badge { font-weight:600; letter-spacing:0.2px; }
        .search-input { max-width:360px; }
        .action-btns .btn { margin-left:6px; }
        @media (max-width: 767px) {
            .table-responsive { overflow-x: auto; }
        }
    </style>

        <div class="d-flex justify-content-between">
            <div>
                <a href="{{route('trans.add')}}" class="btn btn-primary" role="button">Add New <i class="ti ti-plus"></i></a>
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

        <!-- Transaction Table -->
    <div class="table-responsive">
        <table class="table align-middle mb-0" id="transactionTable">
            <thead>
            <tr class="text-muted small">
                <th>Payer</th>
                <th>Amount</th>
                <th>Mode</th>
                <th>Reference</th>
                <th>Date</th>
                <th class="text-end">Action</th>
            </tr>
            </thead>
            <tbody id="paymentsTable">
            @forelse($payments as $payment)
                <tr data-payer="{{ strtolower($payment->payer_name) }}" data-mode="{{ strtolower($payment->mode) }}" data-ref="{{ strtolower($payment->reference) }}">
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="me-3">
                                @php
                                    $initials = collect(explode(' ', $payment->payer_name))->map(function($p){ return strtoupper(substr($p,0,1)); })->join('');
                                    $bg = ['#E6F7FF','#FFF4E6','#F3E8FF','#FFECEF'];
                                    $color = $bg[$loop->index % count($bg)];
                                @endphp
                                <div class="payer-avatar" style="background: {{ $color }}; color: #0f172a;">{{ $initials }}</div>
                            </div>
                            <div>
                                <div class="fw-semibold">
                                    @php
                                        if($payment->type=="0")
                                            {
                                                echo $payment->student->name;
                                            }
                                        elseif($payment->type=="1")
                                            {
                                                echo $payment->agency->name;
                                            }else{
                                                echo $payment->custom_payer;
                                            }
                                     @endphp
                                </div>
                                <div class="text-muted small">
                                    @php
                                        if($payment->type=="0")
                                            {
                                                echo $payment->student->email;
                                            }
                                        elseif($payment->type=="1")
                                            {
                                                echo $payment->agency->contact_email;
                                            }else{
                                                echo "Null";
                                            }
                                    @endphp
                                </div>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="amount">{{ number_format($payment->amount,2) }} <small class="text-muted">{{ $payment->currency ?? 'INR' }}</small></div>
                        <div class="text-muted small">Invoice # {{ $payment->invoice->invoice_number }}</div>
                    </td>

                    <td>
                        <span class="badge bg-info text-dark mode-badge">{{strtoupper($payment->method)}}</span>
                    </td>

                    <td>
                        <div class="small text-muted">{{ $payment->transaction_id ?? '—' }}</div>
                    </td>

                    <td>
                        <div class="small text-muted">{{ $payment->created_at->format('M d, Y') }}</div>
                        <div class="small text-muted">{{ $payment->created_at->format('h:i A') }}</div>
                    </td>

                    <td class="text-end">
                        <div class="action-btns d-inline-flex align-items-center">
                            <!-- View -->
                            <a href="{{route('trans.details',$payment->id)}}" class="btn btn-sm btn-outline-secondary" title="View">
                                <i class="bi bi-eye"></i>
                            </a>

                            <!-- Delete (form) -->
                            <form action="{{route('trans.destroy',$payment->id)}}" method="POST" onsubmit="return confirm('Are you sure you want to delete this payment?');" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center text-muted py-5">No payments found</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>


    <script>
        document.getElementById("searchInput").addEventListener("keyup", function () {
            const input = this.value.toLowerCase();
            const rows = document.querySelectorAll("#transactionTable tbody tr");

            rows.forEach(row => {
                const rowText = row.textContent.toLowerCase();
                row.style.display = rowText.includes(input) ? "" : "none";
            });
        });
    </script>
@endsection
