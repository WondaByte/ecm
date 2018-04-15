<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{csrf_token()}}">
    	@include('includes.styles')
        <link type="text/css" rel="stylesheet" href="{{url('css/dashboard.css')}}" media="screen,projection"/>
        <title>ECM - @yield('title')</title>
    </head>
    <body>
        <nav class="navbar-top">
            <div class="nav-wrapper ">
                <a class="yay-toggle" href="#">
                    <div class="burg1"></div>
                    <div class="burg2"></div>
                    <div class="burg3"></div>
                </a>
                <a href="{{url('/admin/dashboard')}}" class="brand-logo"><img src="{{url('img/ecm.png')}}" />
                    <span>Expert Collateral &amp; Monitoring Ltd, Ghana</span>
                </a>
                <ul>
                    <li class="user">{{Auth::user()->username}}</li>
                    <li>
                       <a href="{{url('ecm-portal/auth/logout')}}" title="logout"><i class="fa fa-sign-out"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
        <aside class="yaybar yay-shrink yay-hide-to-small yay-gestures">
            <div class="top">
                <div>
                    <!-- Sidebar toggle -->
                    <a href="#" class="yay-toggle">
                        <div class="burg1"></div>
                        <div class="burg2"></div>
                        <div class="burg3"></div>
                    </a>
                    <!-- Sidebar toggle -->
                    <!-- Logo --> 
                    <a href="#!" class="brand-logo">
                        <img src="assets/_con/images/logo-white.png" alt="Con">
                    </a>
                    <!-- /Logo -->
                </div>
            </div>
            <div class="nano has-scrollbar">
                <div class="nano-content" tabindex="0">
                    <ul>
                        <li class="yay-user-info">
                            <a href="page-profile.html">
                                <img src="{{url('img/user.jpg')}}" alt="John Doe" class="circle">
                                <h3 class="yay-user-info-name">{{Auth::user()->username}}</h3>
                                <div class="yay-user-location">
                                    <i class="fa fa-map-marker"></i> Accra, Ghana
                                </div>
                            </a>
                        </li>
                        <li class="label">Menu</li>
                        @yield('side-bar')
                    </ul>
                </div>
            </div>
        </aside>
        <div class="content-wrap">
            <div class="page-title">
                <div class="row">
                    <div class="col s12 m9 l10">
                        <h1>@yield('user') Dashboard</h1>
                        <ul class="link">
                            <li>
                                <a href="#"><i class="fa fa-home"></i> Dashboard</a>/
                            </li>
                            <li><a href="#!">Category</a>/</li><li><a href="#!">Summary</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="contents">
                @yield('contents')
            </div>
        </div>
        <footer class="footer">&copy; 2018 Expert Collateral &amp; Monitoring Ltd, Ghana. All rights reserved.</footer>
        @include('includes.scripts')
        <script type="text/javascript" src="{{url('js/admin.js')}}"></script>
        @yield('script')
    </body>
</html>