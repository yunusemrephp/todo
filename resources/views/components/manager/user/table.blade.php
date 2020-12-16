<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-sm-8">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="search-box mr-2 mb-2 d-inline-block">
                                <div class="position-relative">
                                    <form action="{{ route('user.search') }}" method="POST" class="row">
                                        {{ csrf_field() }}
                                        <div class="col-md-8">
                                            <input type="text" class="form-control @error('search') is-invalid @enderror" id="search" name="search" value="{{ old('search') }}" required autofocus>
                                            <i class="bx bx-search-alt search-icon ml-3"></i>
                                            @error('search')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <span>
                                                <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" style="background: #224686; border: none;"><i class="mdi mdi-account-search mr-1"></i> Search</button>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <a href="{{ route('user') }}">
                                <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" style="background: #224686; border: none;"><i class="mdi mdi-eraser mr-1"></i> Clear</button>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="text-sm-right">
                        <a href="">
                            <button type="button" class="btn btn-success btn-rounded waves-effect waves-light mb-2 mr-2" style="background: #224686; border: none;"><i class="mdi mdi-plus mr-1"></i> New User</button>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table mb-0" style="font-size:.8125rem;">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>User Name</th>
                        <th>E-Mail</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tableData as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>
                                <a href="{{ route('user.detail', $data->id) }}" class="btn btn-success btn-sm" style="background: #7f8387;border: none;">See User</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
