@extends('layouts.main')

@section('title', __('content.employees'))

@section('section', __('content.record'))

@section('level', __('content.employees'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.employees') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.employeeData') }}</strong></h3> | 
            </div>
            
            <div class="box-body">

                <div class="col-md-12">

                    <div class="nav-tabs-custom">

                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab_1" data-toggle="tab"><strong>{{ __('content.personal') }}</strong></a></li>
                            <li><a href="#tab_2" data-toggle="tab"><strong>{{ __('content.labor') }}</strong></a></li>
                            <li><a href="#tab_3" data-toggle="tab"><strong>{{ __('content.project') }}</strong></a></li>
                        </ul>

                        <div class="tab-content">

                            <div class="tab-pane active" id="tab_1">

                                <div class="col-sm-9 col-md-9 col-lg-9">

                                    <div>
                                        <br>
                                        <br>
                                    </div>

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
        
                                    <hr>
        
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

                                    <hr>

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
        
                                        <img id="signaturePreview" src="{{asset('images/people/signatures/noSignature.png')}}" alt="{{ __('content.signature') }}">
        
                                    </div>
                                </div>

                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_2">
                                
                            </div>
                            <!-- /.tab-pane -->

                            <div class="tab-pane" id="tab_3">
                               
                            </div>
                            <!-- /.tab-pane -->

                        </div>
                        <!-- /.tab-content -->

                    </div>
                    <!-- nav-tabs-custom -->

                </div>

                <a class="btn btn-success btn-sm" href="#">{{ __('content.save') }}</a>
            </div>
            <!-- /. box-body -->

        </div>
        <!-- /. box-info -->

    </section>

@endsection