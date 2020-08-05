
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

{{-- <link rel="icon" href="{!! asset('logo/si2.ico') !!}"/> --}}

<link rel="icon" href="{{ asset('logo/si2.ico') }}"/>

<title>ADMIN | Sistem Rekomendasi Otomatis Bagi Pencari Kerja Pada Lowongan Pekerjaan Berbasis Website</title>
<!-- Icons-->
<link href="{{ asset('node_modules/@coreui/coreui/dist/css/coreui.min.css') }}" rel="stylesheet">
<link href="{{ asset('node_modules/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
<link href="{{ asset('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('node_modules/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" />

<link href="{{ asset('coreui/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('node_modules/pace-progress/css/pace.min.css') }}" rel="stylesheet">
<script>
    (function(i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o), m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-118965717-1', 'auto');
    ga('send', 'pageview');
  </script>
</head>
<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <div id="app">
        @include('admin.layout.header')
        <div class="app-body">
            @include('admin.layout.sidebar')
            <main class="main">
                <div class="container-fluid">
                    <div class="animated fadeIn">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>   
    </div>
    @include('admin.layout.footer')

    <!-- Bootstrap and necessary plugins-->
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('node_modules/pace/pace.js') }}"></script>
    <script src="{{ asset('node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('node_modules/@coreui/coreui/dist/js/coreui.min.js') }}"></script>
    <script>
        $('#ui-view').ajaxLoad();
        $(document).ajaxComplete(function() {
          Pace.restart()
        });

        function myFunction() {
            document.getElementById("myForm").reset();
        }

        function showDiv(divId, element){
            document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
        }
    </script>
</body>
</html>