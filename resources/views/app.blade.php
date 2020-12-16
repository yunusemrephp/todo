<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet">
</head>
<x-header/>
<body data-topbar="white" data-layout="horizontal">
<div class="main-content">
    <div class="page-content">
        @inertia
    </div>
</div>
</body>
<script src="{{ mix('/js/app.js') }}" defer></script>
<script src="{{ asset('libs/jquery/jquery.min.js') }}" defer></script>
<script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}" defer></script>
</html>
