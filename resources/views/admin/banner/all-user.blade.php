@extends('admin.dashboard.index')
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>All Banner Information
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{ url('dashboard/banner/add') }}" class="btn btn-sm btn-dark"><i
                                    class="fas fa-plus-circle"></i>Add Banner</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">

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

                    <table class="table table-bordered table-striped table-hover custom_table">
                        <thead class="table-dark">
                            <tr>
                                <th>Title</th>
                                <th>Subtitle</th>
                                <th>Button</th>
                                <th>Banner</th>
                                <th>Manage</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($allUser as $data)
                                <tr>
                                    <td>{{ $data->ban_title }}</td>
                                    <td>{{ $data->ban_subtitle }}</td>
                                    <td>{{ $data->ban_button }}</td>
                                    <td>
                                        @if ($data->ban_image != '')
                                            <img height="40"
                                                src="{{ asset('uploaded_images/banners/' . $data->ban_image) }}"
                                                alt="Banners">
                                        @else
                                            <img height="40"
                                                src="{{ asset('Contents_main/admin/images/avatar.png' . $data->ban_image) }}"
                                                alt="Banners">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group btn_group_manage" role="group">
                                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item"
                                                        href="{{ url('dashboard/banner/view/' . $data->ban_slug) }}">View</a>
                                                </li>
                                                <li><a class="dropdown-item"
                                                        href="{{ url('dashboard/banner/edit/' . $data->ban_slug) }}">Edit</a>
                                                </li>
                                                <li><a class="dropdown-item" href="#" id="softDelete"
                                                        data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="{{$data->ban_id}}">Delete</a></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
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

    <!-- Delete Modal part start -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <form method="post" action="{{url('dashboard/banner/softdelete')}}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Confirm Message</h5>
                    </div>
                    <div class="modal-body modal_body">
                        <input type="hidden" id="modal_id" name="modal_id"/>
                        Are you sure want to delete this data item?
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Confirm</button>
                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>

        </div>
    </div>
    <!-- Delete Modal part end -->
@endsection
