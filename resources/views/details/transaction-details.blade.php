@extends('master')
@section('title','Transaction Details')
@section('content')
    <style>
        body {
            background: #f4f6f8;
            font-family: Inter, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }
        .transaction-header {
            padding: 2rem 0;
            border-bottom: 2px solid #e9ecef;
            margin-bottom: 2rem;
        }
        .transaction-header h1 {
            font-weight: 700;
            font-size: 1.75rem;
        }
        .transaction-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1.5rem;
            font-size: 0.95rem;
        }
        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .meta-item i {
            font-size: 1.2rem;
            color: #6c757d;
        }
        .transaction-section {
            background: white;
            border-radius: 0.75rem;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .transaction-section h5 {
            font-weight: 600;
            margin-bottom: 1.5rem;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 0.75rem;
        }
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 1.25rem;
        }
        .details-item {
            background: #f9fafb;
            padding: 1rem;
            border-radius: 0.5rem;
        }
        .details-label {
            font-size: 0.85rem;
            color: #6c757d;
        }
        .details-value {
            font-size: 1rem;
            font-weight: 500;
            color: #212529;
        }
        .action-buttons {
            display: flex;
            gap: 0.75rem;
            flex-wrap: wrap;
        }
    </style>
    <!-- Header -->
    <div class="transaction-header">
        <h1> {{ $transaction->transaction_id }}</h1>
        <div class="transaction-meta text-muted mt-2">
            <div class="meta-item">
                <i class="bi bi-calendar-event"></i>
                {{ $transaction->created_at->format('M d, Y h:i A') }}
            </div>
            <div class="meta-item">
                <i class="bi bi-person"></i>
                @php
                    if($transaction->type=="0")
                        {
                            echo $transaction->student->name;
                        }
                    elseif($transaction->type=="1")
                        {
                            echo $transaction->agency->name;
                        }else{
                            echo $transaction->custom_payer;
                        }
                @endphp
            </div>
            <div class="meta-item">
                <i class="bi bi-wallet2"></i>
                {{ strtoupper($transaction->method) }}
            </div>
        </div>
    </div>

    <!-- Transaction Info -->
    <div class="transaction-section">
        <h5>Payment Details</h5>
        <div class="details-grid">
            <div class="details-item">
                <div class="details-label">Payer</div>
                <div class="details-value">
                    @php
                        if($transaction->type=="0")
                            {
                                echo $transaction->student->name." (STUDENT)";
                            }
                        elseif($transaction->type=="1")
                            {
                                echo $transaction->agency->name." (AGENCY)";
                            }else{
                                echo $transaction->custom_payer." (CUSTOM)";
                            }
                    @endphp
                </div>
            </div>
            <div class="details-item">
                <div class="details-label">Amount</div>
                <div class="details-value">{{ number_format($transaction->amount, 2) }} {{ $transaction->currency ?? 'INR' }}</div>
            </div>
            <div class="details-item">
                <div class="details-label">Mode</div>
                <div class="details-value">{{ strtoupper($transaction->method) }}</div>
            </div>
            <div class="details-item">
                <div class="details-label">Reference</div>
                <div class="details-value">{{ $transaction->invoice->invoice_number ?? '—' }}</div>
            </div>
            <div class="details-item">
                <div class="details-label">Date</div>
                <div class="details-value">{{ $transaction->created_at->format('M d, Y') }}</div>
            </div>
            <div class="details-item">
                <div class="details-label">Time</div>
                <div class="details-value">{{ $transaction->created_at->format('h:i A') }}</div>
            </div>
        </div>
    </div>

    <!-- Actions -->
    <div class="transaction-section">
        <h5>Actions</h5>
        <div class="action-buttons">
            <a href="{{route('trans.show')}}" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left"></i> Back to List
            </a>
            <a href="#" class="btn btn-outline-success">
                <i class="bi bi-file-earmark-pdf"></i> Download PDF
            </a>
            <form action="#" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this transaction?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </form>
        </div>
    </div>

@endsection
