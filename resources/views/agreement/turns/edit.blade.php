@extends('layouts.main')

@section('title', __('content.turns'))

@section('section', __('content.turns'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('turns.index')}}"> {{ __('content.turns') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $turn->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('turns.update', $turn) }}">
                    @csrf
                    @method('PATCH')

                    <div class="box-body">

                        {{-- Id  --}}
                                
                        <input id="id" hidden name="id" value="{{ $turn->id }}">

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input id="name" disabled class="form-control" name="name" type="text" value="{{ $turn->name }}">
                            </div>
                        </div>

                        {{-- Start hour --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.start') }}</label>
                            <div class="col-sm-10">
                                <input id="start" class="form-control" name="start" type="time" value="{{ $turn->start }}" required>
                            </div>
                        </div>

                        {{-- Finish hour  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                            <div class="col-sm-10">
                                <input id="finish" class="form-control" name="finish" type="time" value="{{ $turn->finish }}" required>
                            </div>
                        </div>

                        {{-- Next Day  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.nextday') }}</label>
                            <div class="col-sm-10">
                                <input id="nextday" name="nextday" type="checkbox"  
                                    @if($turn->nextday==1)
                                        checked
                                    @endif 
                                >
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('turns.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection