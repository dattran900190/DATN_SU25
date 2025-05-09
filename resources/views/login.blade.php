<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #f8f9fa;
        }

        .login-container {
            margin-top: 100px;
        }

        .card {
            border-radius: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
            
                        <h3 class="text-center mb-4">Đăng nhập</h3>
                        @if (session('messageError'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                {{ session('messageError') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('postLogin') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                @error('email')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                
                                <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu">
                                @error('password')
                                    <span class="text-danger">{{ $message }} </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Đăng nhập</button>

                            <div class="text-center mt-3">
                                <b href="#" style="" >Quên mật khẩu?</b>
                            </div>
                            <div class="text-center mt-3">
                                <a href="{{route('register')}}" class="btn btn-success w-50" style="text-decoration: none">Tạo tài khoản mới</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
