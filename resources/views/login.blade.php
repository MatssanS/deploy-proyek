<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Existing meta tags and title -->
    <title>Admin Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 75vh;
            margin: 0;
        }
        .card {
            border: 1px solid #dee2e6;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
        }
        .btn-custom {
            background-color: #13f047;
            border: none;
            color: #fff;
            margin-top: 15px;
        }
        .btn-custom:hover {
            background-color: #007bff;
        }
        .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }
        .form-group label {
            position: absolute;
            top: 0;
            left: 15px;
            padding: 0 5px;
            background: #fff;
            color: #6c757d;
            transition: 0.2s ease all;
            pointer-events: none;
        }
        .form-group input:focus + label,
        .form-group input:not(:placeholder-shown) + label {
            top: -20px;
            left: 10px;
            color: #007bff;
            font-size: 0.875rem;
        }
        .form-control {
            background-color: transparent;
            border: 1px solid #ced4da;
        }
        .form-control:placeholder-shown {
            color: transparent;
        }
        .form-control:focus {
            background-color: transparent;
            border-color: #007bff;
            box-shadow: none;
        }
        .text-center img {
            display: block;
            margin: 0 auto 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <div class="text-center">
                            <img src="{{ asset('uploads/Logo.png') }}" alt="Logo" width="50">
                        </div>
                        @if(Auth::guard('admin')->check())
                            <div class="text-center">
                                <p>You are already logged in.</p>
                                <form method="POST" action="{{ route('admin.logout') }}">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </form>
                            </div>
                        @else
                            <form method="POST" action="{{ route('admin.login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" name="nama" id="nama" class="form-control" required autofocus placeholder=" ">
                                    <label for="nama">Nama</label>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control" required placeholder=" ">
                                    <label for="password">Password</label>
                                </div>
                                @error('nama')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="btn btn-custom">Login</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>