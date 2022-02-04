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

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- subsidiary --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.subsidiary') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="taxId" class="form-control" name="taxId" type="text" placeholder="{{ __('content.taxId') }}" >
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
                                            <option value="{{ $region->id }}">{{ $region->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addRegion"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- country --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.country') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="country" name="country_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.country')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addCountry"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- state --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="state" name="state_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.state')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addState"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- city --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.city') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="city" name="city_id" class="form-control" data-placeholder="Tipo" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.city')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addCity"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- address --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.address') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="phoneNumber" class="form-control" name="phoneNumber" type="text" placeholder="{{ __('content.phoneNumber') }}">
                                    @error('phoneNumber')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            <!-- start date -->
                            <div class="form-group">

                                <label class="col-sm-2 control-label">{{ __('content.startDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="finishDate" class="form-control pull-right" type="date"  name="finishDate" >
                                    @error('finishDate')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    
                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('projects.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Modal Window Add Region --}}

    <div class="modal fade" id="addRegion" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('regions.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.region') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

    {{-- Modal Window Add Country --}}

    <div class="modal fade" id="addCountry" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('countries.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.country') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- region --}}

                        <input id="regionModal1Id" type="hidden" class="form-control" name="region_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.region') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="regionModal1Text" type="text" disabled class="form-control" name="region">
                            </div>
                        </div>

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                        {{-- code --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input type="text" class="form-control" name="code" maxlength="255" required>
                            </div>
                        </div>

                        {{-- ccc --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.prefix') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input type="text" class="form-control" name="ccc" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>

    {{-- Modal Window Add State --}}

    <div class="modal fade" id="addState" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('states.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"  id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.state') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- region --}}

                        <input id="regionModal2Id" type="hidden" class="form-control" name="region_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.region') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="regionModal2Text" type="text" disabled class="form-control" name="region">
                            </div>
                        </div>

                        {{-- country --}}

                        <input id="countryModal1Id" type="hidden" class="form-control" name="country_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.country') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="countryModal1Text" type="text" disabled class="form-control" name="country">
                            </div>
                        </div>

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>

    {{-- Modal Window Add City --}}

    <div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('cities.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"  id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.city') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        {{-- region --}}

                        <input id="regionModal3Id" type="hidden" class="form-control" name="region_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.region') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="regionModal3Text" type="text" disabled class="form-control" name="region">
                            </div>
                        </div>

                        {{-- country --}}

                        <input id="countryModal2Id" type="hidden" class="form-control" name="country_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.country') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="countryModal2Text" type="text" disabled class="form-control" name="country">
                            </div>
                        </div>

                        {{-- State --}}

                        <input id="stateModal1Id" type="hidden" class="form-control" name="state_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="stateModal1Text" type="text" disabled class="form-control" name="state">
                            </div>
                        </div>

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>

@endsection