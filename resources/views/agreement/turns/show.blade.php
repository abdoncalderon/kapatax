@extends('layouts.main')

@section('title', __('content.turns'))

@section('section', __('content.turns'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('turns.index')}}"> {{ __('content.turns') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
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

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $turn->name }}">
                            </div>
                        </div>

                        {{-- Start hour --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.start') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $turn->start }}">
                            </div>
                        </div>

                        {{-- Finish hour  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $turn->finish }}">
                            </div>
                        </div>

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.nextday') }}</label>
                            <div class="col-sm-10">
                                <input disabled type="checkbox"  
                                    @if($turn->nextday==1)
                                        checked
                                    @endif 
                                >
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('turns.edit', $turn) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('turns.index') }} ">{{ __('messages.returntolist') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection