<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title mb-4">Role Information</h4>
            <div class="table-responsive">
                <table class="table table-nowrap mb-0">
                    <tbody>
                    <tr>
                        <th scope="row">Role Name :</th>
                        <td>{{ $roleData->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created At :</th>
                        <td>{{ $roleData->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Updated At :</th>
                        <td>{{ $roleData->updated_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Permissions :</th>
                        @foreach ($permissionData as $permission)
                            <td>{{ $permission->name }}</td>
                        @endforeach
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



