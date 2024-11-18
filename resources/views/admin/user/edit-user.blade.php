@extends('admin.dashboard.index')
@section('contents')
    <div class="row">
        <div class="col-md-12 ">
            <form method="" action="">
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-8 card_title_part">
                                <i class="fab fa-gg-circle"></i>Update User Information
                            </div>
                            <div class="col-md-4 card_button_part">
                                <a href="{{url('dashboard/user')}}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Name<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Email<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control form_control" id="" name="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Username<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Password<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control form_control" id="" name="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control form_control" id="" name="">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">User Role<span
                                    class="req_star">*</span>:</label>
                            <div class="col-sm-4">
                                <select class="form-control form_control" id="" name="">
                                    <option>Select Role</option>
                                    <option value="">Superadmin</option>
                                    <option value="">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                            <div class="col-sm-4">
                                <input type="file" class="form-control form_control" id="" name="">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
