@extends('layouts.main')

@section('title', __('content.contractors'))

@section('section', __('content.contractors'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('contractors.index')}}"> {{ __('content.contractors') }} </a></li>
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
                    <h3 class="box-title"><strong>{{ __('content.add') }} {{ __('content.contractor') }} </strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('contractors.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10" >
                                <input id="name" class="form-control" name="name" type="text" placeholder="{{ __('content.name') }}" required>
                            </div>
                        </div>

                        {{-- code --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="code" class="form-control" name="code" type="text" placeholder="{{ __('content.code') }}" >
                                @error('code')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- taxId --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.taxId') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="taxId" class="form-control" name="taxId" type="text" placeholder="{{ __('content.taxId') }}" >
                                @error('taxId')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </di --}}v>
                        </div>

                        {{-- city --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.city') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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
                        </div> --}}

                        {{-- address --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.address') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="address" class="form-control" name="address" type="text" placeholder="{{ __('content.address') }}" >
                                @error('address')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- zip code --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.zipCode') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="zipCode" class="form-control" name="zipCode" type="text" placeholder="{{ __('content.zipCode') }}" >
                                @error('zipCode')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- email --}}
    
                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}

                        {{-- phoneNumber --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.phoneNumber') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="phoneNumber" class="form-control" name="phoneNumber" type="text" placeholder="{{ __('content.phoneNumber') }}">
                                @error('phoneNumber')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> --}}
                       

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('contractors.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection