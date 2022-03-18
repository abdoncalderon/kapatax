@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('users.index')}}"> {{ __('content.users') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $user->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- Name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $user->name }}">
                                </div>
                            </div>

                            {{-- User  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $user->user }}">
                                </div>
                            </div>

                            {{-- Email  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $user->email }}">
                                </div>
                            </div>

                            {{-- Status  --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.status') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    @IF($user->isActive())
                                        <input disabled class="form-control" value="{{ __('content.active') }}">
                                    @ELSE
                                        <input disabled class="form-control" value="{{ __('content.inactive') }}">
                                    @ENDIF
                                </div>
                            </div>

                        </div>

                        {{-- Avatar --}}

                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div>
                            <img src="{{ asset('images/admin/users/avatars/'.old('avatar', $user->avatar))  }}" class="img-circle" width="150" height="150" style="display: block; margin: auto;">
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href="{{ route('users.edit', $user) }}">{{ __('content.edit') }}</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('users.index') }}">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>
    
@endsection