@extends('templates.user')

@section('content')
    <!--==========================
      Services Section
    ============================-->
    <section id="services" class="section-bg">
        <div class="container">

            <header class="section-header">
                <h3>MENU</h3>
            </header>

            <div class="row">

                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #fceef3;"><i class="ion-ios-analytics-outline" style="color: #ff689b;"></i></div>
                        <h4 class="title"><a href="{{ route('user.pengabdian.create')}}">PENGABDIAN</a></h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #fff0da;"><i class="ion-ios-bookmarks-outline" style="color: #e98e06;"></i></div>
                        <h4 class="title"><a href="{{ route('user.penelitian.create')}}">PENELITIAN</a></h4>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #e6fdfc;"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
                        <h4 class="title"><a href="{{ route('user.hki.create') }}">HKI</a></h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
                    <div class="box">
                        <div class="icon" style="background: #eafde7;"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
                        <h4 class="title"><a href="http://p3m.poltektegal.ac.id/">PROFIL P3M</a></h4>
                    </div>
                </div>


            </div>

        </div>
    </section><!-- #services -->
@stop
