<!DOCTYPE html>
<html>
<head>
    @include('home.components.head')
</head>
<body>
<!-- header section strats -->
@include('home.components.header')
<!-- end header section -->

@yield('content')

<!-- footer start -->
@include('home.components.footer')
<!-- footer end -->
@include('home.components.script')
</body>
</html>
