@extends('layouts.main')

@section('title', __('content.locations'))

@section('section', __('content.locations'))

@section('level', __('content.production'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('workbook_settings_locations')}}"> {{ __('content.locations') }} </a></li>
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

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }} {{ __('content.location') }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('locations.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- Project  --}}

                            <input id="project_id" type="hidden" class="form-control" name="project_id" value="{{ $project->id }}" type="text">

                            {{-- Project  --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.project') }}</label>
                                <div class="col-sm-10">
                                    <select id="project_id" name="project_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.project')}}</option>
                                        @foreach ($projects as $project)
                                            <option value="{{ $project->id }}">{{ $project->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}

                            {{-- Name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="name" maxlength="255" required>
                                </div>
                            </div>

                            {{-- Zone --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.zone') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <select id="zone_id" name="zone_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.zone')}}</option>
                                        @foreach ($zones as $zone)
                                            <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#add"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- Code  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="code" maxlength="255" required>
                                </div>
                            </div>

                            {{-- Sequence  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.sequence') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="sequence" required>
                                </div>
                            </div>

                            {{-- latitude  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.latitude') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="latitude" required>
                                </div>
                            </div>

                            {{-- longitude  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.longitude') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="longitude" required>
                                </div>
                            </div>

                            {{-- start date --}}

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

                            {{-- finish date --}}
                            
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
                            
                            {{-- Max Time for Open folio  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimeopenfolio') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="max_time_open_folio">
                                </div>
                            </div>

                            {{-- Max Time for create daily report  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatedailyreport') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_dailyreport">
                                </div>
                            </div>

                            {{-- Max Time for Create Note  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatenote') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_note">
                                </div>
                            </div>

                            {{-- Max Time for create Comment --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatecomment') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_comment">
                                </div>
                            </div>
                       
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('locations.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection