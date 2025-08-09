<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Invoice</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
        }
        .card {
            border: none;
            border-radius: 16px;
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
            overflow: hidden;
        }
        .card-header {
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: white;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            padding: 20px;
        }
        .form-control {
            height: 50px;
            font-size: 1.1rem;
            border-radius: 10px;
        }
        .btn-primary {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            border: none;
            font-size: 1.1rem;
            font-weight: bold;
            padding: 12px;
            border-radius: 10px;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background: linear-gradient(135deg, #4f46e5, #4338ca);
            transform: translateY(-2px);
        }
        .icon {
            font-size: 50px;
            color: #4f46e5;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            🔍 Check Your Invoice
        </div>
        <div class="card-body text-center">
            <div class="icon">💰</div>
            <p class="text-muted mb-4">Enter your invoice ID below to view the invoice details.</p>
            <form action="{{route('invoice.tracker')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">INV</span>
                    <input type="text" class="form-control" placeholder="ex 77864FF045C3C52" aria-label="Username" name="id" aria-describedby="basic-addon1">
                </div>
                <button type="submit" class="btn btn-primary w-100">
                    Check Invoice
                </button>
                <center class="mt-4">
                    <a href="{{route('trans.checker')}}"> Verify Transaction with ID</a>
                </center>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
