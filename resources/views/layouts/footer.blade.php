<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <style>
        .footer-bar {
            background-color: #13f047; /* Warna background hijau */
            color: #4a1260; /* Warna teks putih */
        }
        .footer .almt {
            text-align: right; /* Memposisikan teks ke kanan */
        }
        /* Gaya garis berwarna ungu */
        .footer-bar::before {
            content: "";
            display: block;
            width: 100%;
            height: 10px; /* Ketebalan garis */
            background-color: #4a1260; /* Warna ungu */
        }
    </style>
</head>
<body>
    <div class="footer-bar">
        <footer class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4"> <!-- Bagian kiri -->
                        <div class="footer wa" style="text-align: left"> <!-- Perbaikan kelas -->
                            <a href="#">
                                <i class="bi bi-whatsapp" style="width: 110px, color: rgb(245, 245, 245)">Whatsup</i>
                            </a>
                            <h2 style="color: rgb(245, 245, 245)">0896 2493 6325</h2>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="footer almt" style="text-align: right;"> <!-- Menyesuaikan posisi teks ke kanan -->
                            <h2></h2>
                            <h2></h2>
                            <h2></h2>
                            <h2></h2>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>
