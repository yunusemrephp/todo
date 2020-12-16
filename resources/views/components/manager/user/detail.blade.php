<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Personal Information</h4>
            <div class="table-responsive">
                <table class="table table-nowrap mb-0">
                    <tbody>
                    <tr>
                        <th scope="row">Full Name :</th>
                        <td>{{ $userData->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">E-Mail :</th>
                        <td>{{ $userData->email }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created At :</th>
                        <td>{{ $userData->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Roles :</th>
                        @foreach (Auth::user()->Roles as $roles)
                            <td>{{ $roles->name }}</td>
                        @endforeach
                    </tr>
                    <tr>
                        <th scope="row">Permissions :</th>
                        @foreach (Auth::user()->Permissions as $permissions)
                            <td><i class="fas fa-check"></i> {{ $permissions->name }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <h4 class="card-title mb-3">Enrolled Todos</h4>
</div>
@if($todoData)
    @foreach ($todoData as $todoDetail)
        <div class="col-xl-4 col-sm-6">
            <x-card :cardData="$todoDetail" class="card"/>
        </div>
    @endforeach
@else
    <div class="col-md-12">
        <x-message :message="$message" class="card"/>
    </div>
@endif



