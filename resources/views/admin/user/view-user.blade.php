@extends('admin.dashboard.index')
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>View User Information
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{ url('dashboard/user/edit') }}" class="btn btn-sm btn-dark mx-2"><i class="fas fa-pen"></i>Edit</a>
                            <a href="{{url('dashboard/user')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">

                        <div class="row text-center">
                            <div class="col-md-3"></div>
                            <div class="col-md-7">

                                @if (Session::has('success'))
                                    <div class="alert alert-success">
                                        <strong>Success ! </strong>{{ Session::get('success') }}
                                    </div>
                                @endif

                                @if (Session::has('error'))
                                    <div class="alert alert-danger">
                                        <strong>Opps ! </strong>{{ Session::get('error') }}
                                    </div>
                                @endif

                            </div>
                            <div class="col-md-2"></div>
                        </div>

                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped table-hover custom_view_table">
                                <tr>
                                    <td>Name</td>
                                    <td>:</td>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <td>Phone</td>
                                    <td>:</td>
                                    <td>{{$data->phone}}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td>{{$data->username}}</td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>:</td>
                                    <td>{{$data->roleInfo->role_name}}</td>
                                </tr>
                                <tr>
                                    <td>Photo</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->photo!='')
                                        <img height="100" src="{{asset('uploaded_images/users/'.$data->photo)}}" alt="Users">
                                        @else
                                        <img height="100" src="{{asset('Contents_main/admin/images/avatar.png'.$data->ban_image)}}" alt="Users">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Edit Time</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->updated_at!='')
                                        {{$data->updated_at->format('d-M-y | D | h:i:s A')}}
                                        @else
                                        -N/A-
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Upload Time</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->created_at!='')
                                        {{$data->created_at->format('d-M-y | D | h:i:s A')}}
                                        @else
                                        -N/A-
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-2"></div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="btn-group" role="group" aria-label="Button group">
                        <button type="button" class="btn btn-sm btn-dark">Print</button>
                        <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                        <button type="button" class="btn btn-sm btn-dark">Excel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
