<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('assets/login/css/style.css') }}">
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Login</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5">
                        <div class="icon d-flex align-items-center justify-content-center">
                            <span class="fa fa-user-o"></span>
                        </div>
                        <h3 class="text-center mb-4">Punya Akun?</h3>
                        <form action="{{ route('login') }}" method="POST" class="login-form">
                            @csrf
                            @method('POST')
                            <div class="form-group">
                                <input type="text" name="username" class="form-control rounded-left" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control rounded-left" placeholder="Password"
                                    required>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="member">
                                    Tidak Punya Akun? <a href="register">Registrasi Sekarang</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded submit p-3 px-5">Mulai</button>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        @if (Session::has('success'))
            var msg = "{{ session('success') }}";
            Swal.fire(
                'Success!',
                msg,
                'success'
            )
          @endif
          @if (Session::has('error'))
            var msg = "{{ session('error') }}";
            Swal.fire(
                'Error!',
                msg,
                'error'
            )
          @endif
      </script>

</body>
</html>