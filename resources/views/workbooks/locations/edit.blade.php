@extends('layouts.main')

@section('title', __('content.locations'))

@section('section', __('content.locations'))

@section('level', __('content.production'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('locations.index')}}"> {{ __('content.locations') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                 

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $location->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('workbook_settings_locations_update', $location) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Id  --}}

                            <input type="text" hidden name="name" value="{{ $location->id }}">

                            {{-- Project ID  --}}

                            <input type="text" hidden name="project_id" value="{{ $location->project_id }}">

                            {{-- Name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="text" class="form-control" name="name" value="{{ $location->name }}" required>
                                </div>
                            </div>

                            {{-- Code  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="text" class="form-control" name="code" value="{{ $location->code }}" required>
                                </div>
                            </div>

                            {{-- Zone --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.zone') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <select id="zone_id" name="zone_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.zone')}}</option>
                                        @foreach ($zones as $zone)
                                            <option value="{{ $zone->id }}"
                                                @if($location->zone_id==$zone->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#add"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- Sequence  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.sequence') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="sequence" value="{{ $location->sequence }}" min="1">
                                </div>
                            </div>

                            {{-- latitude  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.latitude') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="latitude" value="{{ $location->latitude }}">
                                </div>
                            </div>

                            {{-- longitude  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.longitude') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="longitude" value="{{ $location->longitude }}">
                                </div>
                            </div>

                            {{-- start date --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.startDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="startDate" class="form-control pull-right" type="date"  name="startDate" value="{{ $location->startDate }}" required>
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
                                    <input id="finishDate" class="form-control pull-right" type="date"  name="finishDate" value="{{ $location->finishDate }}" required>
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="max_time_open_folio" value="{{ $location->max_time_open_folio }}" min="1">
                                </div>
                            </div>

                            {{-- Max Time for Create Daily Report  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatedailyreport') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_dailyreport" value="{{ $location->max_time_create_dailyreport }}" min="1">
                                </div>
                            </div>

                            {{-- Max Time for Create Note  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatenote') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_note" value="{{ $location->max_time_create_note }}" min="1">
                                </div>
                            </div>

                            {{-- Max Time for Comment --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatecomment') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_comment" value="{{ $location->max_time_create_comment }}" min="1">
                                </div>
                            </div>
                       
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('workbook_settings_locations') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Modal Window Add Zone --}}

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('zones.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.zone') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input id="project_id" type="hidden" class="form-control" name="project_id" value="{{ $project->id }}" type="text">
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