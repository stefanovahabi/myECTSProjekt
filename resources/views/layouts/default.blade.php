<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    @include('includes.head')
    @yield('css')
</head>
<body onload="init()" onunload="StopClock()">
<div class="container">

    @include('includes.header')

    <main>

        @yield('content')

    </main>

    @include('includes.footer')

</div>
</body>
</html>