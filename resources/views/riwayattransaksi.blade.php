<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* CSS untuk mengubah warna latar belakang bagian thead menjadi ungu dan warna teks menjadi putih */
        thead {
            background-color: #4a1260;
            color: #fff; /* Mengubah warna teks menjadi putih */
            text-align: center;
        }
        /* CSS untuk mengatur posisi dan tampilan tombol */
        .d-flex {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .me-2 {
            margin-right: 0.5rem;
        }
        .btn-primary {
            background-color: #0069d9;
            border-color: #0062cc;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .btn-secondary {
            background-color: #5a6268;
            border-color: #545b62;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mt-5">Riwayat Transaksi</h1>
            <div>
                <a href="{{ route('transactions.download') }}" class="btn btn-primary me-2"><i class="bi bi-download"></i> Download</a>
                <a href="#" onclick="window.print()" class="btn btn-secondary"><i class="bi bi-printer"></i> Print</a>
                <form action="{{ route('transactions.history') }}" method="GET" class="d-flex align-items-center">
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
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
