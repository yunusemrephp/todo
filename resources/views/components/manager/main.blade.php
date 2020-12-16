@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-title title="{!! $title !!}"/>
        <div class="row">
            @if($type == 'dashboard')
                @foreach ($managerData as $data)
                    <x-manager.dashboardCard :cardData="$data"/>
                @endforeach
            @elseif($type == 'user')
                <x-manager.user.table :tableData="$managerData"/>
            @elseif($type == 'userDetail')
                <x-manager.user.detail :userData="$managerData" class="card"/>
            @elseif($type == 'role')
                <x-manager.role.table :tableData="$managerData"/>
            @endif
        </div>
        @if(Session::get('success'))
            <x-alert message="{!! Session::get('success') !!}"/>
        @endif
    </div>
@endsection


