<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PT. ROSAN PERMAI</title>
    <meta name="description" content="PT. ROSAN PERMAI">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="{{ asset('css/normalize.min.cs') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}"
          integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
          <link rel="stylesheet" href="{{ asset('css/themify-icons.css') }}">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css"> --}}
    <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{asset('css/assets/css/cs-skin-elastic.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/css/lib/datatable/dataTables.bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/assets/css/datepicker.css')}}">

</head>

<body>
<!-- Left Panel -->
@if(Route::currentRouteName() != 'perbaikan' && Route::currentRouteName() != 'perbaiki.sekarang' && Route::currentRouteName() != 'permintaan.edit')
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <li class="@if(Route::currentRouteName() == 'perbaikan') active @endif">
                        <a href="{{ route('perbaikan') }}"><i class="menu-icon fa fa-wrench"></i>Perbaikan Baru</a>
                    </li>
                    <li class="@if(Route::currentRouteName() == 'permintaan.index') active @endif">
                        <a href="{{ route('permintaan.index') }}"><i class="menu-icon fa fa-database"></i>Data Perbaikan </a>
                    </li>
                    <li>
                        <hr>
                    </li>
                    <li class="@if(Route::currentRouteName() == 'kendaraan.index') active @endif">
                        <a href="{{ route('kendaraan.index')}}"><i class="menu-icon fa fa-truck"></i>Data Kendaraan</a>
                    </li>
                    <li class="@if(Route::currentRouteName() == 'alatberat.index') active @endif">
                        <a href="{{ route('alatberat.index')}}"><i class="menu-icon fa fa-truck-loading"></i>Data
                            Alat Berat</a>
                    </li>
                    <li class="@if(Route::currentRouteName() == 'onderdil.index') active @endif">
                        <a href="{{ route('onderdil.index')}}"><i class="menu-icon fa fa-tools"></i>Data
                            Onderdil</a>
                    </li>
                    <li class="@if(Route::currentRouteName() == 'user.index') active @endif">
                        <a href="{{ route('user.index')}}"><i class="menu-icon fa fa-user"></i>Data User</a>
                    </li>

                    <li class="#">
                        <a href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <i class="menu-icon ti-close"></i>{{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
@endif
<!-- /#left-panel -->

<!-- Right Panel -->
<div id="right-panel" class="right-panel">
    <!-- Header-->
    <header id="header" class="header">
        <div class="top-left">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ route('permintaan.index')}}"><img src="{{asset('images/logo1.jpg')}}"
                                                                            alt="Logo"></a>
                <a class="navbar-brand hidden" href="{{ route('permintaan.index')}}"><img src="{{asset('images/logo1.jpg')}}"
                                                                                   alt="Logo"></a>
                @if(Route::currentRouteName() != 'perbaikan' && Route::currentRouteName() != 'perbaiki.sekarang' && Route::currentRouteName() != 'permintaan.edit')
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                @endif
            </div>
        </div>
        <div class="top-right">
            <div class="header-menu">
                <div class="header-left">
                    <div class="float-right">
                        <h4 style="padding-top: 13px; color: grey"> {{ Auth::user()->nama }} </h4>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /#header -->

@yield('content')

<!-- Footer -->
    <footer class="site-footer">
        <div class="footer-inner bg-white">
            <div class="row">
                <div class="col-sm-6">
                    Copyright &copy; 2019
                </div>
                <div class="col-sm-6 text-right">
                    Designed by <a href="https://colorlib.com">Colorlib</a>
                    <br>
                    Edited by Diaz A.A.
                </div>
            </div>
        </div>
    </footer>
    <!-- /.site-footer -->
</div>
<!-- /#right-panel -->

<!-- Scripts -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.matchHeight.min.js') }}"></script>
<script src="{{ asset('js/js/main.js')}}"></script>

<script src="{{ asset('js/js/lib/data-table/datatables.min.js')}}"></script>
<script src="{{ asset('js/js/lib/data-table/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/js/lib/data-table/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('js/js/lib/data-table/buttons.bootstrap.min.js')}}"></script>
<script src="{{ asset('js/js/lib/data-table/jszip.min.js')}}"></script>
<script src="{{ asset('js/js/lib/data-table/vfs_fonts.js')}}"></script>
<script src="{{ asset('js/js/lib/data-table/buttons.html5.min.js')}}"></script>
<script src="{{ asset('js/js/lib/data-table/buttons.print.min.js')}}"></script>
<script src="{{ asset('js/js/lib/data-table/buttons.colVis.min.js')}}"></script>
<script src="{{ asset('js/js/init/datatables-init.js')}}"></script>
<script src="{{ asset('js/js/bootstrap-datepicker.js') }}"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
</script>
<script>
    $('.tanggal').datepicker({
        format: 'yyyy-mm-dd',
        todayHighlight: true,
        todayBtn: true,
    });

    $('.bulan').datepicker({
        format: 'yyyy-mm',
        todayHighlight: true,
        todayBtn: true,
    });

</script>
@stack('js')
</body>
</html>