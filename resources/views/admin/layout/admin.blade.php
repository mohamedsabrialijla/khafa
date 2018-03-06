<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{url('/admin_assets/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
@yield('page-style')
<!-- jvectormap -->
    <link rel="stylesheet" href="{{url('/admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{url('/admin_assets/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{url('/admin_assets/dist/css/skins/_all-skins.min.css')}}">
    {{--    <link rel="stylesheet" href="{{url('/admin_assets/dist/css/skins/skin-black-light.css')}}">--}}

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--FavIcone -->
    <link rel="shortcut icon" href="{{$setting->logo}}" type="image/x-icon">
</head>
<body class="hold-transition skin-blue-light sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url(app()->getLocale().'/admin/home')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
        {{--<span class="logo-mini"><b>E</b>T</span>--}}
        <!-- logo for regular state and mobile devices -->
            {{--<span class="logo-lg"><b>E</b>Tadrees</span>--}}

            <div class="image">
                <img src="{{$setting->logo}}" class="img-thumbnail" style="width: 45px;">
            </div>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notifications: style can be found in dropdown.less -->
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="{{url('/admin_assets/dist/img/user2-160x160.jpg')}}" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">{{auth()->user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="{{url('/admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle">
                                <p>
                                    Administrator - Web Developer
                                    <small>{{auth()->user()->created_at}}</small>
                                </p>
                            </li>
                          
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    {{--<a href="#" class="btn btn-default btn-flat">Sign out</a>--}}
                                    <a href="{{ url(app()->getLocale().'/admin/logout') }}"
                                       class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>
                                    <form id="logout-form" action="{{ url(app()->getLocale().'/admin/logout') }}"
                                          method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{url('/admin_assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                    
                </div>
                <div class="pull-left info">
                    <p>Administrator</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="{{(explode('.',\Request::route()->getName())[1]=='home')?'active':''}}">
                    <a href="{{url(app()->getLocale().'/admin/home')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span></a>
                </li>


                <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='users')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Users</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(explode('.',\Request::route()->getName())[2]!='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/users')}}">
                                <i class="fa fa-circle-o"></i> All Users
                            </a>
                        </li>
                       {{--  <li class="{{(explode('.',\Request::route()->getName())[2]=='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/users/create')}}">
                                <i class="fa fa-plus"></i> اضافة مستخدم جديد
                            </a>
                        </li> --}}
                    </ul>
                </li>

                 <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='driver_man')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Drivers</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(explode('.',\Request::route()->getName())[2]!='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/driver_man')}}">
                                <i class="fa fa-circle-o"></i> All Drivers
                            </a>
                        </li>
                       {{--  <li class="{{(explode('.',\Request::route()->getName())[2]=='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/users/create')}}">
                                <i class="fa fa-plus"></i> اضافة مستخدم جديد
                            </a>
                        </li> --}}
                    </ul>
                </li>

                <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='ads')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Advertising Ads</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(explode('.',\Request::route()->getName())[2]!='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/ads')}}">
                                <i class="fa fa-circle-o"></i> All Ads
                            </a>
                        </li>
                        <li class="{{(explode('.',\Request::route()->getName())[2]=='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/ads/create')}}">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </li>
                    </ul>
                </li>

              
                <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='splash')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span> App Slider</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(explode('.',\Request::route()->getName())[2]!='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/splash')}}">
                                <i class="fa fa-circle-o"></i> All Image Sliders
                            </a>
                        </li>
                        <li class="{{(explode('.',\Request::route()->getName())[2]=='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/splash/create')}}">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </li>
                    </ul>
                </li>

                 <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='company')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Companies</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(explode('.',\Request::route()->getName())[2]!='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/company')}}">
                                <i class="fa fa-circle-o"></i> All Companies
                            </a>
                        </li>
                        <li class="{{(explode('.',\Request::route()->getName())[2]=='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/company/create')}}">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='products')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Products</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(explode('.',\Request::route()->getName())[2]!='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/products')}}">
                                <i class="fa fa-circle-o"></i> All Products
                            </a>
                        </li>
                        <li class="{{(explode('.',\Request::route()->getName())[2]=='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/products/create')}}">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='helps')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>FQA</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(explode('.',\Request::route()->getName())[2]!='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/helps')}}">
                                <i class="fa fa-circle-o"></i> All FQA
                            </a>
                        </li>
                        <li class="{{(explode('.',\Request::route()->getName())[2]=='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/helps/create')}}">
                                <i class="fa fa-plus"></i> Add FQA
                            </a>
                        </li>
                    </ul>
                </li>



                <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='contacts')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-user"></i>
                        <span>Messsages Contact</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="{{(explode('.',\Request::route()->getName())[2]!='create')?'active':''}}">
                            <a href="{{url(app()->getLocale().'/admin/contacts')}}">
                                <i class="fa fa-circle-o"></i> All Messages
                            </a>
                        </li>
                    </ul>
                </li>

               


        
            

                <li class="header">Core Features</li>
              
                <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='pages')?'active':''}}">
                    <a href="#">
                        <i class="fa fa-files-o"></i>
                        <span>Pages</span>
                        <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="{{url(app()->getLocale().'/admin/pages')}}">
                                <i class="fa fa-circle-o"></i> All Pages
                            </a>
                        </li>
                        <li>
                            <a href="{{url(app()->getLocale().'/admin/pages/create')}}">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="treeview {{(explode('.',\Request::route()->getName())[1]=='settings')?'active':''}}">
                    <a href="{{url(app()->getLocale().'/admin/settings')}}">
                        <i class="fa fa-gears"></i>
                        <span>Settings</span>
                    </a>
                </li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content">
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            {{--<b>Version</b> 2.3.8--}}
        </div>
        <strong>Copyright &copy; {{date('Y')}} <a href="http://linekw.com">Line</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="{{url('/admin_assets/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{url('/admin_assets/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{url('/admin_assets/dist/js/app.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{url('/admin_assets/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{url('/admin_assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{url('/admin_assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@yield('js-plugins')

<!-- AdminLTE for demo purposes -->
{{--<script src="{{url('/admin_assets/dist/js/demo.js')}}"></script>--}}

@yield('page-script')
</body>
</html>
