<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p>Master</p>
            <span></span>
        </li>
        <li class="nav-item {{ Route::is('package') ? 'active' : '' }}">
            <a class="nav-link" href="{{ Route('package') }}">
                <i class="mdi mdi-package menu-icon"></i>
                <span class="menu-title">Package</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('customer') ? 'active' : '' }}">
            <a class="nav-link" href="{{ Route('customer') }}">
                <i class="mdi mdi-account-multiple menu-icon"></i>
                <span class="menu-title">Customer</span>
            </a>
        </li>
        {{-- <li class="nav-item sidebar-category">
            <p>Master</p>
            <span></span>
        </li> --}}
        {{-- <li class="nav-item {{ Route::is('supplier') ? 'active' : '' }}">
            <a class="nav-link" href="{{ Route('supplier') }}">
                <i class="mdi mdi-truck menu-icon"></i>
                <span class="menu-title">Suppliers</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('kandang') ? 'active' : '' }}">
            <a class="nav-link" href="{{ Route('kandang') }}">
                <i class="mdi mdi-home-variant menu-icon"></i>
                <span class="menu-title">Kandang</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('pakans', 'jadwal_pakan') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="fa-solid fa-wheat-awn menu-icon"></i>
                <span class="menu-title">Pakan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('pakans', 'jadwal_pakan') ? 'show' : '' }}" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ Route::is('pakans') ? 'active' : '' }}"
                            href="{{ route('pakans') }}">Gudang Pakan</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link {{ Route::is('jadwal_pakan') ? 'active' : '' }}"
                            href="{{ route('jadwal_pakan') }}">Jadwal Pakan</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item {{ Route::is('type-sheep', 'sheeps') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="mdi mdi-cow menu-icon"></i>

                <span class="menu-title">Domba</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse {{ Route::is('type-sheep', 'sheeps') ? 'show' : '' }}" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link {{ Route::is('type-sheep') ? 'active' : '' }}"
                            href="{{ route('type-sheep') }}">Jenis
                            Domba</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link {{ Route::is('sheeps') ? 'active' : '' }}"
                            href="{{ route('sheeps') }}">Table
                            Domba</a></li>

                </ul>
            </div>
        </li> --}}
    </ul>
</nav>
