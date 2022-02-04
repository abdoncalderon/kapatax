@extends('layouts.main')

@section('title', __('content.locations'))

@section('section', __('content.locations'))

@section('level', __('content.configuration'))

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

                {{-- Error Messages --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $errors->first() }}
                    </div>
                @endif

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $location->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('locations.update', $location) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- Id  --}}

                            <input type="text" hidden name="id" value="{{ $location->id }}">

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

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="text" class="form-control" name="code" value="{{ $location->code }}" required>
                                </div>
                            </div> --}}

                            {{-- Zone --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.zone') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <select id="zone_id" name="zone_id" class="form-control" required style="width: 100%;" >
                                        @foreach ($zones as $zone)
                                            <option value="{{ $zone->id }}"
                                                @if($location->zone_id==$zone->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $zone->name }}</option>
                                        @endforeach
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#add"> + </button>
                                        </span>
                                    </select>
                                </div>
                            </div>

                            {{-- Sequence  --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.sequence') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="sequence" value="{{ $location->sequence }}">
                                </div>
                            </div> --}}

                            
                            
                            {{-- Max Time for Open folio  --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimeopenfolio') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="max_time_open_folio" value="{{ $location->max_time_open_folio }}">
                                </div>
                            </div> --}}

                            {{-- Max Time for Create Daily Report  --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatedailyreport') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_dailyreport" value="{{ $location->max_time_create_dailyreport }}">
                                </div>
                            </div> --}}

                            {{-- Max Time for Create Note  --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatenote') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_note" value="{{ $location->max_time_create_note }}">
                                </div>
                            </div> --}}

                            {{-- Max Time for Comment --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatecomment') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="number" class="form-control" name="max_time_create_comment" value="{{ $location->max_time_create_comment }}">
                                </div>
                            </div> --}}
                       
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('home') }} ">{{ __('content.cancel') }}</a>
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
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.location') }}</h4>
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