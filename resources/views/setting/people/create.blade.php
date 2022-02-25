@extends('layouts.main')

@section('title', __('content.people'))

@section('section', __('content.people'))

@section('level', __('content.setting'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projectPeople.index')}}"> {{ __('content.people') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }} {{ __('messages.peopleInProject') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('projectPeople.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-9 col-md-9 col-lg-9">

                            {{-- Card Id --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.cardId') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="cardId" class="form-control" name="cardId" type="text" value="{{ old('cardId') }}" placeholder="{{ __('content.cardId') }}" >
                                    @error('cardId')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#searchPerson">{{ __('content.search') }}</button>
                                    </span>
                                </div>
                            </div>

                            {{-- First Name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.firstNames') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="firstName" class="form-control" name="firstName" type="text" value="{{ old('firstName') }}" placeholder="{{ __('content.firstNames') }}" >
                                    @error('firstName')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Last Name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.lastNames') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="lastName" class="form-control" name="lastName" type="text" value="{{ old('lastName') }}" placeholder="{{ __('content.lastNames') }}" >
                                    @error('lastName')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Full Name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.fullName') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="fullName" class="form-control" name="fullName" type="text" value="{{ old('fullName') }}" placeholder="{{ __('content.fullName') }}" >
                                    @error('fullName')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Gender --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.gender') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="gender" name="gender_id" class="form-control" style="width: 100%;">
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}"
                                                @if ($gender->id==old('gender_id'))
                                                    selected
                                                @endif    
                                            >{{ $gender->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addGender"> + </button>
                                    </span>
                                </div>
                            </div>

                            <!-- Birthdate -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.birthDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="birthDate" class="form-control pull-right" type="date" name="birthDate" value="{{ old('fullName') }}">
                                    @error('birthDate')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- email --}}
        
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="{{ __('content.email') }}">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- jobTitle --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.jobTitle') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="jobTitle" class="form-control" name="jobTitle" type="text" value="{{ old('jobTitle') }}" placeholder="{{ __('content.jobTitle') }}" >
                                    @error('jobTitle')
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
                                                @if ($region->id==old('region_id'))
                                                    selected
                                                @endif    
                                            >{{ $region->name }}</option>
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
                                    <input id="address" class="form-control" name="address" type="text" value="{{ old('address') }}" placeholder="{{ __('content.address') }}" >
                                    @error('address')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- home phone --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.homePhone') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="homePhone" class="form-control" name="homePhone" type="text" value="{{ old('homePhone') }}" placeholder="{{ __('content.homePhone') }}" >
                                    @error('homePhone')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- mobile phone --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.mobilePhone') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="mobilePhone" class="form-control" name="mobilePhone" type="text" value="{{ old('mobilePhone') }}" placeholder="{{ __('content.mobilePhone') }}" >
                                    @error('mobilePhone')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- photo --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.photo') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="photo" type="file" class="form-control" name="photo"}}>
                                </div>
                            </div>

                            {{-- signature --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.signature') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="signature" type="file" class="form-control" name="signature"}}>
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3">

                            <div class="photo">

                                <img id="photoPreview" src="{{asset('images/people/photos/noPhoto.png')}}" alt="{{ __('content.photo') }}">

                            </div>

                            <div class="signature">

                                <img id="photoPreview" src="{{asset('images/people/signatures/noSignature.png')}}" alt="{{ __('content.signature') }}">

                            </div>
                        </div>

                    
                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('messages.saveAndContinue') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('projectPeople.index') }} ">{{ __('content.cancel') }}</a>
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
                            <label for="name">{{ __('content.name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" maxlength="255" required>
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
                            <label for="regionModal1Text">{{ __('content.region') }}</label>
                            <input id="regionModal1Text" type="text" disabled class="form-control" name="region">
                        </div>

                        {{-- name --}}

                        <div class="form-group">
                            <label for="name">{{ __('content.name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" maxlength="255" required>
                        </div>

                        {{-- code --}}

                        <div class="form-group">
                            <label for="code">{{ __('content.code') }}</label>
                            <input id="code" type="text" class="form-control" name="code" maxlength="255" required>
                        </div>

                        {{-- ccc --}}

                        <div class="form-group">
                            <label for="ccc">{{ __('content.prefix') }}</label>
                            <input id="ccc" type="text" class="form-control" name="ccc" maxlength="255" required>
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
                            <label for="regionModel3Text">{{ __('content.region') }}</label>
                            <input id="regionModal3Text" type="text" disabled class="form-control" name="region">
                        </div>

                        {{-- country --}}

                        <input id="countryModal2Id" type="hidden" class="form-control" name="country_id">

                        <div class="form-group">
                            <label for="countryModal2Text">{{ __('content.country') }}</label>
                            <input id="countryModal2Text" type="text" disabled class="form-control" name="country">
                        </div>

                        {{-- State --}}

                        <input id="stateModal1Id" type="hidden" class="form-control" name="state_id">

                        <div class="form-group">
                            <label for="name">{{ __('content.state') }}</label>
                            <input id="stateModal1Text" type="text" disabled class="form-control" name="state">
                        </div>

                        {{-- name --}}

                        <div class="form-group">
                            <label for="name">{{ __('content.name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" maxlength="255" required>
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

    {{-- Modal Window Add Gender --}}

    <div class="modal fade" id="addGender" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('genders.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.gender') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label for="name">{{ __('content.name') }}</label>
                            <input id="name" type="text" class="form-control" name="name" maxlength="255" placeholder="{{ __('content.gender') }}" required>
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

    {{-- Modal Window Search Person --}}

    <div class="modal fade" id="searchPerson" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('projectPeople.search') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.search') }} {{ __('content.person') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- Field --}}

                        <div class="form-group">
                            <label for="field">{{ __('content.field') }}</label>
                            <select id="field" name="field" class="form-control" data-placeholder="Tipo" style="width: 100%;">
                                <option value="cardId">{{ __('content.cardId') }}</option>
                                <option value="fullName">{{ __('content.fullName') }}</option>
                            </select>
                        </div>

                        {{-- Value --}}

                        <div class="form-group">
                            <label for="value">{{ __('content.value') }}</label>
                            <input id="value" type="text" class="form-control" name="value" maxlength="255" required>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.search') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

    </div>


@endsection