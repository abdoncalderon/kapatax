@extends('layouts.main')

@section('title', __('content.turns'))

@section('section', __('content.turns'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('turns.index')}}"> {{ __('content.turns') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Messages --}}
                @if(session('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ session('message') }}
                    </div>
                @endif

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }}  {{ __('content.turn') }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('turns.store') }}"> 
                    @csrf

                    <div class="box-body">

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input id="name" class="form-control" name="name" type="text" maxlength="255" placeholder="{{ __('content.name') }}" maxlength="255" required>
                            </div>
                            
                        </div>

                        {{-- Start hour --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.start') }}</label>
                            <div class="col-sm-10">
                                <input id="start" class="form-control" name="start" type="time" required>
                            </div>
                        </div>

                        {{-- Finish hour  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                            <div class="col-sm-10">
                                <input id="finish" class="form-control" name="finish" type="time" required>
                            </div>
                        </div>

                        {{-- Next Day  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.nextday') }}</label>
                            <div class="col-sm-10">
                                <input id="nextday" name="nextday" type="checkbox">
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('turns.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection