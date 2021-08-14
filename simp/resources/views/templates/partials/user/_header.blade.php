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
            <li class="nav-item dropdown">
             <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
               Notifikasi <span class="badge badge-warning" id="countNotify" style="font-size: 16px"> 0 </span>
             </a>
             <div class="dropdown-menu" aria-labelledby="navbarDropdown" id="list-notify">
               <!-- <a class="dropdown-item" href="#">Action</a> -->
             </div>
           </li>

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
            <li>
                {{-- <a href="{{ route('user.pengabdian.notif') }}"> --}}
                <a href="#">
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
@auth
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    const user = '{{Auth::user()->id}}'
    const userChannel = 'notification-user-'+user;
    const key = '{{config('app.pusher_key')}}'
    var pusher = new Pusher(key, {
      cluster: 'ap1',
      encrypted: true
    });

    const countNotify = document.querySelector('#countNotify');
    const listNotify = document.querySelector('#list-notify');

    var channel = pusher.subscribe(userChannel);
    channel.bind('App\\Events\\PenelitianEvent', function(data) {
      getNotify();
    });


    function getNotify(){
      const path = window.location.pathname.split('/')[1];
      fetch('/'+path+'/user/notifikasi')
      .then(response => response.json())
      .then(res => {
        if (res.data) {
          countNotify.innerText = res.data.filter(d => d.status).length;
          let list = ``;
          res.data.map(d => {
            if (d.status) {
              list += `<a onclick="updateNotify(${d.id})" class="dropdown-item">${d.pesan}</a>`
            }

          });
          listNotify.innerHTML = list;
        }
      });
    }

    getNotify();

    function updateNotify(id){
      const path = window.location.pathname.split('/')[1];
      fetch('/'+path+'/user/notifikasi/'+id)
      .then(response => response.json())
      .then(res => {
        getNotify()
      })
    }

  </script>

@endauth
