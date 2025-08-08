@extends('master')
@section('title','Settings')

@section('content')
    <style>
        body {
            background-color: #f8f9fc;
        }
        .settings-container {
            max-width: 900px;
            margin: 50px auto;
        }
        .settings-card {
            background: #ffffff;
            border-radius: 1rem;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.06);
            padding: 30px;
        }
        .section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 20px;
            color: #0d6efd;
        }
    </style>
        <div class="settings-card">
            <h3 class="mb-4 text-center">⚙️ System Settings</h3>

            <!-- Email Configuration -->
            <form action="{{route('email.update')}}" method="post">
                @csrf
            <div class="mb-4">
                <div class="section-title">📧 Email Configuration</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">SMTP Host</label>
                        <input type="text" class="form-control" name="host" placeholder="smtp.mailserver.com">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SMTP Port</label>
                        <input type="text" class="form-control" name="port" placeholder="587">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Encryption</label>
                        <input type="text" class="form-control" name="encryption" placeholder="TLS">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SMTP Username</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SMTP Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">From Email Address</label>
                        <input type="email" class="form-control" name="from_address">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">From Name</label>
                        <input type="text" class="form-control" name="from_name">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">
                            <input type="submit" class="btn btn-primary  mt-4" value="SET MAILING">
                        </div>
                    </div>

                </div>
                </form>
            </div>
            <hr>

            <!-- Cron Job Settings -->
            <div class="mb-4">
                <div class="section-title">⏱️ Automation & Cron Settings</div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Enable Due Fee Reminders</label>
                        <select class="form-select" name="enable_reminders">
                            <option value="1">Enabled</option>
                            <option value="0">Disabled</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Reminder Frequency</label>
                        <select class="form-select" name="reminder_frequency">
                            <option>Daily</option>
                            <option>Weekly</option>
                            <option>Monthly</option>
                            <option>Custom</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Alert if Student Fee < University Fee</label>
                        <select class="form-select" name="alert_underpaid_students">
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">University Fee Alert Email</label>
                        <input type="email" class="form-control" name="alert_email">
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary px-5">💾 Save Settings</button>
            </div>

        </div>

@endsection
