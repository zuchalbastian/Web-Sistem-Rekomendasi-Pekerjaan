
<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
<meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
<meta name="author" content="Łukasz Holeczek">
<meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">

<link rel="icon" href="{{ asset('logo/si2.ico') }}"/>

<title>Sistem Rekomendasi Otomatis Bagi Pencari Kerja Pada Lowongan Pekerjaan Berbasis Website</title>
<!-- Icons-->
<link href="{{ asset('node_modules/@coreui/coreui/dist/css/coreui.min.css') }}" rel="stylesheet">
<link href="{{ asset('node_modules/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
<link href="{{ asset('node_modules/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
<link href="{{ asset('node_modules/simple-line-icons/css/simple-line-icons.css') }}" rel="stylesheet" />
<!-- Star Rating-->
<link rel="stylesheet" type="text/css" href="{{ url('starRating/css/star-rating-svg.css') }}">

<link href="{{ asset('coreui/css/style.css') }}" rel="stylesheet">
<link href="{{ asset('node_modules/pace-progress/css/pace.min.css') }}" rel="stylesheet">
<style>
    #hidden_div {
      display: none;
    }
    .table-bordered td {
          border: 0px solid black;
    }
    table:hover td.pointer{
    visibility:visible;
        top:-5px;
        left:10px;
        position:inherit;
    } 

    table td.pointer{
    color:red;
    visibility:hidden;
    font-size:10px;
    overflow:hidden;
        position:absolute;
        top:-10px;
    }
</style>
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
<body class="app header-fixed sidebar-hidden aside-menu-fixed sidebar-lg-show">
    <div id="app">
        @include('layouts3.header2')
        <div class="app-body">
            <main class="main">
                <div class="container-fluid">
                    <div class="animated fadeIn">
                        @yield('content')
                    </div>
                </div>
            </main>
        </div>   
    </div>
    @include('layouts3.footer')

    {{-- Success Alert --}}
    @if(session('status'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('status')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- Error Alert --}}
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('error')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Bootstrap and necessary plugins-->
    <script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('node_modules/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('node_modules/pace/pace.js') }}"></script>
    <script src="{{ asset('node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('node_modules/@coreui/coreui/dist/js/coreui.min.js') }}"></script>
    <!-- Star Rating-->
    <script src="{{ url('starRating/jquery.star-rating-svg.js') }}"></script>
    <script>
        $('#ui-view').ajaxLoad();
        $(document).ajaxComplete(function() {
          Pace.restart()
        });

        function myFunction() {
            document.getElementById("myForm").reset();
        }

        function showDiv(divId, element){
            document.getElementById(divId).style.display = (element.value==3 || element.value==4 || element.value==5 || element.value==6 || element.value==7) ? 'inline-block' : 'none';
        } 

        $(function(){
        $(".my-rating").starRating({
            starSize: 25,
            disableAfterRate: false,
            callback: function(currentRating, $el){
                alert('rated ' + currentRating);
                console.log('DOM element ', $el);
                $('input[name=rating]').val(currentRating)
                }  
            });
        });

        $(function(){
            $(".my-rating2").starRating({
                starSize: 25,
                disableAfterRate: false,
                readOnly: true,
                callback: function(currentRating, $el){
                    alert('rated ' + currentRating);
                    console.log('DOM element ', $el);
                }  
            });
        });

        //close the alert after 3 seconds.
        $(document).ready(function(){
            setTimeout(function() {
                $(".alert").alert('close');
            }, 3000);
    	});
    </script>
</body>
</html>