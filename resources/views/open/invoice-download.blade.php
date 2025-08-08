<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            background: #fff;
            margin: 0;
            padding: 5px;
            color: #333;
            font-size: 14px;
        }

        .invoice-box {
            width: 100%;
            max-width: 100%;
            margin: auto;
            padding: 30px;
            border-radius: 6px;
        }

        .title {
            text-align: center;
            font-size: 28px;
            font-weight: bold;
            color: #0d6efd;
            margin-bottom: 5px;
        }

        .invoice-number {
            text-align: center;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .info-table {
            width: 100%;
            margin-bottom: 30px;
        }

        .info-table td {
            padding: 10px;
            vertical-align: top;
        }

        .info-table .label {
            font-weight: bold;
            width: 120px;
        }

        .section-heading {
            font-size: 16px;
            font-weight: bold;
            margin-top: 30px;
            margin-bottom: 10px;
            color: #000;
        }

        table.payment-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .payment-table th, .payment-table td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        .payment-table th {
            background-color: #f5f5f5;
        }

        .total {
            text-align: center;
            margin-top: 30px;
            font-size: 16px;
            font-weight: bold;
            color: #c20000;
        }

        .notes {
            background: #f9f9f9;
            padding: 15px;
            border-left: 4px solid #ffc107;
            margin-top: 30px;
        }

        .footer {
            margin-top: 40px;
            text-align: center;
            color: #888;
            font-size: 12px;
        }
    </style>
</head>
<body>
<div class="invoice-box">
    <div class="title">INVOICE</div>
    <div class="invoice-number">{{ $invoice->invoice_number }}</div>

    <table class="info-table">
        <tr>
            <td>
                <strong>Issue Date:</strong><br>
                {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M, Y') }}
            </td>
            <td>
                <strong>Due Date:</strong><br>
                {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M, Y') }}
            </td>
        </tr>
    </table>

    <table class="info-table">
        <tr>
            <td style="width: 50%;">
                <div class="section-heading">Student Info</div>
                <div><span class="label">Name:</span> {{ $invoice->students->name }}</div>
                <div><span class="label">Enrollment:</span> {{ $invoice->students->enrollment }}</div>
                <div><span class="label">Course:</span> {{ $invoice->students->course }}</div>
            </td>
            <td style="width: 50%;">
                <div class="section-heading">Agency Info</div>
                @if($invoice->agencies)
                    <div><span class="label">Name:</span> {{ $invoice->agencies->name }}</div>
                    <div><span class="label">Type:</span> {{ $invoice->agencies->type }}</div>
                    <div><span class="label">Payable:</span> ${{ number_format($invoice->pay_amount_agency, 2) }}</div>
                @else
                    <div>No agency associated.</div>
                @endif
            </td>
        </tr>
    </table>

    <div class="section-heading">Payment Details</div>
    <table class="payment-table">
        <thead>
        <tr>
            <th>Description</th>
            <th>Paid</th>
            <th>Due</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $invoice->students->course }} (Student Fees)</td>
            <td>${{ number_format($invoice->pay_amount_student, 2) }}</td>
            <td>${{ number_format($invoice->pay_amount_student, 2) }}</td>
        </tr>
        <tr>
            <td>Agency Fees</td>
            <td>${{ number_format($invoice->pay_amount_agency, 2) }}</td>
            <td>${{ number_format($invoice->pay_amount_agency, 2) }}</td>
        </tr>
        </tbody>
    </table>

    <div class="total">
        TOTAL PAYMENT: ${{ number_format($invoice->pay_amount_student + $invoice->pay_amount_agency, 2) }}
    </div>

    @if($invoice->notes)
        <div class="notes">
            <strong>Notes:</strong><br>
            {{ $invoice->notes }}
        </div>
    @endif

    <div class="footer">
        Thank you for your payment!<br>
        Need help? Contact support@yourdomain.com
    </div>
</div>
</body>
</html>
