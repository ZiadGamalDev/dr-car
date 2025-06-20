@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header content-header{{ 1 }}">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-bold">{{ trans('lang.setting') }}<small
                            class="mx-3">|</small><small>{{ trans('lang.setting_desc') }}</small></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb bg-white float-sm-right rounded-pill px-4 py-2 d-none d-md-flex">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}"><i class="fas fa-tachometer-alt"></i>
                                {{ trans('lang.dashboard') }}</a></li>
                        <li class="breadcrumb-item active">@yield('settings_title')</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="clearfix"></div>
        {{-- @include('flash::message') --}}
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-3">
                @include('layouts.settings.menu')
            </div>
            <div class="col-md-9">
                @yield('settings_content')
            </div>
        </div>
    </div>
@endsection
