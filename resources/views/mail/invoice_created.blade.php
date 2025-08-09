
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $invoice->invoice_number }}</title>
</head>
<body style="margin:0;padding:0;background:#f5f7fa;font-family:Arial, sans-serif;color:#333;">

<table role="presentation" width="100%" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center" style="padding:20px 0;">
            <table role="presentation" width="600" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:8px;overflow:hidden;box-shadow:0 2px 10px rgba(0,0,0,0.05);">
                <!-- Header -->
                <tr>
                    <td style="background:linear-gradient(90deg,#0d6efd,#4dabf7);padding:20px;text-align:center;color:white;">
                        <h1 style="margin:0;font-size:28px;font-weight:bold;">
                            📄 Invoice
                        </h1>
                        <p style="margin:5px 0 0;font-size:14px;">#{{ $invoice->invoice_number }}</p>
                    </td>
                </tr>

                <!-- Dates -->
                <tr>
                    <td style="padding:20px;">
                        <table width="100%">
                            <tr>
                                <td style="width:50%;padding:10px;background:#f8f9fa;border-radius:6px;">
                                    <strong>📅 Issue Date:</strong><br>
                                    {{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M, Y') }}
                                </td>
                                <td style="width:50%;padding:10px;background:#f8f9fa;border-radius:6px;">
                                    <strong>⏳ Due Date:</strong><br>
                                    {{ \Carbon\Carbon::parse($invoice->due_date)->format('d M, Y') }}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Student & Agency Info -->
                <tr>
                    <td style="padding:20px;">
                        <table width="100%" cellspacing="0" cellpadding="0">
                            <tr>
                                <td style="width:50%;vertical-align:top;padding-right:10px;">
                                    <h3 style="margin-bottom:8px;color:#0d6efd;">🎓 Student Info</h3>
                                    <p style="margin:4px 0;"><strong>Name:</strong> {{ $invoice->students->name }}</p>
                                    <p style="margin:4px 0;"><strong>Enrollment:</strong> {{ $invoice->students->enrollment }}</p>
                                    <p style="margin:4px 0;"><strong>Course:</strong> {{ $invoice->students->course }}</p>
                                </td>
                                <td style="width:50%;vertical-align:top;padding-left:10px;">
                                    <h3 style="margin-bottom:8px;color:#0d6efd;">🏢 Agency Info</h3>
                                    @if($invoice->agencies)
                                        <p style="margin:4px 0;"><strong>Name:</strong> {{ $invoice->agencies->name }}</p>
                                        <p style="margin:4px 0;"><strong>Type:</strong> {{ $invoice->agencies->type }}</p>
                                        <p style="margin:4px 0;"><strong>Payable:</strong> ${{ number_format($invoice->pay_amount_agency, 2) }}</p>
                                    @else
                                        <p>No agency associated.</p>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Payment Details -->
                <tr>
                    <td style="padding:20px;">
                        <h3 style="color:#0d6efd;margin-bottom:10px;">💳 Payment Details</h3>
                        <table width="100%" cellpadding="0" cellspacing="0" style="border-collapse:collapse;">
                            <thead>
                            <tr>
                                <th align="left" style="background:#f1f3f5;padding:10px;border:1px solid #dee2e6;">Description</th>
                                <th align="left" style="background:#f1f3f5;padding:10px;border:1px solid #dee2e6;">Paid</th>
                                <th align="left" style="background:#f1f3f5;padding:10px;border:1px solid #dee2e6;">Due</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td style="padding:10px;border:1px solid #dee2e6;">{{ $invoice->students->course }} (Student Fees)</td>
                                <td style="padding:10px;border:1px solid #dee2e6;">${{ number_format($invoice->pay_amount_student, 2) }}</td>
                                <td style="padding:10px;border:1px solid #dee2e6;">${{ number_format($invoice->pay_amount_student, 2) }}</td>
                            </tr>
                            <tr>
                                <td style="padding:10px;border:1px solid #dee2e6;">Agency Fees</td>
                                <td style="padding:10px;border:1px solid #dee2e6;">${{ number_format($invoice->pay_amount_agency, 2) }}</td>
                                <td style="padding:10px;border:1px solid #dee2e6;">${{ number_format($invoice->pay_amount_agency, 2) }}</td>
                            </tr>
                            </tbody>
                        </table>

                        <p style="text-align:center;margin-top:20px;font-size:16px;font-weight:bold;color:#dc3545;">
                            💰 TOTAL PAYMENT: ${{ number_format($invoice->pay_amount_student + $invoice->pay_amount_agency, 2) }}
                        </p>
                    </td>
                </tr>

                <!-- Notes -->
                @if($invoice->notes)
                    <tr>
                        <td style="padding:20px;">
                            <div style="background:#fff3cd;padding:15px;border-radius:6px;border-left:5px solid #ffc107;">
                                <strong>📝 Notes:</strong><br>
                                {{ $invoice->notes }}
                            </div>
                        </td>
                    </tr>
                @endif
                <!-- Button -->
                <div style="text-align: center; margin-top: 30px;">
                    <a href="{{route('invoice.checker')}}"
                       style="display: inline-block; padding: 12px 24px; font-size: 16px; background-color: #4f46e5; color: #ffffff; text-decoration: none; font-weight: bold; border-radius: 8px;">
                        🔍 View Invoice
                    </a>
                </div>

                <!-- Footer -->
                <tr>
                    <td style="padding:20px;text-align:center;font-size:12px;color:#868e96;">
                        Thank you for your payment!<br>
                        Need help? Contact <a href="mailto:support@yourdomain.com" style="color:#0d6efd;text-decoration:none;">support@yourdomain.com</a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
