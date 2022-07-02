@extends('layouts.main')

@section('title', __('content.menus'))

@section('section',__('content.menus'))

@section('level',__('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('menus.index') }}"> {{ __('content.menus') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $menu->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('menus.update', $menu) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-11 col-md-11 col-lg-11">
                        </div>

                        {{-- father --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Menu {{ __('content.father') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <select name="menu_id" class="form-control" style="width: 100%;">
                                    <option value=""></option>
                                    @foreach ($fathers as $father)
                                        <option value="{{ $father->id }}"
                                            @if($father->id==$menu->menu_id)
                                                selected="selected"
                                            @endif
                                        >{{ $father->code }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        {{-- code --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="code" type="text" class="form-control" name="code" value="{{ $menu->code }}">
                                
                            </div>
                        </div>

                        {{-- showName --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.showName') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="showName" type="text" class="form-control" name="showName" value="{{ old('showName', $menu->showName) }}" placeholder="{{ __('messages.showName') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- route --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.route') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="route" type="text" class="form-control" name="route" value="{{ old('route', $menu->route) }}" placeholder="{{ __('content.route') }}">
                                @error('route')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- Fa Icon --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.icon') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="icon" type="text" class="form-control" name="icon" value="{{ old('icon', $menu->icon) }}" placeholder="Fa {{ __('content.icon') }}">
                                @error('icon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- status --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.status') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <select name="isActive" class="form-control" data-placeholder="{{ __('content.status') }}" style="width: 100%;" value="{{ old('status', $menu->status) }}">
                                    <option value="0"
                                        @if(!$menu->isActive()):
                                            selected="selected"
                                        @endif
                                        >{{ __('content.inactive') }}</option>
                                    <option value="1"
                                        @if($menu->isActive()):
                                            selected="selected"
                                        @endif
                                        >{{ __('content.active') }}</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    {{-- Submit --}}
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('menus.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection