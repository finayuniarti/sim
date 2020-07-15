<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 05:14:05 GMT -->
@include('templates.partials.reviewer._head')

<body data-sidebar="dark">

<!-- Begin page -->
<div id="layout-wrapper">

    @include('templates.partials.reviewer._navbar')
    <!-- ========== Left Sidebar Start ========== -->
    <div class="vertical-menu">

        <div data-simplebar class="h-100">

            <!--- Sidemenu -->
    @include('templates.partials.reviewer._sidebar')
            <!-- Sidebar -->
        </div>
    </div>
    <!-- Left Sidebar End -->

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">
@yield('content')

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        @include('templates.partials.reviewer._footer')
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

@include('templates.partials.reviewer._script')
</body>


<!-- Mirrored from themesbrand.com/skote/layouts/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 07 Apr 2020 05:14:37 GMT -->
</html>
