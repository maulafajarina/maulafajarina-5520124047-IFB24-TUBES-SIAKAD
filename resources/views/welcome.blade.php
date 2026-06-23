<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD IFB</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:'Segoe UI', sans-serif;
        }

        body{
            background: linear-gradient(135deg, #0f172a, #064e3b);
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            padding: 20px;
        }

        /* PERUBAHAN UTAMA: Layout vertikal tunggal yang simetris */
        .card{
            background: white;
            width: 100%;
            max-width: 500px; /* Lebih ramping dan fokus */
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,.3);
        }

        /* Bagian Atas: Menjadi banner selamat datang */
        .header-banner {
            background: linear-gradient(135deg, #047857, #059669);
            color: white;
            padding: 40px 30px;
            text-align: center;
            position: relative;
        }

        .header-banner h1 {
            font-size: 32px;
            font-weight: 700;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }

        .header-banner p {
            font-size: 14px;
            opacity: 0.9;
            line-height: 1.5;
        }

        /* Bagian Bawah: Area Konten & Navigasi */
        .content-area {
            padding: 40px 35px;
            text-align: center;
            background: #ffffff;
        }

        .logo-circle {
            width: 80px;
            height: 80px;
            background: #f0fdf4;
            color: #059669;
            font-size: 36px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
            margin: -80px auto 20px auto; /* Menaikkan logo agar memotong garis border banner */
            box-shadow: 0 8px 20px rgba(4, 120, 87, 0.15);
            position: relative;
            border: 4px solid white;
        }

        .content-area h2 {
            font-size: 22px;
            color: #1e293b;
            margin-bottom: 8px;
        }

        .content-area .sub-text {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 35px;
        }

        /* PERUBAHAN UTAMA: Tombol dibuat berdampingan (Grid) */
        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .btn {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px;
            text-decoration: none;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            transition: all .3s ease;
        }

        .login {
            background: #059669;
            color: white;
            box-shadow: 0 4px 12px rgba(5, 150, 105, 0.2);
        }

        .login:hover {
            background: #047857;
            transform: translateY(-2px);
        }

        .register {
            background: #f1f5f9;
            color: #334155;
            border: 1px solid #e2e8f0;
        }

        .register:hover {
            background: #e2e8f0;
            transform: translateY(-2px);
        }

        /* Responsive HP */
        @media (max-width: 480px) {
            .content-area {
                padding: 35px 20px;
            }
            /* Jika di layar sangat kecil tombol terlalu sempit, otomatis tumpuk vertikal */
            .button-group {
                grid-template-columns: 1fr;
                gap: 10px;
            }
        }
    </style>
</head>
<body>

<div class="card">
    <!-- Layout Atas: Informasi Utama -->
    <div class="header-banner">
        <h1>SIAKAD IFB</h1>
        <p>
            Sistem Informasi Akademik Mahasiswa. Kelola data, jadwal kuliah, dan KRS secara terintegrasi.
        </p>
    </div>

    <!-- Layout Bawah: Log in & Register -->
    <div class="content-area">
        <div class="logo-circle">
            <i class="fas fa-graduation-cap"></i>
        </div>

        <h2>Selamat Datang</h2>
        <p class="sub-text">Tugas Besar Pemrograman Web Lanjut</p>

        <div class="button-group">
            <a href="{{ route('login') }}" class="btn login">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </a>

            <a href="{{ route('register') }}" class="btn register">
                <i class="fas fa-user-plus"></i>
                Register
            </a>
        </div>
    </div>
</div>

</body>
</html>