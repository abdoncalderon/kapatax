@extends('layouts.main')

@section('title', __('content.menus'))

@section('section', __('content.menus'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('menus.index')}}"> {{ __('content.menus') }} </a></li>
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

                {{-- Title  --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }} {{ __('content.menu') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('menus.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- father --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Menu {{ __('content.father') }}</label>
                            <div class="col-sm-10" >
                                <select name="menu_id" class="form-control" style="width: 100%;">
                                    <option value=""></option>
                                    @foreach ($menus as $menu)
                                        <option value="{{ $menu->id }}">{{ $menu->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- code --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="col-sm-10" >
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code') }}" placeholder="{{ __('content.code') }}">
                                @error('code')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- showName --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.showName') }}</label>
                            <div class="col-sm-10" >
                                <input id="showName" type="text" class="form-control" name="showName" value="{{ old('showName') }}" placeholder="{{ __('messages.showName') }}">
                                @error('showName')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- route --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.route') }} (LARAVEL)</label>
                            <div class="col-sm-10" >
                                <input id="route" type="text" class="form-control" name="route" value="{{ old('route') }}" placeholder="{{ __('content.route') }}">
                                @error('route')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- fa icon --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.icon') }}</label>
                            <div class="col-sm-10" >
                                <input id="icon" type="text" class="form-control" name="icon" value="{{ old('icon') }}" placeholder="FA {{ __('content.icon') }}">
                                @error('icon')
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
                        <a class="btn btn-info btn-sm" href=" {{ route('menus.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection