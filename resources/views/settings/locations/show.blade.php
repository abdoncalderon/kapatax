@extends('layouts.main')

@section('title', __('content.locations'))

@section('section', __('content.locations'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('locations.index')}}"> {{ __('content.locations') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
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

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- Project  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.project') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $location->project->name }}">
                            </div>
                        </div>

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $location->name }}">
                            </div>
                        </div>

                        {{-- Code  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $location->code }}">
                            </div>
                        </div>

                        {{-- Sequence  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.sequence') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $location->sequence }}">
                            </div>
                        </div>

                        {{-- Max Time Open Folio  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.maxtimeopenfolio') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $location->max_time_open_folio }}">
                            </div>
                        </div>

                        {{-- Max Time Create Daily Report  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatedailyreport') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $location->max_time_create_dailyreport }}">
                            </div>
                        </div>

                        {{-- Max Time Create Note --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatenote') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $location->max_time_create_note }}">
                            </div>
                        </div>

                        {{-- Max Time Comments  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatecomment') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $location->max_time_create_comment }}">
                            </div>
                        </div>


                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('locations.edit', $location) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('locations.index') }} ">{{ __('messages.returntolist') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection