@extends('layouts.main')

@section('title', __('content.location'))

@section('section', __('content.locations'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('locations.index')}}"> {{ __('content.locations') }} </a></li>
        <li><a href="{{ route('locationTurns.index',$location)}}"> {{ __('content.turns') }} </a></li>
        <li class="active">{{ __('content.assign') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">

                 
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.turn').' '.$location->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('locationTurns.store',$location) }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- location --}}
    
                            <input id="location_id" hidden type="text" name="location_id" value="{{ $location->id }}">

                            {{-- Turn --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.turn') }}</label>
                                <div class="col-sm-10" >
                                    <select id="turn_id" name="turn_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.turn')}}</option>
                                        @foreach ($turns as $turn)
                                            <option value="{{ $turn->id }}">{{ $turn->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            {{-- Date From  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.start') }}</label>
                                <div class="col-sm-10">
                                    <input id="dateFrom" type="date" class="form-control" name="dateFrom" value="{{ $location->startDate }}" required>
                                </div>
                            </div>

                            {{-- Date To  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                                <div class="col-sm-10">
                                    <input id="dateTo" type="date" class="form-control" name="dateTo" value="{{ $location->finishDate }}" required>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('locationTurns.index',$location) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection

