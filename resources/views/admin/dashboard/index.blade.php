@extends('layouts.admin')
@section('contents')
    <div class="row">
        <div class="col-md-12 welcome_part">
            <p align="center"><span>Welcome </span> {{ Auth::User()->name }}</p>
        </div>
    </div>
@endsection
