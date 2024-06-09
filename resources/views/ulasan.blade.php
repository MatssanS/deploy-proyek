@extends('layouts.theme')

@section('content')

<div class="container">
  <h1 class="mt-5 mb-4 text-center">Ulasan Admin</h1>
  <div class="row justify-content-center">
    @foreach($reviews as $review)
    <div class="col-md-4 mb-4">
      <div class="card text-center">
        <!-- Check if pelanggan relationship exists before accessing its properties -->
        @if($review->pelanggan)
          <!-- Use asset() to generate correct URL for the image -->
          <img src="{{ asset('storage/' . $review->foto_menu_path) }}" class="card-img-top" alt="{{ $review->pelanggan->nama }}">
        @endif
        <div class="card-body d-flex flex-column align-items-center">
          <!-- Check if pelanggan relationship exists before accessing its properties -->
          @if($review->pelanggan)
            <h5 class="card-title mb-0">{{ $review->pelanggan->nama }}</h5>
          @endif
          <span class="star-rating">
            @for($i = 0; $i < $review->rating; $i++)
              <i class="bi bi-star-fill"></i>
            @endfor
            @for($i = $review->rating; $i < 5; $i++)
              <i class="bi bi-star"></i>
            @endfor
          </span>
          <!-- Star ratings -->
          <!-- Check if 'review' property exists before accessing it -->
          @if(isset($review->review))
            <p class="mt-2">{{ $review->review }}</p>
          @endif
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@endsection
