<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>SIMPENDI PHB</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset('depan/img/logo1.png')}}" rel="icon">
    <link href="{{ asset('depan/img/logo1.png')}}" rel="logo1">

    <!-- Google Fonts -->
    <link href="{{ asset('depan/https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700')}}" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{asset('assets/libs/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('depan/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset('depan/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{ asset('depan/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{ asset('depan/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
    <link href="{{ asset('depan/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('depan/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

    <!-- Main Stylesheet File -->
    <link href="{{ asset('depan/css/style.css')}}" rel="stylesheet">
</head>

<body>
<!--==========================
Header
============================-->
<header id="header">
    @include('templates.partials.user._header')

</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro" class="clearfix">
    <div class="container d-flex h-100">
        <div class="row justify-content-center align-self-center">
            <div class="col-md-6 intro-info order-md-first order-last">
                <h2>Sistem Informasi Manajemen<br> <span>Penelitian dan Pengabdian Masyarakat </span>Politeknik Harapan Bersama Tegal</h2>

            </div>

            <div class="col-md-6 intro-img order-md-last order-first">
{{--                <img src="{{asset('depan/img/gambar1.jpeg')}}" alt="" class="img-fluid">--}}
            </div>
        </div>

    </div>
</section><!-- #intro -->

<main id="main">
    @yield('content')
</main>

<!--==========================
  Footer
============================-->
<footer id="footer" class="section-bg">
    @include('templates.partials.user._footer')
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Uncomment below i you want to use a preloader -->
<!-- <div id="preloader"></div> -->

<!-- JavaScript Libraries -->
<script src="{{ asset('depan/lib/jquery/jquery.min.js')}}"></script>
<script src="{{ asset('depan/lib/jquery/jquery-migrate.min.js')}}"></script>
<script src="{{ asset('depan/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ asset('depan/lib/easing/easing.min.js')}}"></script>
<script src="{{ asset('depan/lib/mobile-nav/mobile-nav.js')}}"></script>
<script src="{{ asset('depan/lib/wow/wow.min.js')}}"></script>
<script src="{{ asset('depan/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{ asset('depan/lib/counterup/counterup.min.js')}}"></script>
<script src="{{ asset('depan/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ asset('depan/lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{ asset('depan/lib/lightbox/js/lightbox.min.js')}}"></script>
<!-- Contact Form JavaScript File -->
<script src="{{ asset('depan/contactform/contactform.js')}}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset('depan/js/main.js')}}"></script>
<script src="{{ asset('assets/libs/select2/js/select2.min.js')}}"></script>
<script src="{{ asset('assets/js/pages/form-advanced.init.js')}}"></script>

{{--<script src="https://js.pusher.com/7.0/pusher.min.js"></script>--}}
{{--<script>--}}

{{--    // Enable pusher logging - don't include this in production--}}
{{--    Pusher.logToConsole = true;--}}

{{--    var pusher = new Pusher('d3b9719084b5cf94c165', {--}}
{{--        cluster: 'ap1'--}}
{{--    });--}}

{{--    var channel = pusher.subscribe('my-channel');--}}
{{--    channel.bind('my-event', function(data) {--}}
{{--        alert(JSON.stringify(data));--}}
{{--    });--}}
{{--</script>--}}



@auth('web')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
        const url = '{{config("app.url")}}';
        const notify = document.querySelector('#notify');
        async function notification() {
            const notifyData = await getNotify();
            notify.innerText = notifyData.length;
            const pusher = new Pusher('d3b9719084b5cf94c165', {
                cluster: 'ap1',
                encrypted : true,
            });
            console.log(pusher);
            const channel = pusher.subscribe('my-channel');
            console.log(channel);
            channel.bind('App\\Events\\PenelitianEvent',async function(data) {
                const newNotifyData = await getNotify();
                notify.innerText = newNotifyData.length;
                alert('anda diajak');
                swal({
                    title: "Anda di ajak",
                    allowOutsideClick: false
                },function() {
                    window.location = 'notif';
                });
            });
        };

        function  getNotify() {
            return fetch('notify').then(res => res.json()).then(res => res);
        }
        notification()
    </script>

@endauth

</body>
</html>
