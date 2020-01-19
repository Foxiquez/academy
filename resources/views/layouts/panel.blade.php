<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ trans('panel.title') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('css/material-dashboard.css?v=2.1.1') }}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
</head>

<body>
    <div class="wrapper ">
        @include('partials.panel_menu')
        @if(View::hasSection('content'))
            <div class="main-panel">
                <!-- Navbar -->
                @include('partials.panel_navbar')
                <!-- End Navbar -->
                <div class="content">
                    @yield('content')
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="copyright float-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> by <a href="vk.com/godword303">Foxiquez</a>
                        </div>
                    </div>
                </footer>
            </div>
        @elseif(View::hasSection('context'))
            <div class="main-panel">
            @yield('context')
            </div>d
        @endif
    </div>
    <script src="{{ asset('js/core/jquery.min.js') }}"></script>
    @include('partials.include.main_scripts')
    @stack('form_scripts')
</body>