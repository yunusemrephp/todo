<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<x-head/>
<body data-topbar="white" data-layout="horizontal">
<x-header/>
<div class="main-content">
    <div class="page-content">
        @yield('content')
    </div>
</div>
<x-footer/>
</body>
</html>
