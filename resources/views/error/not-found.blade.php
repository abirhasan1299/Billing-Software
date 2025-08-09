<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>404 Not Found</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background: linear-gradient(135deg, #ff758c, #ff7eb3);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .error-container {
            text-align: center;
            max-width: 480px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }
        .error-code {
            font-size: 9rem;
            font-weight: 900;
            margin-bottom: 0;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.2);
        }
        .error-message {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            font-weight: 600;
            text-shadow: 1px 1px 6px rgba(0,0,0,0.15);
        }
        .btn-home {
            background: #fff;
            color: #ff758c;
            font-weight: 600;
            padding: 12px 30px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(255,117,140,0.4);
            transition: all 0.3s ease;
        }
        .btn-home:hover {
            background: #ff758c;
            color: #fff;
            box-shadow: 0 6px 20px rgba(255,117,140,0.7);
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="error-container">
    <div class="error-code">404</div>
    <div class="error-message">Oops! Page Not Found</div>
    <p class="mb-4">Sorry, the page you're looking for doesn't exist or has been moved.</p>
    <a href="{{route('invoice.checker')}}" class="btn btn-home">Go Back Home</a>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
