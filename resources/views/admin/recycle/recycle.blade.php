@extends('admin.dashboard.index')
@section('contents')

{{-- user part start --}}
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>All Recycle User Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{ url('dashboard/recycle/user') }}" class="btn btn-sm btn-dark"><i
                                class="fas fa-th"></i>All Recycle User</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
{{-- user part end --}}

{{-- banner part start --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-8 card_title_part">
                            <i class="fab fa-gg-circle"></i>All Recycle Banner Information
                        </div>
                        <div class="col-md-4 card_button_part">
                            <a href="{{ url('dashboard/recycle/banner') }}" class="btn btn-sm btn-dark"><i
                                    class="fas fa-th"></i>All Recycle Banner</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
{{-- banner part end --}}
@endsection
