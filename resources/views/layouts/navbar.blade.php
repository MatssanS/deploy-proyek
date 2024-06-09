<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar Bootstrap 5</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    /* CSS untuk mengubah warna navbar */
    .navbar-custom {
      background-color: #13f047; /* Warna background hijau */
    }
    .navbar-custom .nav-link {
      color: #4a1260; /* Warna tulisan ungu */
      font-size: 18px; /* Ukuran font lebih besar */
      font-family: 'Roboto', sans-serif; /* Menggunakan font Roboto */
    }
    /* Efek hover */
    .navbar-custom .nav-link:hover {
      color: #fff; /* Warna tulisan putih saat dihover */
    }
    /* Active link styling */
    .navbar-custom a.nav-link.active {
      color: #fff;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="{{ asset('uploads/Logo.png') }}" alt="" width="50"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav ms-auto justify-content-end">
          <li class="nav-item col-4">
            <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="/history">Riwayat</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link {{ Request::is('menu') ? 'active' : '' }}" href="/menu">Menu</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link {{ Request::is('ulasan') ? 'active' : '' }}" href="/ulasan">Ulasan</a>
          </li>
          <li class="nav-item col-3">
            <a class="nav-link {{ Request::is('konfirmasi') ? 'active' : '' }}" href="/konfirmasi">Transaksi</a>
          </li>
        </ul>
        <ul class="navbar-nav ms-auto">
          @if(Auth::guard('admin')->check())
          <li>
            <form method="POST" action="{{ route('admin.logout') }}">
              @csrf
              <button type="submit" class="nav-link btn btn-link"><i class="bi bi-box-arrow-right"></i> Logout</button>
            </form>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>