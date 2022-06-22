@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.profile'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        {{-- <li><a href="{{ route('profiles.show')}}"> {{ __('content.profile') }} </a></li> --}}
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $projectUser->user->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('profiles.update', $projectUser->user_id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-9 col-md-9 col-lg-9">

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" disabled class="form-control" name="name" value="{{ old('name', $projectUser->user->person->fullName) }}">
                                </div>
                            </div>
                            
                            {{-- username --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="user" disabled class="form-control" name="user" value="{{ old('user', $projectUser->user->user) }}">
                                </div>
                            </div>

                            {{-- email --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="email" disabled class="form-control" name="email" value="{{ old('email', $projectUser->user->email) }}">
                                </div>
                            </div>

                            {{-- Role  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $projectUser->projectRole->role->name }}">
                                </div>
                            </div>

                            {{-- Project --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.project') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $projectUser->project->name }}">
                                </div>
                            </div>

                            {{-- photo --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.photo') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="photo" type="file" class="form-control" name="photo">
                                </div>
                            </div>

                            {{-- signature --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.signature') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="signature" type="file" class="form-control" name="signature">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3">

                            <div class="photo">

                                <img id="photoPreview" src="{{ asset('documents/people/photos/'.$projectUser->user->person->photo) }}" alt="{{ __('content.photo') }}">

                            </div>

                            <div class="signature">

                                <img id="signaturePreview" src="{{ asset('documents/people/signatures/'.$projectUser->user->person->signature) }}" alt="{{ __('content.signature') }}">

                            </div>
                        </div>
                        
                    </div>

                    {{-- Submit --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('profiles.show', $projectUser->id) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection