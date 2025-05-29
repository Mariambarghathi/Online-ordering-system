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
    </style>
</head>
<body>

<div class="login-card">
    <h2 class="mb-4 text-center">Log-in</h2>

<!--Error handling-->
    @if ($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="{{ url('/dashboard/login') }}">
        @csrf

 
            <label for="email" class="form-label mb-3">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="enter your email" value="{{ old('email') }}"  required>
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror


            <label for="password" class="form-label mb-3" style="margin-top:1.5rem; ">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password"  required>
            @error('password')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn btn-outline" style="width:300px; margin-top:2rem; background-color: #34241d; color:white; text-align:center;">
                Log in
            </button>
    </form>
</div>

</body>
</html>
