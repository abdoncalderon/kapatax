@extends('layouts.main')

@section('title', __('content.zones'))

@section('section', __('content.zones'))

@section('level', __('content.settings'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('zones.index')}}"> {{ __('content.zones') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $zone->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $zone->name }}">
                            </div>
                        </div>

                        {{-- project --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.project') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $zone->project->name }}">
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('zones.edit', $zone) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('zones.index') }} ">{{ __('messages.returnToList') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection