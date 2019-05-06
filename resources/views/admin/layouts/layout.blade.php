<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="/assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>ODDSTACKER ADMIN</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <link href="/assets/css/custom.css" rel="stylesheet"/>


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>
<div id="app">

<div class="wrapper" id="">
    <div class="sidebar" data-color="purple" data-image="/assets/img/sidebar-5.jpg">
    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    ODDSTACKER
                </a>
            </div>

            <ul class="nav">
                <li class="{{Request::is('admin') ? "active" : ""  }}" >
                    <a href="dashboard.html">
                        <i class="fa fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="{{Request::is('admin/users') ? "active" : ""  }}">
                    <a href="{{ route('admin.users') }}">
                        <i class="fa fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
                <li class="{{Request::is('admin/predictions*') ? "active" : ""  }}">
                    <a href="{{ route('admin.prediction') }}">
                        <i class="fa fa-lightbulb-o"></i>
                        <p>Predictions</p>
                    </a>
                </li>
                <li class="{{Request::is('admin/countries') ? "active" : ""  }}">
                    <a href="/admin/countries">
                        <i class="fa fa-flag"></i>
                        <p>Countries</p>
                    </a>
                </li>
                <li class="{{Request::is('admin/sports') ? "active" : ""  }}">
                    <a href="/admin/sports">
                        <i class="fa fa-globe"></i>
                        <p>Sports</p>
                    </a>
                </li>
                <li class="{{Request::is('admin/teams*') ? "active" : ""  }}">
                    <a href="{{ route('admin.teams') }}">
                        <i class="fa fa-flag-checkered"></i>
                        <p>Teams</p>
                    </a>
                </li>
                </li>
                <li class="{{Request::is('admin/competition*') ? "active" : ""  }}">
                    <a href="/admin/competition">
                        <i class="fa fa-bicycle"></i>
                        <p>Competitions</p>
                    </a>
                </li>
                <li class="{{Request::is('admin/leagues*') ? "active" : ""  }}">
                    <a href="/admin/leagues">
                        <i class="fa fa-trophy"></i>
                        <p>Leagues</p>
                    </a>
                </li>
                <li class="{{Request::is('admin/events*') ? "active" : ""  }}">
                    <a href="/admin/events">
                        <i class="fa fa-gamepad"></i>
                        <p>Events</p>
                    </a>
                </li>
                <li class="{{Request::is('admin/stocks*') ? "active" : ""  }}">
                    <a href="/admin/stocks">
                        <i class="fa fa-stack-overflow"></i>
                        <p>Stocks</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">User</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-globe"></i>
                                    <b class="caret hidden-sm hidden-xs"></b>
                                    <span class="notification hidden-sm hidden-xs">5</span>
									<p class="hidden-lg hidden-md">
										5 Notifications
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>
                        <li>
                           <a href="">
                                <i class="fa fa-search"></i>
								<p class="hidden-lg hidden-md">Search</p>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <p>
										Account
										<b class="caret"></b>
									</p>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#"><i class="pe-7s-cup"></i>Profile</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="pe-7s-close-circle"></i>Logout</a></li>
                              </ul>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content" id="">
            @include('admin.partials.error')
            @include('admin.partials.success')
            @yield('content')
        </div>
        <footer class="footer">
            <div class="container-fluid">
                {{-- <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav> --}}
                <p class="copyright pull-right">
                    &copy; {{date('Y')}}
            </div>
        </footer>
    </div>
</div>

@yield('out')
<div class="modal fade" id="addCountry" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLongTitle">ADD Country</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('country.create') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-group">
                        <label>Country Name</label>
                        <input type="text" name="name" required class="form-control" placeholder="Nigeria">
                    </div>
                    <div class="form-group">
                        <label>Country Logo</label>
                        <input type="url" name="logo" required class="form-control" placeholder="Image URL" value="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">ADD Country</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

</body>

<!--   Core JS Files   -->
    <script src="/js/app.js"></script>
    <script src="/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>
    
	<!--  Charts Plugin -->
	<script src="/assets/js/chartist.min.js"></script>
    
    <!--  Notifications Plugin    -->
    <script src="/assets/js/bootstrap-notify.js"></script>
    
    
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="/assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>