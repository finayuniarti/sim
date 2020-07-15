<div id="topbar">
    <div class="container">
        <div class="social-links">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
    </div>
</div>

<div class="container">

    <div class="logo float-left">
        <!-- Uncomment below if you prefer to use an image logo -->
        <h1 class="text-light"><a href="#services" class="scrollto"><span>SIMPENDI PHB</span></a></h1>
        <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
    </div>

    <nav class="main-nav float-right d-none d-lg-block">
        <ul>
            @if(Auth::check())
                <li class="active"><a href="{{route('user.home.index')}}">Home</a></li>
                <li><a href="{{route('auth.logout')}}">Logout</a></li>
                <li><a>{{Auth::guard('web')->user()->name}}</a></li>
                <li><a href="{{ route('user.laporan.index') }}">Laporan</a></li>
                @if(Request::is('user/penelitian/create'))
                    <li><a href="{{ route('user.penelitian.revisi') }}">Notifikasi</a></li>
                @endif
                @if(Request::is('user/pengabdian/create'))
                    <li><a href="{{ route('user.pengabdian.revisi') }}">Notifikasi</a></li>
                @endif
            @else
                <li><a href="{{ route('auth.login') }}">Login</a></li>
            @endif
        </ul>
    </nav><!-- .main-nav -->

</div>
