<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="#">
            <span class="align-middle"> </span><br>

            <img src="{{ url('img/header Brosur Alluqmaniyyah 2023.png') }}" alt='sacccca' width="180"
                height="50"><br><br>
        </a>

        <ul class="sidebar-nav">
            @if (Auth::user()->level == 'admin')
                <li class="sidebar-item @if (request()->segment(1) == 'dashboard') active
                    @else @endif">
                    <a class="sidebar-link" href="{{ url('dashboard') }}">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>
            @endif
            @if (Auth::user()->level == 'admin')
                <li class="sidebar-item @if (request()->segment(1) == 'pendaftar') active
                    @else @endif">
                    <a class="sidebar-link" href="{{ url('pendaftar') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Pendaftar</span>
                    </a>
                </li>
                <li class="sidebar-item @if (request()->segment(1) == 'santri' && request()->segment(2) == null) active
                    @else @endif">
                    <a class="sidebar-link" href="{{ url('santri') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Santri Aktif</span>
                    </a>
                </li>
                <li class="sidebar-item @if (request()->segment(1) == 'santri' && request()->segment(2) == 'tidak_aktif') active
                    @else @endif">
                    <a class="sidebar-link" href="{{ url('santri/tidak_aktif') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Santri Tidak
                            Aktif</span>
                    </a>
                </li>
            @elseif(Auth::user()->level == 'user')
                <li class="sidebar-item @if (request()->segment(1) == 'dashboard' && request()->segment(2) == 'qonun') active
                    @else @endif">
                    <a class="sidebar-link" href="{{ url('dashboard/qonun') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Qonun</span>
                    </a>
                </li>
                @if (Auth::user()->verif_qonun == 'yes')
                    <li
                        class="sidebar-item @if (request()->segment(1) == 'dashboard' && request()->segment(2) == 'formulir') active
                        @else @endif">
                        <a class="sidebar-link" href="{{ url('dashboard/formulir') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Formulir</span>
                        </a>
                    </li>
                    <li
                        class="sidebar-item @if (request()->segment(1) == 'dashboard' && request()->segment(2) == 'download') active
                        @else @endif">
                        <a class="sidebar-link" href="{{ url('dashboard/download') }}">
                            <i class="align-middle" data-feather="user"></i> <span class="align-middle">Download
                                Berkas</span>
                        </a>
                    </li>
                @endif
            @endif
        </ul>
    </div>
</nav>
