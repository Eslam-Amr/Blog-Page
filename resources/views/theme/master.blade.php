<!DOCTYPE html>
<html lang="en">
@include('theme.partials.head')

<body>
    <!--================Header Menu Area =================-->
    @include('theme.partials.header')
    <!--================Header Menu Area =================-->

    @yield('content')
    @include('theme.partials.footer')
    @include('theme.partials.script')

</body>

</html>
