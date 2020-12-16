@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <div class="avatar-sm mx-auto mb-4">
                <span class="avatar-title rounded-circle bg-soft-primary text-primary font-size-16">
                    {{ Str::limit($profileData->name, config('todo.profile_str_limit'), $end = '') }}
                </span>
                    </div>
                    <h5 class="font-size-15"><a href="#" class="text-dark">{{ $profileData->name }}</a></h5>
                    <p class="text-muted">{{ $profileData->email }}</p>

                    <div>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-3">
                                @foreach (Auth::user()->Roles as $roles)
                                    <span class="badge badge-primary">
                                        {{ $roles->name }}
                                    </span>
                                @endforeach
                            </li>
                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Due Date">
                                <i class="bx bx-calendar mr-1"></i> {{ $profileData->created_at }}
                            </li>
                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Comments">
                                <i class="bx bx-comment-dots mr-1"></i> {{ $profileData->updated_at }}
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-footer bg-transparent border-top">
                    <div class="contact-links d-flex font-size-20">
                        <div class="flex-fill">
                            <a href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Projects"><i class="mdi mdi-eraser"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href="{{ route('todo-list') }}" data-toggle="tooltip" data-placement="top" title="" data-original-title="Projects"><i class="mdi mdi-view-list"></i></a>
                        </div>
                        <div class="flex-fill">
                            <a href="" data-toggle="tooltip" data-placement="top" title="" data-original-title="Profile"><i class="bx bx-user-circle"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
