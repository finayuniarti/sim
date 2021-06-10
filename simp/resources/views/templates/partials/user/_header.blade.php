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
                <li><a>{{Auth::guard('web')->user()->name}}</a></li>
                <li class="active"><a href="{{ route('user.laporan.index') }}">Laporan</a></li>

                @if(Request::is('user/penelitian/create'))
                    <li class="active"><a href="{{ route('user.penelitian.revisi') }}">Revisi</a></li>
                    <li class="active"><a href="{{ route('user.penelitian.notifikasi') }}">Notif</a></li>
                @endif
                @if(Request::is('user/pengabdian/create'))
                    <li>
                        <a href="{{ route('user.pengabdian.revisi') }}">
                            <span>Revisi</span>
                            <span class="ml-2 pull-right-container">
                                <small class="label pull-right" id="notify" style="background: yellow; padding: 3px;">0</small>
                            </span>
                        </a>
                    <li class="active"><a href="{{'#'}}">Notif</a></li>
                        <a href="{{ route('user.pengabdian.notif') }}">
                            <span>Notif</span>
                            <span class="ml-2 pull-right-container">
                                <small class="label pull-right" id="notify" style="background: yellow; padding: 3px;">0</small>
                            </span>
                         </a>
                    </li>
                @endif
                <li><a href="{{route('auth.logout')}}">Logout</a></li>
            @else
                <li><a href="{{ route('auth.login') }}">Login</a></li>
            @endif
        </ul>
    </nav><!-- .main-nav -->

</div>
