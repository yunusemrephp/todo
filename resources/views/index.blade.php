@extends('layouts.app')

@section('content')

    <div class="container">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-3">
                                    <h5 class="text-primary"> {{ __('Welcome, '). Auth::user()->name }}</h5>
                                    <p>{{ __('Dashboard') }}</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="{{asset('images/profile-img.png')}}" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light text-black-50">
                                        {{ Str::limit(Auth::user()->name, config('todo.profile_str_limit'), $end = '') }}
                                    </span>
                                </div>
                                <h5 class="font-size-15 text-truncate">{{Auth::user()->name }}</h5>
                                <p class="text-muted mb-0 text-truncate">{{Auth::user()->email }}</p>
                            </div>

                            <div class="col-sm-8">
                                <div class="pt-4">

                                    <div class="row">
                                        <div class="col-6">
                                            <h5 class="font-size-15">{{ $countArr->finishCount }}</h5>
                                            <p class="text-muted mb-0">Finished Todo</p>
                                            <p class="text-muted mb-0"><a href="{{ route('finished') }}">See <i class="mdi mdi-arrow-right ml-1"></i></a></p>
                                        </div>
                                        <div class="col-6">
                                            <h5 class="font-size-15">{{ $countArr->unfinishCount }}</h5>
                                            <p class="text-muted mb-0">Unfinished Todo</p>
                                            <p class="text-muted mb-0"><a href="{{ route('unfinished') }}">See <i class="mdi mdi-arrow-right ml-1"></i></a></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mt-4">
                                                <a href="{{ route('todo-list') }}" class="btn btn-primary waves-effect waves-light btn-sm">All Todo List <i class="mdi mdi-arrow-right ml-1"></i></a>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mt-4">
                                                <a href="{{ route('profile') }}" class="btn btn-primary waves-effect waves-light btn-sm">Profile <i class="mdi mdi-account ml-1"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
