<header>
    <!-- Start Navigation -->
    <nav
        class="navbar mobile-sidenav attr-border navbar-sticky navbar-default validnavs navbar-fixed dark no-background">


        <div class="container d-flex justify-content-between align-items-center">

            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="">
                    <img src="{{ asset('landing_page_assets') }}/img/pt-text.png" class="logo" alt="Logo">
                </a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">

                <img src="{{ asset('landing_page_assets') }}/img/logo.png" alt="Logo">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
                    <i class="fa fa-times"></i>
                </button>

                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="dropdown">
                        <a href="{{ url('/home') }}" class=" active" data-toggle="dropdown">Semua Putusan</a>
                        {{-- <ul class="dropdown-menu">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Multipage</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index.html">App Landing</a></li>
                                    <li><a href="index-2.html">Software Landing</a></li>
                                    <li><a href="index-5.html">Startup Landing</a></li>
                                    <li><a href="index-3.html">Saas Landing</a></li>
                                    <li><a href="index-4.html">Data Science</a></li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Onepage</a>
                                <ul class="dropdown-menu">
                                    <li><a href="index-op.html">App Landing</a></li>
                                    <li><a href="index-op-2.html">Software Landing</a></li>
                                    <li><a href="index-op-5.html">Startup Landing</a></li>
                                    <li><a href="index-op-3.html">Saas Landing</a></li>
                                    <li><a href="index-op-4.html">Data Science</a></li>
                                </ul>
                            </li>
                        </ul> --}}
                    </li>

                    <li class="dropdown">
                        <a href="{{ url('/home/pidana') }}" class=" active" data-toggle="dropdown">Pidana</a>

                    </li>
                    <li class="dropdown">
                        <a href="{{ url('/home/perdata') }}" class=" active" data-toggle="dropdown">Perdata</a>

                    </li>
                    <li class="dropdown">
                        <a href="{{ url('/home/tipikor') }}" class=" active" data-toggle="dropdown">Tipikor</a>

                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->

            <div class="attr-right">
                <!-- Start Atribute Navigation -->
                <div class="attr-nav">
                    <ul>
                        <li class="button"><a href="{{ url('/login') }}">Login Admin</a></li>
                    </ul>
                </div>
                <!-- End Atribute Navigation -->
            </div>

            <!-- Main Nav -->
        </div>
        <!-- Overlay screen for menu -->
        <div class="overlay-screen"></div>
        <!-- End Overlay screen for menu -->
    </nav>
    <!-- End Navigation -->
</header>
