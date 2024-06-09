@extends('layouts.theme')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <!-- Opsi Tambah Menu -->
            <button class="btn btn-lg add-menu" style="background-color: #13f047; color: #4a1260;"><i class="bi bi-plus-square"></i> Tambah Menu</button>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-4">
            <!-- Menu Item 1 -->
            <div class="card menu-item text-center">
                <img src="{{ asset('uploads/BR.png') }}" alt="Menu 1" class="img-fluid menu-image">
                <!-- Nama Menu -->
                <h4 class="text-center mt-2">Menu 1</h4>
                <!-- Icon Edit -->
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-primary btn-lg mx-2"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-outline-danger btn-lg mx-2"><i class="bi bi-trash3"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Menu Item 2 -->
            <div class="card menu-item text-center">
                <img src="{{ asset('uploads/BR.png') }}" alt="Menu 2" class="img-fluid menu-image">
                <!-- Nama Menu -->
                <h4 class="text-center mt-2">Menu 2</h4>
                <!-- Icon Edit -->
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-primary btn-lg mx-2"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-outline-danger btn-lg mx-2"><i class="bi bi-trash3"></i></button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <!-- Menu Item 3 -->
            <div class="card menu-item text-center">
                <img src="{{ asset('uploads/BR.png') }}" alt="Menu 3" class="img-fluid menu-image">
                <!-- Nama Menu -->
                <h4 class="text-center mt-2">Menu 3</h4>
                <!-- Icon Edit -->
                <div class="d-flex justify-content-center">
                    <button class="btn btn-outline-primary btn-lg mx-2"><i class="bi bi-pencil-square"></i></button>
                    <button class="btn btn-outline-danger btn-lg mx-2"><i class="bi bi-trash3"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

    <style>
        .add-menu:hover,
        .add-menu:focus {
        background-color: #10e038; /* Ubah warna saat dihover */
        color: #250764; /* Ubah warna teks saat dihover */
}
        /* CSS untuk mengatur ukuran gambar */
        .menu-image {
            width: 100%; /* Mengatur lebar gambar menjadi 100% dari parent container */
            height: auto; /* Mengatur tinggi gambar secara otomatis sesuai dengan aspek rasio */
        }
        /* CSS untuk memberikan margin bottom */
        .container {
            margin-top: 100px
            margin-bottom: 100px; /* Sesuaikan dengan tinggi footer */
        }
        .add-menu:hover,
        .add-menu:focus {/* Ubah warna saat dihover */
        color: #ececec; /* Ubah warna teks saat dihover */
}
    </style>
@endsection
