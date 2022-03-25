@extends('layouts.main')

@section('title', __('content.people'))

@section('section', __('content.edit'))

@section('level', __('content.people'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('people.index')}}"> {{ __('content.people') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.editPersonData') }}</strong></h3> | 
                <h3 class="box-title"><strong>{{ $person->fullName }}</strong></h3>
            </div>
            
            <div class="box-body">

                <div class="col-md-12">

                    <div class="col-sm-9 col-md-9 col-lg-9">

                        <form method="POST" action="{{ route('people.update',$person) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                            <input type="hidden" name="person_id" value="{{ $person->id }}">

                            {{-- Card Id --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.cardId') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="cardId" class="form-control" disabled name="cardId" type="text" value="{{ old('cardId',$person->cardId) }}" placeholder="{{ __('content.cardId') }}" >
                                </div>
                            </div>

                            {{-- First Name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.firstNames') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="firstName" class="form-control" name="firstName" type="text" value="{{ old('firstName',$person->firstName) }}" placeholder="{{ __('content.firstNames') }}" required >
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
                                    <input id="lastName" class="form-control" name="lastName" type="text" value="{{ old('lastName',$person->lastName) }}" placeholder="{{ __('content.lastNames') }}" required>
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
                                    <input id="fullName" class="form-control" name="fullName" type="text" value="{{ old('fullName',$person->fullName) }}" placeholder="{{ __('content.fullName') }}" required>
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
                                    <select id="gender" name="gender_id" class="form-control" style="width: 100%;" required>
                                        @foreach ($genders as $gender)
                                            <option value="{{ $gender->id }}"
                                                @if ($gender->id==old('gender_id',$person->gender_id))
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
                                    <input id="birthDate" class="form-control pull-right" type="date" name="birthDate" value="{{ old('birthDate',$person->birthDate) }}" required>
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
                                    <input id="jobTitle" class="form-control" name="jobTitle" type="text" value="{{ old('jobTitle',$person->jobTitle) }}" placeholder="{{ __('content.jobTitle') }}" >
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
                                    <input id="email" type="email" class="form-control " name="email" value="{{ old('email',$person->email) }}" placeholder="{{ __('content.email') }}" required>
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
                                                @if ($region->id==old('region_id',$person->city->state->country->region->id))
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
                                        <option value="{{ $person->city->state->country->id }}">{{ $person->city->state->country->name }}</option>
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
                                        <option value="{{ $person->city->state->id }}">{{ $person->city->state->name }}</option>
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
                                        <option value="{{ $person->city->id }}">{{ $person->city->name }}</option>
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
                                    <input id="address" class="form-control" name="address" type="text" value="{{ old('address',$person->address) }}" placeholder="{{ __('content.address') }}" >
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
                                    <input id="homePhone" class="form-control" name="homePhone" type="text" value="{{ old('homePhone',$person->homePhone) }}" placeholder="{{ __('content.homePhone') }}" >
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
                                    <input id="mobilePhone" class="form-control" name="mobilePhone" type="text" value="{{ old('mobilePhone',$person->mobilePhone) }}" placeholder="{{ __('content.mobilePhone') }}" >
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

                            <hr>

                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <a class="btn btn-danger btn-sm" href=" {{ route('people.index') }} ">{{ __('content.cancel') }}</a>
                            
                        </form>

                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3">
                        
                        <div class="photo">

                            <img id="photoPreview" src="{{ asset('images/people/photos/'.$person->photo) }}" alt="{{ __('content.photo') }}">

                        </div>

                        <div class="signature">

                            <img id="signaturePreview" src="{{ asset('images/people/signatures/'.$person->signature) }}" alt="{{ __('content.signature') }}">

                        </div>

                    </div>
                            
                </div>
                
            </div>
            <!-- /. box-body -->

        </div>
        <!-- /. box-info -->

    </section>

@endsection