@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.profile'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        {{-- <li><a href="{{ route('profiles.show')}}"> {{ __('content.profile') }} </a></li> --}}
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

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

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="col-sm-10" >
                                    <input id="name" disabled type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            {{-- username --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="col-sm-10" >
                                    <input id="user" disabled type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user', $user->user) }}" required autocomplete="user">
                                    @error('user')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- email --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="col-sm-10" >
                                    <input id="email" disabled type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- role --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                <div class="col-sm-10" >
                                    <input id="role" disabled type="text" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role', $user->role) }}">
                                </div>
                            </div> --}}
                            
                            {{-- avatar --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.avatar') }}</label>
                                <div class="col-sm-10">
                                    <input id="avatar" type="file" class="form-control" name="avatar"}}>
                                </div>
                            </div>

                            {{-- status --}}
                        
                            <!-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                                <div class="col-sm-10">
                                    <select name="status" disabled class="form-control" data-placeholder="Estado" style="width: 100%;" value="{{ old('status', $user->status) }}">
                                        <option value="0"
                                            @if($user->status==0):
                                                selected="selected"
                                            @endif
                                            >{{ __('content.inactive') }}</option>
                                        <option value="1"
                                            @if($user->status==1):
                                                selected="selected"
                                            @endif
                                            >{{ __('content.active') }}</option>
                                    </select>
                                </div>
                            </div> -->

                            {{-- State  --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                                <div class="col-sm-10">
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
                                <img src="../../images/admin/avatars/{{ old('avatar', $user->avatar) }}" class="img-circle" width="150" height="150" style="display: block; margin: auto;">
                            </div>
                        </div>
                        
                    </div>

                    {{-- Submit --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('home') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection