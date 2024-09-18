<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-primary">
        <img src="{{url('/assets/images/pnup.png')}}" alt="AdminLTE Logo" class="brand-image elevation-3">
        <span class="brand-text font-weight-dark">Perencanaan PNUP</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{url('/adminlte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.dashboard')}}" class="nav-link {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt "></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item
                    {{ 
                        Request::routeIs('FormTambahUnitKerja*') ||
                        Request::routeIs('admin.tahun_anggaran*') ||
                        Request::routeIs('admin.data_bidang*') ||
                        Request::routeIs('admin.bidang_anggaran*') ||
                        Request::routeIs('UnitKerja*') ||
                        Request::routeIs('admin.iku*') ? 'active menu-open' : ''
                    }}">
                    <a href="#" class="nav-link
                        {{
                            Request::routeIs('FormTambahUnitKerja*') || 
                            Request::routeIs('admin.tahun_anggaran*') ||
                            Request::routeIs('admin.data_bidang*') ||
                            Request::routeIs('admin.bidang_anggaran*') ||
                            Request::routeIs('UnitKerja*') ||
                            Request::routeIs('admin.iku*') ? 'active' : ''
                        }}
                    ">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.tahun_anggaran')}}" class="nav-link {{ Request::routeIs('admin.tahun_anggaran*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Tahun Anggaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.data_bidang') }}" class="nav-link {{ Request::routeIs('admin.data_bidang*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bidang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.bidang_anggaran') }}" class="nav-link {{ Request::routeIs('admin.bidang_anggaran*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Anggaran Bidang</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('UnitKerja')}}" class="nav-link {{ Request::routeIs('UnitKerja*') || Request::routeIs('FormTambahUnitKerja*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Unit kerja</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.iku')}}" class="nav-link {{ Request::routeIs('admin.iku*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Iku</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item
                    {{
                        Request::routeIs('admin.jenis_anggaran*') ||
                        Request::routeIs('admin.sub_anggaran*') ? 'active menu-open' : ''
                    }}
                ">
                    <a href="#" class="nav-link
                        {{
                            Request::routeIs('admin.jenis_anggaran*') ||
                            Request::routeIs('admin.sub_anggaran*') ? 'active' : ''
                        }}
                    ">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Anggaran
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('admin.jenis_anggaran')}}" class="nav-link {{ Request::routeIs('admin.jenis_anggaran*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jenis Anggaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.sub_anggaran')}}" class="nav-link {{ Request::routeIs('admin.sub_anggaran*') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Sub Anggaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item 
                    {{
                        Request::routeIs('FormTambahUser') ||
                        Request::routeIs('dataUser*') ? ' active menu-open' : ''
                    }}
                ">
                    <a href="{{route('dataUser')}}" class="nav-link
                        {{
                            Request::routeIs('FormTambahUser') ||
                            Request::routeIs('dataUser*') ? ' active' : ''
                        }}
                    ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Data User
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>