@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-TodoList :type="$type" :todoData="$todoData" :title="$title"/>
    </div>
@endsection


