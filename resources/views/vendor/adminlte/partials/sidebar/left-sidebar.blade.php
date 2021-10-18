<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-success elevation-4') }}"
    style="height: 100%">

    {{-- Sidebar brand logo --}}
    @if (config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="mb-3 user-panel d-flex">
            <div class="info">
                <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                    <li class="nav-item has-treeview">
                        <a href="{{ route('account') }}" class="nav-link">{{ ucfirst(Auth::user()->name) }}</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar nav-child-indent flex-column" data-widget="treeview" role="menu">
                {{-- Sertifikasi --}}
                <li class="nav-item has-treeview">
                    <a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                @if (!Auth::user()->hasRole('visitor'))
                    <li class="nav-item has-treeview {{ request()->segment(1) == 'sertifikasi' ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->segment(1) == 'sertifikasi' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-book-reader"></i>
                            <p>
                                Sertifikasi
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (Auth::user()->hasRole('client') || Auth::user()->hasRole('super-admin'))
                                <li class="nav-item">
                                    <a href="{{ route('show-sertifikasi') }}"
                                        class="nav-link text-sm {{ request()->routeIs('show-sertifikasi') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase nav-icon"></i>
                                        <p>Data Sertifikasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('add-sertifikasi') }}"
                                        class="nav-link text-sm {{ request()->routeIs('add-sertifikasi') ? 'active' : '' }}">
                                        <i class="fas fa-plus-circle nav-icon"></i>
                                        <p>Pendaftaran Sertifikasi</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('dokumen-sertifikasi') }}"
                                        class="nav-link text-sm {{ request()->routeIs('dokumen-sertifikasi') ? 'active' : '' }}">
                                        <i class="fas fa-file nav-icon"></i>
                                        <p>Dokumen Sertifikasi</p>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super-admin'))
                                <li class="nav-item">
                                    <a href="{{ route('data-sertifikasi') }}"
                                        class="nav-link text-sm {{ request()->routeIs('data-sertifikasi') ? 'active' : '' }}">
                                        <i class="fas fa-briefcase nav-icon"></i>
                                        <p>Data Sertifikasi</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                    <li class="nav-item has-treeview {{ request()->segment(1) == 'import' ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->segment(1) == 'import' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-file-upload"></i>
                            <p>
                                Import Data
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('import-data-sertifikasi') }}"
                                    class="nav-link text-sm {{ request()->routeIs('import-data-sertifikasi') ? 'active' : '' }}">
                                    <i class="fas fa-file-import nav-icon"></i>
                                    <p>Import Data</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('import-checklist-dokumen') }}"
                                    class="nav-link text-sm {{ request()->routeIs('import-checklist-dokumen') ? 'active' : '' }}">
                                    <i class="fas fa-file-import nav-icon"></i>
                                    <p>Checklist Dokumen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('add-kategori-produk') }}"
                                    class="nav-link text-sm {{ request()->routeIs('add-kategori-produk') ? 'active' : '' }}">
                                    <i class="fas fa-folder-plus nav-icon"></i>
                                    <p>Add Kategori Produk</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
                @if (Auth::user()->hasRole('verifikator') || Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                    <li class="nav-item has-treeview {{ request()->segment(1) == 'penilaian' ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->segment(1) == 'penilaian' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-circle-notch"></i>
                            <p>
                                Penilaian
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (Auth::user()->hasRole('verifikator') || Auth::user()->hasRole('super-admin'))
                                <li class="nav-item">
                                    <a href="{{ route('penilaian-sertifikasi') }}"
                                        class="nav-link text-sm {{ request()->routeIs('penilaian-sertifikasi') ? 'active' : '' }}">
                                        <i class="fas fa-pen-alt nav-icon"></i>
                                        <p>Penilaian Sertifikasi</p>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->hasRole('super-admin') || Auth::user()->hasRole('admin'))
                                <li class="nav-item">
                                    <a href="{{ route('input-angket-penilaian') }}"
                                        class="nav-link text-sm {{ request()->routeIs('input-angket-penilaian') ? 'active' : '' }}">
                                        <i class="fas fa-pen-alt nav-icon"></i>
                                        <p>Input Angket Penilaian</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                @if (!Auth::user()->hasRole('client'))
                    <li class="nav-item has-treeview {{ request()->segment(1) == 'approve' ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->segment(1) == 'approve' ? 'active' : '' }}">
                            <i
                                class="nav-icon fas {{ Auth::user()->hasRole('visitor') ? 'fa-folder' : 'fa-check-double' }} "></i>
                            <p>
                                {{ Auth::user()->hasRole('visitor') ? 'Data' : 'Approve Data' }}
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super-admin'))
                                <li class="nav-item">
                                    <a href="{{ route('approve-sertifikasi') }}"
                                        class="nav-link text-sm {{ request()->routeIs('approve-sertifikasi') ? 'active' : '' }}">
                                        <i class="fas fa-check nav-icon"></i>
                                        <p>Approve Sertifikasi</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="{{ route('approve-dokumen') }}"
                                    class="nav-link text-sm {{ request()->routeIs('approve-dokumen') ? 'active' : '' }}">
                                    <i
                                        class="fas {{ Auth::user()->hasRole('visitor') ? 'fa-file' : 'fa-stamp' }} nav-icon"></i>
                                    <p>
                                        {{ Auth::user()->hasRole('visitor') ? 'Dokumen Sertifikasi' : 'Approve Dokumen' }}
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif

                @if (Auth::user()->hasRole('admin') || Auth::user()->hasRole('super-admin'))
                    {{-- User Administration --}}
                    <li class="nav-item has-treeview {{ request()->segment(1) == 'user' ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link {{ request()->segment(1) == 'user' ? 'active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                User Administration
                                <i class="right fas fa-angle-right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('approve-user') }}"
                                    class="nav-link text-sm {{ request()->routeIs('approve-user') ? 'active' : '' }}">
                                    <i class="fas fa-user-check nav-icon"></i>
                                    <p>Approve User</p>
                                </a>
                            </li>
                            @if (Auth::user()->hasRole('super-admin'))
                                <li class="nav-item">
                                    <a href="{{ route('user-management') }}"
                                        class="nav-link text-sm {{ request()->routeIs('user-management') ? 'active' : '' }}">
                                        <i class="fas fa-user-cog nav-icon"></i>
                                        <p>Manage User</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif
                <li class="nav-item has-treeview">
                    <a href="{{ route('account') }}"
                        class="nav-link {{ request()->routeIs('account') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-circle"></i>
                        <p>
                            Account
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="https://wa.me/send/?phone=6281212937770" target="_blank" class="nav-link">
                        <i class="nav-icon fab fa-whatsapp"></i>
                        <p>
                            Contact Us
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>

</aside>
