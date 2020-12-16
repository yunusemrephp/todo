@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-manager.main :type="$type" :managerData="$managerData" :title="$title"/>
    </div>
@endsection
