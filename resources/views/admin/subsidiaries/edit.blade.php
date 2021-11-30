@extends('layouts.main')

@section('title', __('content.countries'))

@section('section',__('content.countries'))

@section('level',__('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('countries.index')}}"> {{ __('content.countries') }} </a></li>
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
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $country->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('countries.update', $country) }}">
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
                                    <input id="name" disabled type="text" class="form-control" name="name" value="{{ old('name', $country->name) }}" placeholder="Nombre">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- region --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.region') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select name="region_id" class="form-control" data-placeholder="Tipo" style="width: 100%;">
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}"
                                                @if($country->region_id==$region->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- code --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="code" type="text" class="form-control" name="code" value="{{ old('code', $country->code) }}" placeholder="{{ __('content.code') }}">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- ccc --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.prefix') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="ccc" type="text" class="form-control" name="ccc" value="{{ old('ccc', $country->ccc) }}" placeholder="{{ __('content.prefix') }}">
                                    @error('ccc')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Submit --}}
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('countries.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection