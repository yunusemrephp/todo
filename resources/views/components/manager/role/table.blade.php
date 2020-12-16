<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <div class="text-sm-right">
                        <a href="">
                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" style="background: #224686; border: none;"><i class="mdi mdi-plus mr-1"></i> New Role</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0" style="font-size:.8125rem;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->created_at }}</td>
                            <td>{{ $data->updated_at }}</td>
                            <td>
                                <a href="{{ route('role.detail', $data->id) }}" class="btn btn-success btn-sm" style="background: #7f8387;border: none;">Details</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
