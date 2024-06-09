@extends('layouts.theme')
@section('content')

<div class="container">
    <h1 class="mt-5 mb-4 text-center">Daftar Transaksi Admin</h1>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="/history" class="btn btn-primary me-2"><i class="bi bi-download"></i> Download</a>
        </div>
        <!-- Dropdown menu for selecting the month -->
        <form action="{{ route('transaksi') }}" method="GET" class="d-flex align-items-center">
            <div class="input-group">
                <select class="form-select form-select-sm" name="month">
                    <option value="">All Months</option>
                    @foreach($months as $month)
                        <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>{{ date('F Y', strtotime($month)) }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary btn-sm" type="submit">Filter</button>
            </div>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID Transaksi</th>
                <th>Nama Pelanggan</th>
                <th>Total Harga</th>
                <th>Gambar Transfer</th>
                <th>Tanggal Pesan</th>
                <th>Tanggal Transaksi</th>
                <th>Metode Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($transactions as $transaction)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $transaction->id_transaksi }}</td>
                <td>{{ $transaction->id_pelanggan }}</td>
                <td>Rp {{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                <td><img src="{{ asset('storage/' . $transaction->gambar_transfer) }}" alt="Bukti Transfer" width="100"></td>
                <td>{{ $transaction->tanggal_pesan }}</td>
                <td>{{ $transaction->tanggal_transaksi }}</td>
                <td>{{ $transaction->metode_pembayaran }}</td>
                <td>{{ $transaction->status_transaksi }}</td>
                <td>
                    @if($transaction->status_transaksi == 'pending')
                    <form action="{{ route('transactions.cancel', $transaction->id_transaksi) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Batal</button>
                    </form>
                    <form action="{{ route('transactions.confirm', $transaction->id_transaksi) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
/* CSS untuk mengubah warna latar belakang bagian thead menjadi ungu */
/* CSS untuk mengubah warna latar belakang bagian thead menjadi ungu dan warna teks menjadi putih */
thead {
    background-color: #4a1260;
    color: #fff; /* Mengubah warna teks menjadi putih */
    text-align: center;
}
</style>
