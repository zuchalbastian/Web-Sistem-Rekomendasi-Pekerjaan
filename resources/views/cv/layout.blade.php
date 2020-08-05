<!DOCTYPE html>
<html>
<head>
    <title>Sistem Rekomendasi Otomatis Bagi Pencari Kerja Pada Lowongan Pekerjaan Berbasis Website</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <script src="https://kit.fontawesome.com/a076d05399.js"></script> --}}
    <link rel="stylesheet" type="text/css" href="{{ url('starRating/css/star-rating-svg.css') }}">
    <style>
        .table-bordered td {
          border: 0px solid black;
        }
    </style>
</head>
<body>
  
<div class="container">
    @yield('content')
</div>

<script src="{{ url('http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js') }}"></script>
<script src="{{ url('starRating/jquery.star-rating-svg.js') }}"></script>

<script>
    $(function(){
        $(".my-rating2").starRating({
            starSize: 25,
            disableAfterRate: false,
            readOnly: true,
            callback: function(currentRating, $el){
                console.log('DOM element ', $el);
            }  
        });
    });

</script>
</body>
</html>