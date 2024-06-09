@extends('layouts.theme')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <a href="{{ route('menus.create') }}" class="btn btn-lg add-menu" style="background-color: #13f047; color: #fff; border: none; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);"><i class="bi bi-plus-square"></i> Tambah Menu</a>
        </div>
    </div>
    <div class="row mt-3">
        @foreach ($menus as $menu)
        <div class="col-md-3">
            <div class="card menu-item text-center" style="margin-top: 20px; margin-bottom: 20px; padding: 20px; border-radius: 15px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);">
                <img src="{{ asset('storage/' . $menu->foto_menu_path) }}" alt="{{ $menu->nama_menu }}" class="img-fluid menu-image fixed-size">
                <h4 class="text-center mt-2">{{ $menu->nama_menu }}</h4>
                <h5 class="text-center">{{ $menu->harga_menu }}</h5>
                <div class="d-flex justify-content-center">
                    <a href="{{ route('menus.edit', ['menu' => $menu->id_menu]) }}" class="btn btn-outline-primary btn-lg mx-2" style="margin-bottom: 20px"><i class="bi bi-pencil-square"></i></a>
                    <form action="{{ route('menus.destroy', $menu->id_menu) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-lg mx-2" style="margin-bottom: 20px"><i class="bi bi-trash3"></i></button>
                    </form>
                </div>
            </div>
        </div>               
        @endforeach
    </div>
</div>
@endsection
