@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('users.index')}}"> {{ __('content.users') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
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
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- name --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="col-sm-10" >
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                                    <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user">
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- contractor --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.contractor') }}</label>
                                <div class="col-sm-10" >
                                    <select name="contractor_id" class="form-control" style="width: 100%;">
                                        @foreach ($contractors as $contractor)
                                            <option value="{{ $contractor->id }}">{{ $contractor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            {{-- role --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                <div class="col-sm-10" >
                                    <select name="role_id" class="form-control" style="width: 100%;">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
    
                            {{-- password --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.password') }}</label>
                                <div class="col-sm-10" >
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            {{-- confirm password --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.confirmpassword') }}</label>
                                <div class="col-sm-10" >
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                        </div>

                        {{-- Avatar --}}

                        <div class="col-sm-2 col-md-2 col-lg-2">
                            <div>
                                <img src="../../images/users/avatar.jpg" class="img-circle" width="150" height="150" style="display: block; margin: auto;">
                            </div>
                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('users.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>
        


    </section>

@endsection