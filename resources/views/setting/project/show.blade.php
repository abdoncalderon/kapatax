@extends('layouts.main')

@section('title', __('content.project'))

@section('section', __('content.project'))

@section('level', __('content.settings'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('project.show')}}"> {{ __('content.project') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $project->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal">

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                                {{-- name  --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->name }}">
                                    </div>
                                </div>
    
                                {{-- code  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->code }}">
                                    </div>
                                </div>
    
                                {{-- tax ID  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.taxId') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->taxId }}">
                                    </div>
                                </div>
    
                                {{-- city  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.city') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->city->name }}">
                                    </div>
                                </div>
    
                                {{-- address  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.address') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->address }}">
                                    </div>
                                </div>
    
                                {{-- zip code  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->zipCode }}">
                                    </div>
                                </div>
    
    
                                {{-- phone number  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.phoneNumber') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->phoneNumber }}">
                                    </div>
                                </div>
    
                                {{-- subsidiary  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.subsidiary') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->subsidiary->name }}">
                                    </div>
                                </div>
    
                                {{-- start date  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.startDate') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->startDate }}">
                                    </div>
                                </div>
    
                                {{-- finish date  --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.startDate') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input disabled class="form-control" value="{{ $project->finishDate }}">
                                    </div>
                                </div>

                        </div>
                        
                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('project.edit', $project) }} ">{{ __('content.edit') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection