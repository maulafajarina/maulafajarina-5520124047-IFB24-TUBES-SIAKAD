<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD IFB - Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            /* BACKGROUND FOTO LAPTOP & OVERLAY EMERALD GRADIENT */
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.4), rgba(6, 78, 59, 0.5)),
                        url('https://images.unsplash.com/photo-1531403009284-440f080d1e12?q=80&w=1600&auto=format&fit=crop') no-repeat center center fixed;
            background-size: cover;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 520px;
        }

        /* CARD GAYA GRADASI EMERALD */
        .card {
            background: linear-gradient(135deg, #059669 0%, #1e293b 80%, #111827 100%);
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
            color: white;
        }

        /* Header: Toga + Welcome! */
        .card-header {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 5px;
        }

        .card-header i {
            font-size: 42px;
        }

        .card-header h1 {
            font-size: 36px;
            font-weight: 500;
            letter-spacing: 0.5px;
            color: white;
        }

        .subtitle {
            text-align: center;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 30px;
            font-size: 14px;
        }

        /* Kotak Pesan Error Laravel */
        .alert-error {
            background-color: rgba(254, 202, 202, 0.2);
            color: #fca5a5;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 14px;
            border: 1px solid rgba(252, 165, 165, 0.3);
        }
        
        .alert-error ul {
            padding-left: 20px;
        }

        .input-group {
            margin-bottom: 22px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 600;
            font-size: 16px;
        }

        /* INPUT FIELD DENGAN KOTAK IKON ABU-ABU */
        .input-container {
            display: flex;
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .icon-box {
            background: #e5e7eb;
            color: #4b5563;
            width: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
            border-right: 1px solid #d1d5db;
        }

        .input-container input {
            flex: 1;
            padding: 14px 15px;
            border: none;
            outline: none;
            font-size: 15px;
            color: #1f2937;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 25px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
        }

        .remember input {
            width: 16px;
            height: 16px;
            cursor: pointer;
        }

        /* TOMBOL LOGIN UTAMA */
        .btn {
            width: 100%;
            border: none;
            padding: 14px;
            background: #2563eb;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            transition: .3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .btn:hover {
            background: #1d4ed8;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: rgba(255, 255, 255, 0.4);
            font-size: 12px;
        }
        
        .forgot-link {
            text-align: center;
            margin-top: 20px;
        }
        
        .forgot-link a {
            color: rgba(255, 255, 255, 0.85);
            text-decoration: none;
            font-size: 14px;
        }
        
        .forgot-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .card {
                padding: 30px 20px;
            }
            .card-header h1 {
                font-size: 30px;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <div class="card">

        <div class="card-header">
            <i class="fas fa-graduation-cap"></i>
            <h1>Welcome!</h1>
        </div>

        <p class="subtitle">
            Sistem Informasi Akademik Mahasiswa
        </p>

        @if ($errors->any())
            <div class="alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="input-group">
                <label>Email</label>
                <div class="input-container">
                    <div class="icon-box">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <input
                        type="email"
                        name="email"
                        value="{{ old('email') }}" 
                        placeholder="Masukkan email"
                        required
                        autofocus
                    >
                </div>
            </div>

            <div class="input-group">
                <label>Password</label>
                <div class="input-container">
                    <div class="icon-box">
                        <i class="fas fa-lock"></i>
                    </div>
                    <input
                        type="password"
                        name="password"
                        placeholder="Masukkan password"
                        required
                    >
                </div>
            </div>

            <div class="remember">
                <input type="checkbox" name="remember" id="remember">
                <label style="font-weight: normal; cursor: pointer;" for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div class="forgot-link">
            <a href="#">Forgotten your username or password?</a>
        </div>

        <div class="footer">
            © 2026 SIAKAD IFB
        </div>

    </div>

</div>

</body>
</html>