@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.profile'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        {{-- <li><a href="{{ route('profiles.show')}}"> {{ __('content.profile') }} </a></li> --}}
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Error Messages --}}

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $user->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('profiles.update', $user) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" disabled class="form-control" name="name" value="{{ old('name', $user->name) }}">
                                </div>
                            </div>
                            
                            {{-- username --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="user" disabled class="form-control" name="user" value="{{ old('user', $user->user) }}">
                                </div>
                            </div>

                            {{-- email --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="email" disabled class="form-control" name="email" value="{{ old('email', $user->email) }}">
                                </div>
                            </div>

                            {{-- Role  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ current_user()->role->name }}">
                                </div>
                            </div>

                            {{-- Project --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.project') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ current_user()->project->name }}">
                                </div>
                            </div>

                            {{-- Subsidiary --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.subsidiary') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ current_user()->project->subsidiary->name }}">
                                </div>
                            </div>

                            {{-- avatar --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.avatar') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="avatar" type="file" class="form-control" name="avatar"}}>
                                </div>
                            </div>

                            {{-- signature --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.signature') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="signature" type="file" class="form-control" name="signature"}}>
                                </div>
                            </div>

                        </div>

                        {{-- Avatar --}}

                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div>
                                <img src="../../images/admin/avatars/{{ old('avatar', $user->avatar) }}" class="img-circle" width="150" height="150" style="display: block; margin: auto;">
                            </div>
                        </div>

                        {{-- Signature --}}

                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div>
                                <img src="../../images/admin/signatures/{{ old('signature', $user->signature) }}" class="img-circle" width="150" height="150" style="display: block; margin: auto;">
                            </div>
                        </div>
                        
                    </div>

                    {{-- Submit --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('home') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection