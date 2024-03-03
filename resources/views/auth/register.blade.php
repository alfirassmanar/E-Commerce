<!DOCTYPE html>
<html class="h-100" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Kasir - Regitrasi Akun</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body class="h-100">

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3"
                    stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">

                                <a class="text-center" href="#">
                                    <h4>Registrasi</h4>
                                </a>

                                <form class="mt-5 mb-5 login-input" action="{{ route('registrasi-proses') }}"
                                    method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nama Lengkap"
                                            name="name" value="{{ old('name') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Email" name="email"
                                            value="{{ old('email') }}" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" placeholder="Password"
                                            name="password" value="{{ old('password') }}" required>
                                    </div>
                                    <div class="form-group" style="margin-left: 20px;">
                                        <input class="form-check-input" type="radio" name="role" id="admin"
                                            required value="admin">
                                        <label class="form-check-label" for="admin">
                                            Admin
                                        </label>
                                    </div>
                                    <div class="form-group" style="margin-left: 20px;">
                                        <input class="form-check-input" type="radio" name="role" id="kasir"
                                            required value="kasir">
                                        <label class="form-check-label" for="kasir">
                                            Kasir
                                        </label>
                                    </div>
                                    <div class="form-group" style="margin-left: 20px;">
                                        <input class="form-check-input" type="radio" name="role" id="user"
                                            required value="user">
                                        <label class="form-check-label" for="kasir">
                                            User
                                        </label>
                                    </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">Daftar</button>
                                    <p class="mt-5 login-form__footer">Sudah punya akun <a href="{{ route('login') }}"
                                            class="text-primary">Masuk </a> sekarang</p>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>




    <!--**********************************
        Scripts
    ***********************************-->
    <script src="/assets/plugins/common/common.min.js"></script>
    <script src="/assets/js/custom.min.js"></script>
    <script src="/assets/js/settings.js"></script>
    <script src="/assets/js/gleek.js"></script>
    <script src="/assets/js/styleSwitcher.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if ($message = Session::get('success-regist'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Halo Users',
                text: '{{ $message }}',
            })
        </script>
    @endif
</body>

</html>
