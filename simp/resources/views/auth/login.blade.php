<!doctype html>
<html lang="en">


<head>

    <meta charset="utf-8" />
    <title>Login SIMPENDI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <!-- App favicon -->
    <link rel="icon" href="{{ asset ('assets/images/logo1.png') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset ('assets/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset ('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset ('assets/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                @if ($message = Session::get('error'))
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                        <h3 class="text-warning"><i class="fa fa-exclamation-triangle"></i> Warning</h3> {{ $message }}
                    </div>
                @endif
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Login SIMPENDI</h5>
                                    <p>Silahkan Login.</p>
                                </div>
                            </div>
                        <!-- <div class="col-5 align-self-end">
                                <img src="{{asset('assets/images/logo1.png')}}" alt="" class="img-fluid" height="20">
                            </div> -->
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="index.html">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/images/logo1.png')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('auth.login.submit')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror"
                                           name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="userpassword">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Login Sebagai</label>
                                    <select name="guard" class="form-control">
                                        <option value="admin">Admin</option>
                                        <option value="dosen">Dosen</option>
                                        <option value="reviewer">Reviewer</option>
                                        <option value="kap3m">Ka. P3M</option>
                                    </select>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>© 2020 SIMPENDI PHB. Crafted with <i class="mdi mdi-heart text-danger"></i> by Me</p>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js')}}"></script>
</body>

<!-- Mirrored from themesbrand.com/skote/layouts/vertical/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 05:15:17 GMT -->
</html>
