<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fees Due Reminder</title>
</head>
<body style="margin: 0; padding: 0; background-color: #f4f6f8; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">

<table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
    <tr>
        <td align="center" style="padding: 40px 15px;">

            <!-- Card -->
            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="600"
                   style="background-color: #ffffff; border-radius: 12px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08);">

                <!-- Header -->
                <tr>
                    <td align="center" style="background: linear-gradient(135deg, #4f46e5, #6366f1); padding: 25px;">
                        <h1 style="margin: 0; color: #ffffff; font-size: 26px;">💰 Fees Due Reminder</h1>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style="padding: 30px; color: #333333;">

                        <p style="font-size: 16px; line-height: 1.6;">
                            Dear <strong>{{ $data['student_name'] }}</strong>,
                        </p>

                        <p style="font-size: 16px; line-height: 1.6;">
                            This is a reminder that your fees for the following invoice are due on
                            <strong style="color:#e11d48;">{{ \Carbon\Carbon::parse($data['due_date'])->format('F j, Y') }}</strong>.
                        </p>

                        <!-- Invoice Details Table -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                               style="border-collapse: collapse; margin-top: 20px;">
                            <tr>
                                <td style="padding: 8px; background-color: #f9fafb; font-weight: bold;">Invoice ID</td>
                                <td style="padding: 8px; background-color: #f9fafb;">{{ $data['invoice_id'] }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px; border-top: 1px solid #e5e7eb;">Invoice Date</td>
                                <td style="padding: 8px; border-top: 1px solid #e5e7eb;">{{ \Carbon\Carbon::parse($data['invoice_created'])->format('F j, Y') }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px; border-top: 1px solid #e5e7eb;">Agency</td>
                                <td style="padding: 8px; border-top: 1px solid #e5e7eb;">{{ $data['agency_name'] }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px; border-top: 1px solid #e5e7eb;">Pay to Agency</td>
                                <td style="padding: 8px; border-top: 1px solid #e5e7eb;">${{ number_format($data['paytoAgency'], 2) }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 8px; border-top: 1px solid #e5e7eb;">Pay to Student</td>
                                <td style="padding: 8px; border-top: 1px solid #e5e7eb;">${{ number_format($data['paytoStudent'], 2) }}</td>
                            </tr>
                        </table>

                        <!-- Button -->
                        <div style="text-align: center; margin-top: 30px;">
                            <a href="{{route('invoice.checker')}}"
                               style="display: inline-block; padding: 12px 24px; font-size: 16px; background-color: #4f46e5; color: #ffffff; text-decoration: none; font-weight: bold; border-radius: 8px;">
                                🔍 View Invoice
                            </a>
                        </div>

                        <p style="font-size: 14px; color: #6b7280; text-align: center; margin-top: 20px;">
                            If you have already paid this invoice, please ignore this message.
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td align="center" style="background-color: #f9fafb; padding: 20px; font-size: 14px; color: #9ca3af;">
                        <p style="margin: 0;">&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        <p style="margin: 0;">This is an automated reminder email. Please do not reply.</p>
                    </td>
                </tr>

            </table>

        </td>
    </tr>
</table>

</body>
</html>
