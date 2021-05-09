@extends('layouts.main')

@section('title', __('content.locations'))

@section('section', __('content.locations'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
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

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Id  --}}

                            <input type="text" hidden name="name" value="{{ $location->id }}">

                            {{-- Project ID  --}}

                            <input type="text" hidden name="project_id" value="{{ $location->project_id }}">

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
                                    <input type="text" class="form-control" name="name" value="{{ $location->name }}" required>
                                </div>
                            </div>

                            {{-- Code  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="code" value="{{ $location->code }}" required>
                                </div>
                            </div>

                            {{-- Sequence  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.sequence') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="sequence" value="{{ $location->sequence }}">
                                </div>
                            </div>
                            
                            {{-- Max Time for Open folio  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimeopenfolio') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="maxtimeopen" value="{{ $location->max_time_open_folio }}">
                                </div>
                            </div>

                            {{-- Max Time for Create Daily Report  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatedailyreport') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="maxtimeopen" value="{{ $location->max_time_create_dailyreport }}">
                                </div>
                            </div>

                            {{-- Max Time for Create Note  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatenote') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="maxtimenote" value="{{ $location->max_time_create_note }}">
                                </div>
                            </div>

                            {{-- Max Time for Comment --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.maxtimecreatecomment') }}</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control" name="maxtimecomment" value="{{ $location->max_time_create_comment }}">
                                </div>
                            </div>
                       
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('home') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection