@extends('layouts.main')

@section('title', __('content.dailyreports'))

@section('section', __('content.dailyreports'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('dailyReports.index')}}"> {{ __('content.dailyreports') }} </a></li>
        <li class="active">{{ __('content.create') }}</li>
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
                    <h3 class="box-title"><strong>{{ __('content.create').' '.__('content.dailyreport') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('dailyReports.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Folio --}}
    
                            <input id="folio_id" hidden type="text" name="folio_id" value="{{ $folio->id }}">


                            {{-- Date --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                                <div class="col-sm-10" >
                                    <input id="date" disabled type="text" class="form-control" name="date" value="{{ $folio->date }}">
                                </div>
                            </div>
                            
                            {{-- Location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <input id="location" disabled type="text" class="form-control" name="location" value="{{ $folio->location->name }}">
                                </div>
                            </div>

                            {{-- Turn --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.turn') }}</label>
                                <div class="col-sm-10" >
                                    <select id="turn_id" name="turn_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.turn')}}</option>
                                        @foreach ($folio->location->turns as $locationTurn)
                                            @if(is_valid_date_for_turn(strtotime($folio->date),$locationTurn))
                                                <option value="{{ $locationTurn->turn_id }}">{{ $locationTurn->turn->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            
                            {{-- Responsible --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.responsible') }}</label>
                                <div class="col-sm-10" >
                                    <select id="responsible" name="responsible" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.responsible')}} </option>
                                        @foreach ($responsibles as $responsible)
                                            <option value="{{ $responsible->user->id }}">{{ $responsible->user->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- report --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.description') }}</label>
                                <div class="col-sm-10" >
                                    <textarea id="report" class="form-control @error('report') is-invalid @enderror" rows="20" style="resize: vertical" maxlength="65000" name="report" required autocomplete="report"></textarea>
                                    @error('report')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- user_id --}}
    
                            <input id="user_id" hidden type="text" name="user_id" value="{{ auth()->user()->id }}">

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('dailyReports.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection


