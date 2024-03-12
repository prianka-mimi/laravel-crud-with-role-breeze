@extends('admin.dashboard.index')
@section('contents')
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>View Banner Information
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{ url('dashboard/banner/edit/' . $data->ban_slug) }}" class="btn btn-sm btn-dark mx-2"><i class="fas fa-pen"></i>Edit</a>
                            <a href="{{url('dashboard/banner')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Banner</a>
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

                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <table class="table table-bordered table-striped table-hover custom_view_table">
                                <tr>
                                    <td>Banner Title</td>
                                    <td>:</td>
                                    <td>{{$data->ban_title}}</td>
                                </tr>
                                <tr>
                                    <td>Banner Subtitle</td>
                                    <td>:</td>
                                    <td>{{$data->ban_subtitle}}</td>
                                </tr>
                                <tr>
                                    <td>Banner Button</td>
                                    <td>:</td>
                                    <td>{{$data->ban_button}}</td>
                                </tr>
                                <tr>
                                    <td>Button URL</td>
                                    <td>:</td>
                                    <td>{{$data->ban_url}}</td>
                                </tr>
                                <tr>
                                    <td>Photo</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->ban_image!='')
                                        <img height="100" src="{{asset('uploaded_images/banners/'.$data->ban_image)}}" alt="Banners">
                                        @else
                                        <img height="100" src="{{asset('Contents_main/admin/images/avatar.png'.$data->ban_image)}}" alt="Banners">
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <td>Creator</td>
                                    <td>:</td>
                                    <td>{{$data->creatorInfo->name}}</td>
                                </tr>
                                <tr>
                                    <td>Editor</td>
                                    <td>:</td>
                                    <td>
                                        @if ($data->ban_editor!='')
                                        {{$data->editorInfo->name}}
                                        @else
                                        -N/A-
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
                                    <td>{{$data->created_at->format('d-M-y | D | h:i:s A')}}</td>
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
