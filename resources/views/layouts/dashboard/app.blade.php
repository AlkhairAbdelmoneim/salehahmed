<!DOCTYPE html>
<html dir="{{-- LaravelLocalization::getCurrentLocaleDirection() --}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        {{-- getSetting() --}}
    </title>
    @yield('title')

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

    {{-- <!-- Bootstrap 3.3.7 --> --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/skin-blue.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dashboard_files/css/select2.min.css') }}">

    @if (app()->getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE-rtl.min.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/bootstrap-rtl.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/rtl.css') }}">

        <style>
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: 'Cairo', sans-serif !important;
            }

        </style>
    @else
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/font-awesome.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dashboard_files/css/AdminLTE.min.css') }}">
    @endif

    <style>
        .mr-2 {
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite;
            /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

    </style>
    {{-- <!-- jQuery 3 --> --}}
    <script src="{{ asset('dashboard_files/js/jquery.min.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/select2.min.js') }}"></script>

    {{-- noty --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/noty/noty.css') }}">
    <script src="{{ asset('dashboard_files/plugins/noty/noty.min.js') }}"></script>

    {{-- morris --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/morris/morris.css') }}">

    {{-- <!-- iCheck --> --}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/plugins/icheck/all.css') }}">

    {{-- html in  ie --}}
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <!-- jvectormap -->
    <link rel="stylesheet" href="{{ asset('dashboard_files2/plugins/jvectormap/jquery-jvectormap-1.2.2.css') }}">

    @yield('styles')

</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <header class="main-header">

            {{-- <!-- Logo --> --}}
            <a href="{{-- route('adminbanel') --}}" class="logo">
                {{-- <!-- mini logo for sidebar mini 50x50 pixels --> --}}
                <span class="logo-mini"><b><i class="fa fa-dashboard"></i></span>
                <span class="logo-lg"><b>@lang('site.dashboard')</span>
            </a>

            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <!-- Messages: style can be found in dropdown.less-->
                        <li class="dropdown messages-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-envelope-o"></i>
                                <span class="label label-success">{{-- messages('countMessage') --}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">???????? {{-- messages('countMessage') --}} ?????????? ??????????</li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                        <li>
                                            <!-- start message -->
                                            {{-- @foreach (messages('unreadMessage') as $value)
                                                <a href="{{ route('contact_us.edit', $value->id) }}">
                                                    <div class="pull-left">
                                                        <img src="{{ asset('dashboard_files/img/user2-160x160.jpg') }}"
                                                            class="img-circle" alt="User Image">
                                                    </div>
                                                    <h4>
                                                        {{ $value->name }}
                                                    </h4>
                                                    <p>{!! $value->message !!}</p>

                                                    <small>
                                                        <i class="fa fa-clock-o"></i>
                                                        {{ date_format($value->created_at, 'Y-m-d H:i') }}
                                                    </small>
                                                </a>
                                            @endforeach --}}
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="{{-- route('contact_us.index') --}}">???? ??????????????</a>
                                </li>
                            </ul>
                        </li>

                        {{-- <!-- Notifications: style can be found in dropdown.less --> --}}
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                <span class="label label-warning">{{-- getBuActiveOrNot(0)--}}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="header">???????? {{-- getBuActiveOrNot(0) --}} ???????? ?????????????? ??????????????</li>
                                <li>
                                    {{-- <!-- inner menu: contains the actual data --> --}}
                                    <ul class="menu">
{{-- 
                                        @foreach (getBuStatusWitting() as $value)
                                            <li>
                                                <a href="{{ route('building.edit', $value->id) }}">
                                                    <i class="fa fa-users text-aqua"></i> {{ $value->bu_name }}
                                                </a>
                                            </li>
                                        @endforeach --}}

                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="{{-- route('building') --}}">?????? ????????</a>
                                </li>
                            </ul>
                        </li>

                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">

                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="{{ asset('dashboard_files/img/avatar.png') }}" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs">{{ auth()->user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">

                                {{-- <!-- User image --> --}}
                                <li class="user-header">
                                    <img src="{{ asset('dashboard_files/img/avatar.png') }}" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        {{ auth()->user()->name }}
                                        <small>{{ auth()->user()->created_at->toFormattedDateString() }}</small>
                                    </p>
                                </li>

                                {{-- <!-- Menu Footer--> --}}
                                <li class="user-footer">


                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">@lang('site.logout')</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

        </header>

        @include('layouts.dashboard._aside')

        @yield('content')

        @include('partials._session')

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.1
            </div>
            <!-- <strong>Copyright &copy; 2014-2016 -->
            {{ 'copyright-' }}{{ date('Y-m-d') }}</strong>
            <!-- reserved. -->
        </footer>

    </div><!-- end of wrapper -->

    {{-- <!-- Bootstrap 3.3.7 --> --}}
    <script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>

    {{-- icheck --}}
    <script src="{{ asset('dashboard_files/plugins/icheck/icheck.min.js') }}"></script>

    {{-- <!-- FastClick --> --}}
    <script src="{{ asset('dashboard_files/js/fastclick.js') }}"></script>

    {{-- <!-- AdminLTE App --> --}}
    <script src="{{ asset('dashboard_files/js/adminlte.min.js') }}"></script>

    {{-- ckeditor standard --}}
    <script src="{{ asset('dashboard_files/plugins/ckeditor/ckeditor.js') }}"></script>

    {{-- jquery number --}}
    <script src="{{ asset('dashboard_files/js/jquery.number.min.js') }}"></script>

    {{-- print this --}}
    <script src="{{ asset('dashboard_files/js/printThis.js') }}"></script>

    {{-- morris --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="{{ asset('dashboard_files/plugins/morris/morris.min.js') }}"></script>

    {{-- custom js --}}
    <script src="{{ asset('dashboard_files/js/custom/image_preview.js') }}"></script>
    <script src="{{ asset('dashboard_files/js/custom/order.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{ asset('dashboard_files2/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <!-- jvectormap -->
    <script src="{{ asset('dashboard_files2/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ asset('dashboard_files2/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="{{ asset('dashboard_files2/plugins/chartjs/Chart.min.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{ asset('dashboard_files2/dist/js/pages/dashboard2.js') }}"></script>


    <script>
        $(document).ready(function() {

            $('.sidebar-menu').tree();

            //icheck
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });

            //delete
            $('.delete').click(function(e) {

                var that = $(this)

                e.preventDefault();

                var n = new Noty({
                    text: "@lang('site.confirm_delete')",
                    type: "warning",
                    killer: true,
                    buttons: [
                        Noty.button("@lang('site.yes')", 'btn btn-success mr-2', function() {
                            that.closest('form').submit();
                        }),

                        Noty.button("@lang('site.no')", 'btn btn-primary mr-2', function() {
                            n.close();
                        })
                    ]
                });

                n.show();

            }); //end of delete

            CKEDITOR.config.language = "{{ app()->getLocale() }}";

        }); //end of ready


        // // image preview
        $(".image").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });
    </script>

    @yield('scripts')
    @stack('scripts')
</body>

</html>
