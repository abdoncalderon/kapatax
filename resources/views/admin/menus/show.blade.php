@extends('layouts.main')

@section('title', __('content.menus'))

@section('section', __('content.menus'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('menus.index')}}"> {{ __('content.menus') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $menu->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- Father  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.father') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $menu->menu->code ?? '' }}">
                            </div>
                        </div>

                        {{-- Code  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $menu->code }}">
                            </div>
                        </div>

                        {{-- showName  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.showName') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $menu->showName }}">
                            </div>
                        </div>

                        {{-- route  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.route') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $menu->route }}">
                            </div>
                        </div>
                        
                        {{-- icon  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.icon') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $menu->icon }}">
                            </div>
                        </div>

                        {{-- Status  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.status') }}</label>
                            <div class="col-sm-10">
                                @IF($menu->isActive())
                                    <input disabled class="form-control" value="{{ __('content.active') }}">
                                @ELSE
                                    <input disabled class="form-control" value="{{ __('content.inactive') }}">
                                @ENDIF
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('menus.edit', $menu) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('menus.index') }} ">{{ __('messages.returnToList') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection