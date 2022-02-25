@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('users.index')}}"> {{ __('content.users') }} </a></li>
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
                    <h3 class="box-title"><strong>{{ __('content.add') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            
                            {{-- username --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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
                                <label class="col-sm-2 control-label">{{ __('content.password') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
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
                                <label class="col-sm-2 control-label">{{ __('content.confirmpassword') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                        </div>
                        
                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('users.index') }} ">{{ __('content.cancel') }}</a>
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

@endsection