@extends('layouts.theme')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Tambah Menu</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('menus.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="nama_menu" name="nama_menu" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Harga Menu</label>
                    <input type="text" class="form-control" id="harga_menu" name="harga_menu" required>
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Deskripsi Menu</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" required>
                </div>
                <div class="mb-3">
                    <label for="kategori_menu" class="form-label">Kategori Menu</label>
                    <select class="form-select" id="kategori_menu" name="kategori_menu" required>
                        <option value="">Pilih Kategori</option>
                        <option value="prasmanan">Prasmanan</option>
                        <option value="paketan">Paketan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="status_menu" class="form-label">Status Menu</label>
                    <select class="form-select" id="status_menu" name="status_menu" required>
                        <option value="">Pilih Status</option>
                        <option value="tersedia">Tersedia</option>
                        <option value="kosong">Kosong</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Gambar Menu</label>
                    <input type="file" class="form-control" id="foto_menu_path" name="foto_menu_path">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
