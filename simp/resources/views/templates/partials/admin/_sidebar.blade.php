<div id="sidebar-menu">
    <!-- Left Menu Start -->
    <ul class="metismenu list-unstyled" id="side-menu">
        <li class="menu-title">Menu</li>

        <li>
            <a href="{{ route('admin.judul.index') }}" class=" waves-effect"><i class="bx bxs-widget"></i><span>Rekap Judul</span></a>
        </li>
        <li>
            <a href="{{ route('admin.monev.index') }}" class=" waves-effect"><i class="bx bx-bar-chart"></i><span>Rekap Monev</span></a>
        </li>
        <li>
            <a href="{{ route('admin.hki.index') }}" class=" waves-effect"><i class="bx bx-bar-chart"></i><span>Rekap HKI</span></a>
        </li>
        <li>
            <a href="javascript: void(0);" class="waves-effect">
                <i class="bx bx-home-circle"></i><span>Akun</span>
            </a>
            <ul class="sub-menu" aria-expanded="false">
                <li><a href="{{route ('admin.dosen.index')}}">Dosen</a></li>
                <li><a href="{{route('admin.reviewer.index')}}">Reviewer</a></li>
                <li><a href="{{route('admin.kap3m.index')}}">Ka P3M</a></li>
            </ul>
        </li>
    </ul>
</div>
