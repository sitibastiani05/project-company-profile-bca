<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — Digital Banking</title>
    <link rel="stylesheet" href="{{ asset('bootstrap-5.3.8-dist/css/bootstrap.min.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0b1f3a 0%, #142b4f 50%, #1e3a6e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-wrap {
            width: 100%;
            max-width: 420px;
        }

        .login-logo {
            text-align: center;
            margin-bottom: 30px;
        }

        .login-logo img {
            height: 50px;
            filter: brightness(0) invert(1);
            margin-bottom: 12px;
        }

        .login-logo h1 {
            color: #fff;
            font-size: 20px;
            font-weight: 700;
            margin: 0;
        }

        .login-logo p {
            color: rgba(255,255,255,0.55);
            font-size: 13px;
            margin: 4px 0 0;
        }

        .login-card {
            background: #fff;
            border-radius: 20px;
            padding: 36px;
            box-shadow: 0 30px 60px rgba(0,0,0,0.25);
        }

        .login-card h2 {
            font-size: 20px;
            font-weight: 700;
            color: #0b1f3a;
            margin-bottom: 6px;
        }

        .login-card p.sub {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        .form-group label {
            font-size: 12.5px;
            font-weight: 600;
            color: #374151;
            display: block;
            margin-bottom: 6px;
        }

        .form-control {
            border: 1.5px solid #d1d9e6;
            border-radius: 10px;
            padding: 11px 14px;
            font-family: 'Poppins', sans-serif;
            font-size: 13.5px;
            transition: 0.2s;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37,99,235,0.12);
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #0b1f3a;
            color: #fff;
            border: none;
            border-radius: 12px;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 6px;
        }

        .btn-login:hover {
            background: #142b4f;
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(11,31,58,0.3);
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #dc2626;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .alert-success-msg {
            background: #f0fdf4;
            border: 1px solid #86efac;
            color: #16a34a;
            border-radius: 10px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 18px;
        }

        .is-invalid {
            border-color: #ef4444 !important;
        }

        .invalid-feedback {
            font-size: 12px;
            color: #ef4444;
            margin-top: 4px;
            display: block;
        }

        .back-link {
            text-align: center;
            margin-top: 20px;
        }

        .back-link a {
            color: rgba(255,255,255,0.6);
            font-size: 13px;
            text-decoration: none;
            transition: 0.2s;
        }

        .back-link a:hover {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="login-wrap">
        <div class="login-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo">
            <h1>Digital Banking</h1>
            <p>Halaman Administrator</p>
        </div>

        <div class="login-card">
            <h2>Masuk ke Admin Panel</h2>
            <p class="sub">Gunakan akun administrator Anda untuk melanjutkan.</p>

            @if(session('success'))
                <div class="alert-success-msg">✅ {{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert-error">❌ {{ session('error') }}</div>
            @endif

            @if($errors->has('email') && !$errors->has('password'))
                <div class="alert-error">❌ {{ $errors->first('email') }}</div>
            @endif

            <form action="{{ route('admin.login.post') }}" method="POST" novalidate>
                @csrf

                <div class="form-group">
                    <label for="email">Email Administrator</label>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control @error('email') is-invalid @enderror"
                        placeholder="admin@digitalbanking.id"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required>
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror"
                        placeholder="••••••••"
                        autocomplete="current-password"
                        required>
                    @error('password')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="btn-login">
                    🔐 &nbsp;Masuk ke Dashboard
                </button>
            </form>
        </div>

        <div class="back-link">
            <a href="{{ url('/') }}">← Kembali ke Website</a>
        </div>
    </div>
</body>
</html>
