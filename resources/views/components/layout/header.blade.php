<header id="topnav">
    <div class="topbar-main">
        <div class="container-fluid">

            <!-- Logo container-->
            <div class="logo">

                <a href="index.html" class="logo">
                    <img src="{{ asset('template_assets') }}/images/logo-sm-light.png" alt="" class="logo-small">
                    <img src="{{ asset('template_assets') }}/images/logo-light.png" alt="" class="logo-large">
                </a>

            </div>

            <!-- End Logo container-->


            <div class="menu-extras topbar-custom">

                <ul class="navbar-right d-flex list-inline float-right mb-0">
                    <li class="dropdown notification-list d-none d-sm-block">
                        <form role="search" class="app-search">
                            <div class="form-group mb-0">
                                <span class="h6 text-white d-block flex align-items-center px-3 py-2"
                                    style="background-color: rgba(255, 255, 255, 0.432); border-radius: 20px">{{ auth()?->user()?->name }}
                                    PT
                                    Denpasar</span>
                            </div>
                        </form>
                    </li>

                    <li class="dropdown
                                    notification-list">


                    </li>
                    <li class="dropdown notification-list">
                        <div class="dropdown notification-list">
                            <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light"
                                data-toggle="dropdown" href="#" role="button" aria-haspopup="false"
                                aria-expanded="false">
                                <img src="{{ asset('template_assets') }}/images/logo-pt.png" alt="user"
                                    class="rounded-circle">
                            </a>
                            @auth
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    {{-- <a class="dropdown-item" href="#"><i class="mdi mdi-account-circle m-r-5"></i>
                                        Profile</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-wallet m-r-5"></i> My
                                        Wallet</a>
                                    <a class="dropdown-item d-block" href="#"><span
                                            class="badge badge-success float-right">11</span><i
                                            class="mdi mdi-settings m-r-5"></i> Settings</a>
                                    <a class="dropdown-item" href="#"><i class="mdi mdi-lock-open-outline m-r-5"></i>
                                        Lock screen</a>
                                    <div class="dropdown-divider"></div> --}}
                                    <a class="dropdown-item text-danger" href="{{ url('logout') }}"><i
                                            class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>
                            @endauth

                        </div>
                    </li>

                    <li class="menu-item list-inline-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle nav-link">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </li>

                </ul>



            </div>
            <!-- end menu-extras -->

            <div class="clearfix"></div>

        </div> <!-- end container -->
    </div>
    <!-- end topbar-main -->

    <!-- MENU Start -->
    <div class="navbar-custom">
        <div class="container-fluid">
            <div id="navigation">
                <!-- Navigation Menu-->
                <ul class="navigation-menu">
                    @guest
                        <li class="has-submenu">
                            <a href="{{ url('/') }}"><i class="mdi mdi-home"></i>Utama</a>
                        </li>
                    @endguest

                    <li class="has-submenu">
                        <a href="{{ url('/home') }}"><i class="mdi mdi-animation"></i>Semua</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ url('/home/pidana') }}"><i class="mdi mdi-archive"></i>Pidana</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ url('/home/perdata') }}"><i class="mdi mdi-database"></i>Perdata</a>
                    </li>
                    <li class="has-submenu">
                        <a href="{{ url('/home/tipikor') }}"><i class="mdi mdi-scale-balance"></i>Tipikor</a>
                    </li>
                    @auth

                        <li class="has-submenu">
                            <a href="{{ url('/admin/add') }}"><i class="mdi mdi-plus"></i>Tambah Perkara</a>
                        </li>
                    @endauth
                    @if (auth()?->user()?->role === 'admin')
                        <li class="has-submenu">
                            <a href="{{ url('/admin/account') }}"><i class="mdi mdi-account"></i>Users</a>
                        </li>
                    @endif


                    {{-- <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-clipboard"></i>Forms</a>
                        <ul class="submenu">
                            <li><a href="form-elements.html">Form Elements</a></li>
                            <li><a href="form-validation.html">Form Validation</a></li>
                            <li><a href="form-advanced.html">Form Advanced</a></li>
                            <li><a href="form-editors.html">Form Editors</a></li>
                            <li><a href="form-uploads.html">Form File Upload</a></li>
                            <li><a href="form-xeditable.html">Form Xeditable</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-finance"></i>Charts</a>
                        <ul class="submenu">
                            <li><a href="charts-chartist.html">Chartist Chart</a></li>
                            <li><a href="charts-chartjs.html">Chartjs Chart</a></li>
                            <li><a href="charts-flot.html">Flot Chart</a></li>
                            <li><a href="charts-c3.html">C3 Chart</a></li>
                            <li><a href="charts-morris.html">Morris Chart</a></li>
                            <li><a href="charts-other.html">Jquery Knob Chart</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-google-pages"></i>Pages</a>
                        <ul class="submenu megamenu">
                            <li>
                                <ul>
                                    <li><a href="pages-login.html">Login</a></li>
                                    <li><a href="pages-register.html">Register</a></li>
                                    <li><a href="pages-recoverpw.html">Recover Password</a></li>
                                    <li><a href="pages-lock-screen.html">Lock Screen</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                </ul>
                            </li>
                            <li>
                                <ul>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-blank.html">Blank Page</a></li>
                                    <li><a href="pages-title-2.html">Page Title 2</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li> --}}



                </ul>
                <!-- End navigation menu -->
            </div> <!-- end #navigation -->
        </div> <!-- end container -->
    </div> <!-- end navbar-custom -->
</header>
