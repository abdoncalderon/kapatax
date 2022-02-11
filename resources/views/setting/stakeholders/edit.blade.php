@extends('layouts.main')

@section('title', __('content.stakeholders'))

@section('section', __('content.stakeholders'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('stakeholders.index')}}"> {{ __('content.stakeholders') }} </a></li>
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

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $stakeholder->name }} </strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('stakeholders.update',$stakeholder) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        
                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text" value="{{ $stakeholder->name }}" placeholder="{{ __('content.name') }}" required>
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="code" class="form-control  @error('code') is-invalid @enderror" name="code" type="text" value="{{ $stakeholder->code }}" placeholder="{{ __('content.code') }}" required>
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="taxId" class="form-control" name="taxId" type="text" value="{{ $stakeholder->taxId }}" placeholder="{{ __('content.taxId') }}" >
                                    @error('taxId')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{--region --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.region') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="region" name="region_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.region')}}</option>
                                        @foreach ($regions as $region)
                                            <option value="{{ $region->id }}"
                                                @if($stakeholder->city->state->country->region->id==$region->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- country --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.country') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="country" name="country_id" class="form-control" style="width: 100%;">
                                        <option value="{{ $stakeholder->city->state->country->id }}">{{ $stakeholder->city->state->country->name }}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- state --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="state" name="state_id" class="form-control" style="width: 100%;">
                                        <option value="{{ $stakeholder->city->state->id }}">{{ $stakeholder->city->state->name }}</option>
                                    </select>
                                    
                                </div>
                            </div>

                            {{-- city --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.city') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="city" name="city_id" class="form-control" style="width: 100%;">
                                        <option value="{{ $stakeholder->city->id }}">{{ $stakeholder->city->name }}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- address --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.address') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="address" class="form-control" name="address" type="text" placeholder="{{ __('content.address') }}" value="{{ old('address', $stakeholder->address) }}">
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="zipCode" class="form-control" name="zipCode" type="text" value="{{ $stakeholder->zipCode }}" placeholder="{{ __('content.zipCode') }}" >
                                </div>
                            </div>

                            {{-- email --}}
        
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="email" class="form-control @error('email') is-invalid @enderror" name="email" type="email" value="{{ $stakeholder->email }}" placeholder="{{ __('content.email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- phoneNumber --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.phoneNumber') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="phoneNumber" class="form-control" name="phoneNumber" type="text" value="{{ $stakeholder->phoneNumber }}" placeholder="{{ __('content.phoneNumber') }}">
                                </div>
                            </div>

                            {{-- type --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.type') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="stakeholder_type_id"" name="stakeholder_type_id" class="form-control" style="width: 100%;" required>
                                        @foreach ($stakeholderTypes as $stakeholderType)
                                            <option value="{{ $stakeholderType->id }}"
                                                @if($stakeholder->stakeholder_type_id==$stakeholderType->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $stakeholderType->name }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                        </div>

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('stakeholders.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection