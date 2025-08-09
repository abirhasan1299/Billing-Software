<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.4/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            background: #f8f9fa; /* Light white background */
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins';
        }
        .login-card {
            background: #ffffff;
            padding: 2rem;
            border-radius: 16px;
            width: 100%;
            max-width: 420px;
            color: #212529;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
            animation: fadeIn 0.6s ease-in-out;
        }
        .login-card h4 {
            font-weight: 700;
            margin-bottom: 1rem;
        }
        .form-control {
            background-color: #f1f3f5;
            border: none;
            color: #212529;
        }
        .form-control:focus {
            background-color: #e9ecef;
            color: #212529;
            box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
        }
        .form-control::placeholder {
            color: #6c757d;
        }
        .btn-login {
            background: linear-gradient(90deg, #4f93f7, #285ec7);
            border: none;
            font-weight: 600;
            padding: 0.75rem;
            border-radius: 8px;
            transition: 0.3s;
        }
        .btn-login:hover {
            transform: scale(1.03);
            box-shadow: 0 6px 20px rgba(0,0,0,0.15);
        }
        .icon-box {
            background: #e9ecef;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.5rem;
            color: #285ec7;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

<div class="login-card">
    <div class="icon-box">
        <i class="bi bi-shield-lock-fill"></i>
    </div>
    <h4 class="text-center">Admin Login</h4>
    <p class="text-center mb-4 text-muted">Please sign in to access the dashboard</p>
    @if(session('danger'))
        <x-success-message type="danger" message="{{session('danger')}}" />
    @endif
    <form action="{{route('login.verify')}}" method="POST">
        @csrf
        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <div class="input-group">
          <span class="input-group-text bg-transparent border-0 text-secondary">
            <i class="bi bi-envelope"></i>
          </span>
                <input type="email" class="form-control" name="email" id="email" placeholder="admin@example.com" required>
            </div>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <div class="input-group">
          <span class="input-group-text bg-transparent border-0 text-secondary">
            <i class="bi bi-lock"></i>
          </span>
                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
            </div>
        </div>

        <!-- Login Button -->
        <div class="d-grid">
            <button type="submit" class="btn btn-login text-white">
                <i class="bi bi-box-arrow-in-right me-1"></i> Login
            </button>
        </div>
    </form>

    <!-- Footer -->
    <div class="text-center mt-4 text-muted">
        <small>&copy; {{date('Y')}} Account Software. All rights reserved.</small>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
