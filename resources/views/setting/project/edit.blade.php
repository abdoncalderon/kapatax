@extends('layouts.main')

@section('title', __('content.project'))

@section('section', __('content.project'))

@section('level', __('content.settings'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('project.index')}}"> {{ __('content.project') }} </a></li>
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
                    <h3 class="box-title"><strong>{{ $project->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('project.update', $project) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="name" class="form-control" name="name" type="text" placeholder="{{ __('content.code') }}" value="{{ old('name', $project->name) }}">
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
                                    <input id="code" class="form-control" name="code" type="text" placeholder="{{ __('content.code') }}" value="{{ old('code', $project->code) }}">
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
                                    <input id="taxId" class="form-control" name="taxId" type="text" placeholder="{{ __('content.taxId') }}" value="{{ old('taxId', $project->taxId) }}">
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
                                                @if($project->city->state->country->region->id==$region->id):
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
                                        <option value="{{ $project->city->state->country->id }}">{{ $project->city->state->country->name }}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- state --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="state" name="state_id" class="form-control" style="width: 100%;">
                                        <option value="{{ $project->city->state->id }}">{{ $project->city->state->name }}</option>
                                    </select>
                                    
                                </div>
                            </div>

                            {{-- city --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.city') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="city" name="city_id" class="form-control" style="width: 100%;">
                                        <option value="{{ $project->city->id }}">{{ $project->city->name }}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- address --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.address') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="address" class="form-control" name="address" type="text" placeholder="{{ __('content.address') }}" value="{{ old('address', $project->address) }}">
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
                                    <input id="zipCode" class="form-control" name="zipCode" type="text" placeholder="{{ __('content.zipCode') }}" value="{{ old('ziPCode', $project->zipCode) }}">
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="phoneNumber" class="form-control" name="phoneNumber" type="text" placeholder="{{ __('content.phoneNumber') }}" value="{{ old('phoneNumber', $project->phoneNumber) }}">
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select name="subsidiary_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.subsidiary')}}</option>
                                        @foreach ($subsidiaries as $subsidiary)
                                            <option value="{{ $subsidiary->id }}"
                                                @if($project->subsidiary_id==$subsidiary->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $subsidiary->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Start Date  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.start') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="date" class="form-control" name="startDate" value="{{ date('Y-m-d',strtotime($project->startDate)) }}">
                                    @error('startDate')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            {{-- Finish Date  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="date" class="form-control" name="finishDate" value="{{ date('Y-m-d',strtotime($project->finishDate)) }}">
                                    @error('finishDate')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            {{-- Logo Stakeholder 1 --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} {{__('content.stakeholder')}}  1</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select name="stakeholderLogo1_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.stakeholder')}} {{__('content.logo')}} 1</option>
                                        @foreach ($stakeholders as $stakeholder)
                                            <option value="{{ $stakeholder->id }}"
                                                @if($project->stakeholderLogo1_id==$stakeholder->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $stakeholder->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Logo Stakeholder 2 --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} {{__('content.stakeholder')}} 2</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select name="stakeholderLogo2_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.stakeholder')}} {{__('content.logo')}} 2</option>
                                        @foreach ($stakeholders as $stakeholder)
                                            <option value="{{ $stakeholder->id }}"
                                                @if($project->stakeholderLogo2_id==$stakeholder->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $stakeholder->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Logo Stakeholder 3 --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} {{__('content.stakeholder')}}  3</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select name="stakeholderLogo3_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.stakeholder')}} {{__('content.logo')}} 3</option>
                                        @foreach ($stakeholders as $stakeholder)
                                            <option value="{{ $stakeholder->id }}"
                                                @if($project->stakeholderLogo3_id==$stakeholder->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $stakeholder->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Logo Stakeholder 4 --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} {{__('content.stakeholder')}} 4</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select name="stakeholderLogo4_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.stakeholder')}} {{__('content.logo')}} 4</option>
                                        @foreach ($stakeholders as $stakeholder)
                                            <option value="{{ $stakeholder->id }}"
                                                @if($project->stakeholderLogo4_id==$stakeholder->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $stakeholder->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('project.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection