@extends('layouts.main')

@section('title', __('content.people'))

@section('section', __('content.people'))

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

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.updatePersonData') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('people.update',$person) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-9 col-md-9 col-lg-9">

                            {{-- Card Id --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.cardId') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="cardId" class="form-control @error('cardId') is-invalid @enderror" name="cardId" type="text" value="{{ $person->cardId }}" placeholder="{{ __('content.cardId') }}" autocomplete="off">
                                    @error('cardId')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- First Name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.firstNames') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="firstName" class="form-control @error('firstName') is-invalid @enderror" name="firstName" type="text" value="{{ $person->firstName }}" placeholder="{{ __('content.firstNames') }}" autocomplete="off">
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
                                    <input id="lastName" class="form-control @error('lastName') is-invalid @enderror" name="lastName" type="text" value="{{ $person->lastName }}" placeholder="{{ __('content.lastNames') }}" autocomplete="off">
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
                                    <input id="fullName" class="form-control @error('fullName') is-invalid @enderror" name="fullName" type="text" value="{{ $person->fullName }}" placeholder="{{ __('content.fullName') }}" autocomplete="off">
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
                                                @if($gender->id==$person->gender_id)
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
                                    <input id="birthDate" class="form-control pull-right @error('birthDate') is-invalid @enderror" type="date" name="birthDate" value="{{ $person->birthDate }}">
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
                                    <input id="jobTitle" type="text" class="form-control @error('jobTitle') is-invalid @enderror" name="jobTitle" value="{{ $person->jobTitle }}" placeholder="{{ __('content.jobTitle') }}">
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
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $person->email }}" placeholder="{{ __('content.email') }}">
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
                                                @if ($region->id==$person->city->state->country->region->id)
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
                                        <option value="{{ $person->city_id }}">{{ $person->city->name }}</option>
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
                                    <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $person->address }}" placeholder="{{ __('content.address') }}" autocomplete="off">
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
                                    <input id="homePhone" type="text" class="form-control @error('homePhone') is-invalid @enderror" name="homePhone" value="{{ $person->homePhone }}" placeholder="{{ __('content.homePhone') }}" autocomplete="off">
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
                                    <input id="mobilePhone" type="text"  class="form-control @error('mobilePhone') is-invalid @enderror" name="mobilePhone" value="{{ $person->mobilePhone }}"  placeholder="{{ __('content.mobilePhone') }}" autocomplete="off">
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

                            {{-- User --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="col-sm-10" >
                                    @if ($person->user==null)
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addUser">
                                            {{ __('content.add') }} {{ __('content.user') }}
                                        </button>
                                    @endif
                                    <div>
                                        <br>
                                    </div>
                                    <table id="users" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.user') }}</th>
                                                <th>{{ __('content.email') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->user }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="#">{{ __('content.edit') }}</a>
                                                        <a class="btn btn-info btn-xs" href="{{ route('userProjects.index', $user) }}">{{ __('content.access') }}</a>
                                                        @if($user->id!=1)
                                                            @if ($user->isActive())
                                                                <a class="btn btn-danger btn-xs" href="{{ route('users.activate', [$user, '0']) }}">{{ __('content.deactivate') }}</a>
                                                            @else
                                                                <a class="btn btn-info btn-xs" href="{{ route('users.activate', [$user, '1']) }}">{{ __('content.activate') }}</a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr>

                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3">

                            <div class="photo">

                                <img id="photoPreview" src="{{ asset('documents/people/photos/'.$person->photo) }}" alt="{{ __('content.photo') }}">

                            </div>

                            <div class="signature">

                                <img id="signaturePreview" src="{{ asset('documents/people/signatures/'.$person->signature) }}" alt="{{ __('content.signature') }}">

                            </div>
                        </div>
                    
                        
                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.update') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('people.index') }} ">{{ __('content.cancel') }}</a>
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

    {{-- Add Record Person in Stakeholder --}}

    <div class="modal fade" id="modal-stakeholderPerson-add">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('stakeholderPeople.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('messages.addAdmissionRecord') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
    
                            {{-- Person --}}
    
                            <input id="person_id" hidden type="text" name="person_id" value="{{ $person->id }}">
    
                            {{-- Stakeholder --}}
    
                            <div class="form-group">
                                <label for="stakeholder_id">{{__('content.stakeholder')}}</label>
                                <select id="stakeholder_id" name="stakeholder_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.stakeholder')}}</option>
                                    @foreach (current_user()->project->stakeholders as $stakeholder)
                                        <option value="{{ $stakeholder->id }}">{{ $stakeholder->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Admission date -->

                            <div class="form-group">
                                <label for="admissionhDate">{{ __('messages.admissionDate') }}</label>
                                <div class="input-group input-group-sm">
                                    <input id="admissionhDate" class="form-control pull-right @error('admissionDate') is-invalid @enderror" type="date" name="admissionDate">
                                    @error('admissionDate')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- Modal Window Add User --}}

    <div class="modal fade" id="addUser" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('users.add') }}">

                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.user') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        

                        {{-- username --}}

                        <input type="hidden" name="person_id" value="{{ $person->id }}">

                        {{-- username --}}
    
                        <div class="form-group">
                            <label class="col-sm-2 col-md-4 col-lg-4 control-label">{{ __('content.user') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10 col-md-8 col-lg-8">
                                <input id="user" type="text" class="form-control @error('user') is-invalid @enderror" name="user" value="{{ old('user') }}" required autocomplete="user">
                                @error('user')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- email --}}

                        <div class="form-group">
                            <label class="col-sm-2 col-md-4 col-lg-4 control-label">{{ __('content.email') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10 col-md-8 col-lg-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- password --}}

                        <div class="form-group">
                            <label class="col-sm-2 col-md-4 col-lg-4 control-label">{{ __('content.password') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10  col-md-8 col-lg-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- confirm password --}}

                        <div class="form-group">
                            <label class="col-sm-2 col-md-4 col-lg-4 control-label">{{ __('content.confirmpassword') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10 col-md-8 col-lg-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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