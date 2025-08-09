<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Transaction Details</title>
    <style>
        /* Email-safe styles */
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            font-family: 'Inter', Arial, sans-serif;
            color: #212529;
        }
        table {
            border-spacing: 0;
            width: 100%;
        }
        .container {
            max-width: 640px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
        }
        .header {
            padding: 20px 30px;
            border-bottom: 2px solid #e9ecef;
            background: #ffffff;
        }
        .header h1 {
            margin: 0;
            font-size: 22px;
            font-weight: 700;
            color: #212529;
        }
        .meta {
            font-size: 14px;
            color: #6c757d;
            margin-top: 8px;
        }
        .meta span {
            display: inline-block;
            margin-right: 16px;
        }
        .section {
            padding: 20px 30px;
        }
        .section h2 {
            font-size: 16px;
            font-weight: 600;
            color: #212529;
            margin-bottom: 16px;
            border-bottom: 1px solid #e9ecef;
            padding-bottom: 6px;
        }
        .detail-box {
            background: #f9fafb;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 12px;
        }
        .detail-label {
            font-size: 13px;
            color: #6c757d;
            margin-bottom: 4px;
        }
        .detail-value {
            font-size: 15px;
            font-weight: 500;
            color: #212529;
        }
        .footer {
            padding: 20px 30px;
            font-size: 12px;
            color: #6c757d;
            text-align: center;
            border-top: 1px solid #e9ecef;
        }
        .btn {
            display: inline-block;
            padding: 10px 18px;
            margin-top: 12px;
            background: #198754;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
        }
        .btn-secondary {
            background: #6c757d;
        }
    </style>
</head>
<body>
<table role="presentation" width="100%">
    <tr>
        <td align="center">
            <table role="presentation" class="container">
                <!-- HEADER -->
                <tr>
                    <td class="header">
                        <h1>{{$transaction->transaction_id}}</h1>
                        <div class="meta">
                            <span>📅 {{$transaction->created_at->format('F j, Y')}} || {{$transaction->created_at->format('h:i A')}}</span>
                            @if($transaction->type=='0')
                                <span>👤 {{$transaction->student->name}}</span>
                            @elseif($transaction->type=='1')
                                <span>👤 {{$transaction->agency->name}}</span>
                            @else
                                <span>👤 {{$transaction->custom_payer}}</span>
                            @endif

                            <span>💳 {{strtoupper($transaction->method)}}</span>
                        </div>
                    </td>
                </tr>
                <!-- PAYMENT DETAILS -->
                <tr>
                    <td class="section">
                        <h2>Payment Details</h2>
                        <div class="detail-box">
                            <div class="detail-label">Payer</div>
                            @if($transaction->type=='0')
                                <div class="detail-value">{{$transaction->student->name}} (STUDENT)</div>
                            @elseif($transaction->type=='1')
                                <div class="detail-value">{{$transaction->agency->name}} (AGENCY)</div>
                            @else
                                <div class="detail-value">{{$transaction->custom_payer}} (CUSTOM)</div>
                            @endif

                        </div>
                        <div class="detail-box">
                            <div class="detail-label">Amount</div>
                            <div class="detail-value">{{$transaction->amount}} INR</div>
                        </div>
                        <div class="detail-box">
                            <div class="detail-label">Mode</div>
                            <div class="detail-value">{{strtoupper($transaction->method)}}</div>
                        </div>
                        <div class="detail-box">
                            <div class="detail-label">Reference</div>
                            <div class="detail-value">{{$transaction->invoice->invoice_number}}</div>
                        </div>
                        <div class="detail-box">
                            <div class="detail-label">Date</div>
                            <div class="detail-value">
                                {{$transaction->created_at->format('F j, Y')}}
                            </div>
                        </div>
                        <div class="detail-box">
                            <div class="detail-label">Time</div>
                            <div class="detail-value">{{$transaction->created_at->format('h:i A')}}</div>
                        </div>
                    </td>
                </tr>
                <!-- ACTION BUTTONS -->
                <tr>
                    <td class="section" align="center">
                        <a href="{{route('trans.checker')}}" class="btn btn-secondary">Verify in Portal</a>
                    </td>
                </tr>
                <!-- FOOTER -->
                <tr>
                    <td class="footer">
                        This is an automated email. Please do not reply directly.<br>
                        &copy; 2025 Account Software. All rights reserved.
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</body>
</html>
