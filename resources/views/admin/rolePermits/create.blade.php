@extends('layouts.main')

@section('title', __('content.roles'))

@section('section', __('content.roles'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('roles.index')}}"> {{ __('content.roles') }} </a></li>
        <li><a href="{{ route('rolePermits.index',$role)}}"> {{ __('content.permits') }} </a></li>
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

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add').' '.__('content.permit')  }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('rolePermits.store', $role) }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Role Id (hide) --}}

                        <div class="form-group">
                            <div class="col-sm-10">
                                <input id="role_id" type="hidden" class="form-control" name="role_id" value="{{ $role->id}}">
                            </div>
                        </div>

                        {{-- Role --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="role" type="text" class="form-control" name="role" value="{{ $role->name }}">

                            </div>
                        </div>

                        {{-- Permit --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.permit') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <select name="permit_id" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    @foreach ($availablesPermits as $permit)
                                        <option value="{{ $permit->id }}">{{ $permit->code }}</option>
                                    @endforeach
                                </select>
                                @error('permit_id')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        

                        

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('rolePermits.index',$role) }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

      

@endsection