@extends('layouts.main')

@section('title', __('content.projects'))

@section('section', __('content.projects'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projects.index')}}"> {{ __('content.projects') }} </a></li>
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
                    <h3 class="box-title"><strong>{{ __('content.add') }} {{ __('content.project') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('projects.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10" >
                                <input id="name" class="form-control" name="name" type="text" placeholder="{{ __('content.name') }}" >
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- code --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="col-sm-10" >
                                <input id="code" class="form-control" name="code" type="text" placeholder="{{ __('content.code') }}" >
                                @error('code')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- taxId --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.taxId') }}</label>
                            <div class="col-sm-10" >
                                <input id="taxId" class="form-control" name="taxId" type="text" placeholder="{{ __('content.taxId') }}" >
                                @error('taxId')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- city --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.city') }}</label>
                            <div class="col-sm-10" >
                                <select name="city_id" class="form-control" data-placeholder="Tipo" style="width: 100%;">
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                                @error('city')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- address --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.address') }}</label>
                            <div class="col-sm-10" >
                                <input id="address" class="form-control" name="address" type="text" placeholder="{{ __('content.address') }}" >
                                @error('address')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- zip code --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.zipCode') }}</label>
                            <div class="col-sm-10" >
                                <input id="zipCode" class="form-control" name="zipCode" type="text" placeholder="{{ __('content.zipCode') }}" >
                                @error('zipCode')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- phoneNumber --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.phoneNumber') }}</label>
                            <div class="col-sm-10" >
                                <input id="phoneNumber" class="form-control" name="phoneNumber" type="text" placeholder="{{ __('content.phoneNumber') }}">
                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- subsidiary --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.subsidiary') }}</label>
                            <div class="col-sm-10" >
                                <select name="subsidiary_id" class="form-control" data-placeholder="Tipo" style="width: 100%;">
                                    @foreach ($subsidiaries as $subsidiary)
                                        <option value="{{ $subsidiary->id }}">{{ $subsidiary->name }}</option>
                                    @endforeach
                                </select>
                                @error('subsidiary_id')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- start date -->
                        <div class="form-group">

                            <label class="col-sm-2 control-label">{{ __('content.startDate') }}</label>
                            <div class="col-sm-10">
                                <input id="startDate" class="form-control pull-right" type="date"  name="startDate" >
                                @error('startDate')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!-- finish date -->
                        <div class="form-group">

                            <label class="col-sm-2 control-label">{{ __('content.finishDate') }}</label>
                            <div class="col-sm-10">
                                <input id="finishDate" class="form-control pull-right" type="date"  name="finishDate" >
                                @error('finishDate')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('projects.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection