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
                        <input type="text" class="form-control" name="host" placeholder="smtp.mailserver.com" value="{{$data->host??''}}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SMTP Port</label>
                        <input type="text" class="form-control" value="{{$data->port??''}}" name="port" placeholder="587">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Encryption</label>
                        <input type="text" value="{{$data->encryption??''}}" class="form-control" name="encryption" placeholder="TLS" >
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SMTP Username</label>
                        <input type="text" value="{{$data->username??''}}" class="form-control" name="username">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">SMTP Password</label>
                        <input type="text" class="form-control" name="password" value="{{$data->password??''}}">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">From Email Address</label>
                        <input type="email" value="{{$data->from_address??''}}" class="form-control" name="from_address">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">From Name</label>
                        <input type="text" class="form-control" value="{{$data->from_name??''}}" name="from_name">
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-center" style="margin-top: 40px;">
                            <input type="submit" class="btn btn-primary " value="Save Settings">
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>

@endsection
