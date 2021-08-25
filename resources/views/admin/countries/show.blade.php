@extends('layouts.main')

@section('title', __('content.countries'))

@section('section', __('content.countries'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('countries.index')}}"> {{ __('content.countries') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $country->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $country->name }}">
                            </div>
                        </div>

                        {{-- Region  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.region') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $country->region->name }}">
                            </div>
                        </div>

                        {{-- Code  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $country->code }}">
                            </div>
                        </div>

                        {{-- CCC  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.prefix') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $country->ccc }}">
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('countries.edit', $country) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('countries.index') }} ">{{ __('messages.returnToList') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection