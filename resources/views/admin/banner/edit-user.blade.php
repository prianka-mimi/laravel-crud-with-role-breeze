@extends('admin.dashboard.index')
@section('contents')
    <div class="row">
        <div class="col-md-12 ">
            <form method="post" action="{{ url('dashboard/banner/update') }}" enctype="multipart/form-data">
                @csrf
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 card_title_part">
                                <i class="fab fa-gg-circle"></i>Update Banner Information
                            </div>
                            <div class="col-md-4 card_button_part">
                                <a href="{{ url('dashboard/banner') }}" class="btn btn-sm btn-dark"><i
                                        class="fas fa-th"></i>All Banner</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body bannerError">

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

                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Title<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">

                                <input type="hidden" name="id" value="{{$data->ban_id}}">
                                <input type="hidden" name="slug" value="{{$data->ban_slug}}">

                                <input type="text" class="form-control form_control" id="" name="title"
                                    value="{{ $data->ban_title }}">

                                @error('title')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Subtitle<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="subtitle"
                                    value="{{ $data->ban_subtitle }}">

                                @error('subtitle')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Button<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="button"
                                    value="{{ $data->ban_button }}">

                                @error('button')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Button URL:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="url"
                                    value="{{ $data->ban_url }}">

                                @error('url')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Banner Image<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control form_control" id="" name="pic">

                                @error('pic')
                                    <div class="error">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-sm-2">
                                @if ($data->ban_image != '')
                                    <img height="50" style="max-width: 120px;" src="{{ asset('uploaded_images/banners/' . $data->ban_image) }}"
                                        alt="Banners">
                                @else
                                    <img height="50" style="max-width: 120px;"
                                        src="{{ asset('Contents_main/admin/images/avatar.png' . $data->ban_image) }}"
                                        alt="Banners">
                                @endif
                            </div>

                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-sm btn-dark">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
