<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Log in</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <style>
        body {
            background-color: #f8fafc;
            font-family: 'Montserrat', sans-serif;
            color: #34241d;
        }
        .login-card {
            max-width: 400px;
            margin: 60px auto;
            background: white;
            padding: 3.5rem;
            border-radius: 12px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.05);
        }
        .register-link {
            display: block;
            margin-top: 1.5rem;
            text-align: center;
            font-size: 0.95rem;
        }
        .register-link a {
            color: #34241d;
            font-weight: 600;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2 class="mb-4 text-center">Log-in</h2>

    <!-- Error handling -->
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

<form method="POST" action="{{ route('guest.login') }}">
        @csrf

        <label for="name" class="form-label mb-3">Username</label>
        <input type="text" name="name" class="form-control" placeholder="Enter your username" required>

        <label for="password" class="form-label mb-3 mt-3">Password</label>
        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" required>
        @error('password')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror

        <button type="submit" class="btn btn-outline mt-3" style="width:100%; background-color:#34241d; color:white;">
            Log in
        </button>
    </form>

    <div class="register-link">
     <a href="{{ route('guest.register.form') }}">Create one here</a>
    </div>
</div>

</body>
</html>
