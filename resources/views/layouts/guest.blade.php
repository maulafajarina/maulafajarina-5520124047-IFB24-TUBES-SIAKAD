<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>SIAKAD IFB</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body{
            margin:0;
            font-family: Arial, sans-serif;
            background:#f3f4f6;
        }

        .login-wrapper{
            min-height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            /* Padding diperkecil di HP (12px) agar card memanfaatkan ruang layar semaksimal mungkin */
            padding:12px;
        }

        .login-card{
            width:100%;
            max-width:900px;
            background:white;
            border-radius:20px;
            overflow:hidden;
            box-shadow:0 10px 30px rgba(0,0,0,.15);
            display:flex;
        }

        .left-side{
            width:50%;
            background:#2563eb;
            color:white;
            padding:50px;
        }

        /* Ukuran font default laptop (40px) */
        .left-side h1{
            font-size:40px;
            margin-bottom:20px;
        }

        .right-side{
            width:50%;
            padding:50px;
        }

        /* ===== ATURAN RESPONSIVE LAYAR HP & TABLET (max-width: 768px) ===== */
        @media(max-width:768px){
            .login-wrapper {
                padding: 16px; /* Jarak aman sekeliling layar HP */
            }

            .login-card{
                flex-direction:column; /* Elemen otomatis turun berjajar ke bawah di HP */
                border-radius: 16px;  /* Sudut kotak disesuaikan lekukannya di HP */
            }

            .left-side,
            .right-side{
                width:100%;
                /* Padding dikurangi dari 50px ke 24px di HP agar form tidak kemakan ruang kosong */
                padding: 24px; 
            }

            /* Ukuran font judul dikecilkan ke 28px di HP agar tidak patah/meluber keluar */
            .left-side h1{
                font-size: 28px;
                margin-bottom: 10px;
                text-align: center; /* Teks otomatis rata tengah di layar HP */
            }
            
            .left-side p {
                text-align: center; /* Sub-teks ikut rata tengah */
            }
        }
    </style>
</head>

<body>

<div class="login-wrapper">

    {{ $slot }}

</div>

</body>
</html>