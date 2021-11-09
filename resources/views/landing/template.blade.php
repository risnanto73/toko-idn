<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.87.0">
    <title>{{$title ?? 'Page'}}</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/carousel/">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==')}}" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link rel="stylesheet" href="{{asset('landing/frontend/fontawesome-free-5.15.4-web/css/all.css')}}">


    <!-- Bootstrap core CSS -->
    <link href="{{asset('landing/frontend/css/bootstrap.min.css')}}" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('landing/frontend/custom/custom.css')}}">

</head>

<style>
    .anchor{
        color: black;
    }
    .anchor:hover{
        color: black;
    }
</style>

<body>

    @include('landing.includes.navbar')

    <main>
        @yield('isi')
    </main>
    
    
    @include('landing.includes.footer')

    <script src="{{asset('landing/frontend/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>