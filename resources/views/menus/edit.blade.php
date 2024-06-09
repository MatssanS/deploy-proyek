@extends('layouts.theme')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Edit Menu</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <form action="{{ route('menus.update', ['menu' => $menu->id_menu]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" id="nama_menu" name="nama_menu" value="{{ $menu->nama_menu }}" required>
                </div>
                <div class="mb-3">
                    <label for="harga_menu" class="form-label">Harga Menu</label>
                    <input type="text" class="form-control" id="harga_menu" name="harga_menu" value="{{ $menu->harga_menu }}" required>
                </div>
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Menu</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $menu->deskripsi }}" required>
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
                    @if ($menu->foto_menu_path)
                    <img src="{{ asset('storage/'.$menu->foto_menu_path) }}" alt="{{ $menu->nama_menu }}" class="img-fluid mt-3" style="width: 200px">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection
