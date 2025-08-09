<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice Tracker</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <style>
        .invoice-box {
            max-width: 900px;
            margin: auto;
            padding: 30px;
            border: 1px solid #e0e0e0;
            font-size: 16px;
            line-height: 24px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #555;
            background: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }

        .invoice-box h2 {
            margin-bottom: 20px;
        }

        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .invoice-header .logo {
            font-size: 32px;
            font-weight: bold;
            color: #0d6efd;
        }

        .invoice-header .download-btn {
            text-align: right;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .table th {
            background-color: #f8f9fa;
        }

        .invoice-footer {
            text-align: center;
            margin-top: 40px;
            font-size: 14px;
            color: #888;
        }

        .highlight {
            background-color: #f6f6f6;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="invoice-box rounded-4">
        <div class="invoice-header">
            <div class="logo">📄 Invoice</div>
            <div class="download-btn">
                <a href="{{route('invoice.download',$invoice->id)}}" class="btn btn-outline-primary btn-sm">
                    ⬇️ Download PDF
                </a>
            </div>
        </div>

        <div class="mb-4">
            <h5>#Invoice : {{ $invoice->invoice_number }}</h5>
            <p><strong>Issue Date:</strong> {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M, Y') }}</p>
            <p><strong>Due Date :</strong> {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M, Y') }}</p>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="col-md-6">
                <h6>🧑‍🎓 Student Info</h6>
                <p><strong>Name:</strong> {{ $invoice->students->name }}</p>
                <p><strong>Enrollment:</strong> {{ $invoice->students->enrollment }}</p>
                <p><strong>Course:</strong> {{ $invoice->students->course }}</p>
            </div>
            <div class="col-md-6">
                <h6>🏢 Agency Info</h6>
                @if($invoice->agencies)
                    <p><strong>Name:</strong> {{ $invoice->agencies->name }}</p>
                    <p><strong>Type:</strong> {{ $invoice->agencies->type }}</p>
                    <p><strong>Payable:</strong> ৳{{ number_format($invoice->pay_amount_agency, 2) }}</p>
                @else
                    <p>No agency associated.</p>
                @endif
            </div>
        </div>

        <h6>💵 Payment Info</h6>
        <table class="table table-bordered mt-3">
            <thead>
            <tr>
                <th>Description</th>
                <th>Current Pay</th>
                <th>Due</th>
            </tr>
            </thead>
            <tbody>
            <tr class="highlight">
                <td>{{ $invoice->students->course }} (Course Fees)</td>
                <td>৳{{ number_format($invoice->pay_amount_student, 2) }}</td>
                <td>৳{{ number_format($invoice->pay_amount_student, 2) }}</td>
            </tr>
            <tr class="highlight">
                <td>Agency Fees</td>
                <td>৳{{ number_format($invoice->pay_amount_agency, 2) }}</td>
                <td>৳{{ number_format($invoice->pay_amount_agency, 2) }}</td>
            </tr>

            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            <td >
                <span class="fw-bold text-success">
                    TOTAL PAYMENT: <b style="color:red;"> ৳{{ number_format($invoice->pay_amount_agency+$invoice->pay_amount_student, 2) }}</b>
                </span>
            </td>
        </div>

        @if($invoice->notes)
            <div class="mt-4">
                <h6>📝 Notes:</h6>
                <p>{{ $invoice->notes }}</p>
            </div>
        @endif

        <div class="invoice-footer">
            <p>Thank you for your payment!</p>
            <p>Need help? Contact support@yourdomain.com</p>
        </div>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>
</html>
