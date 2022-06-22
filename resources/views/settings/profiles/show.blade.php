@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.profile'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.profile') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $projectUser->user->person->fullName }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal">

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-9 col-md-9 col-lg-9">

                            {{-- Name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                  
                                    <input disabled class="form-control" value="{{ $projectUser->user->person->fullName }}">
                                </div>
                            </div>

                            {{-- User  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $projectUser->user->user }}">
                                </div>
                            </div>

                            {{-- Email  --}}

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 col-lg-2 control-label">{{ __('content.email') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $projectUser->user->email }}">
                                </div>
                            </div>

                            {{-- Project --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.project') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $projectUser->project->name }}">
                                </div>
                            </div>

                            {{-- Role  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $projectUser->projectRole->role->name }}">
                                </div>
                            </div>

                            

                        </div>

                        <div class="col-sm-3 col-md-3 col-lg-3">

                            <div class="photo">

                                <img id="photoPreview" src="{{ asset('documents/people/photos/'.$projectUser->user->person->photo) }}" alt="{{ __('content.photo') }}">

                            </div>

                            <div class="signature">

                                <img id="photoPreview" src="{{ asset('documents/people/signatures/'.$projectUser->user->person->signature) }}" alt="{{ __('content.signature') }}">

                            </div>

                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href="{{ route('profiles.edit', $projectUser) }}">{{ __('content.edit') }}</a>
                        <a class="btn btn-danger btn-sm" href="{{ route('home') }}">{{ __('content.exit') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>
    
@endsection