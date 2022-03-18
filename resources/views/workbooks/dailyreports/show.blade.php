@extends('layouts.main')

@section('title', ' - '.date('Y-M-d',strtotime($dailyReport->folio->date)).' - '.$dailyReport->folio->location->name.' - '.$dailyReport->turn->name)

@section('section', __('content.dailyreports'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('dailyReports.index')}}"> {{ __('content.dailyreports') }} </a></li>
        <li class="active">{{ __('content.show') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">

                 
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.show').' '.__('content.dailyreport') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal">

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- date --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                                <div class="col-sm-10" >
                                    <input id="date" disabled type="text" class="form-control" name="date" value="{{ $dailyReport->folio->date }}">
                                </div>
                            </div>
                            
                            {{-- location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <input id="location" disabled type="text" class="form-control" name="location" value="{{ $dailyReport->folio->location->name }}">
                                </div>
                            </div>

                            {{-- turn --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.turn') }}</label>
                                <div class="col-sm-10" >
                                    <input id="turn" disabled type="text" class="form-control" name="turn" value="{{ $dailyReport->turn->name }}">
                                </div>
                            </div>

                            {{-- report --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.description') }}</label>
                                <div class="col-sm-10" >
                                    <textarea id="report" disabled class="form-control" rows="20" style="resize: vertical" name="report">{{ $dailyReport->report }}</textarea>
                                </div>
                            </div>

                            {{-- Comments Report --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10" >
                                    <p style="font-size: 1em;color: rgb(60,141,188);font-weight: bold;">{{ __('content.comments') }}</p>
                                    <table id="comments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.date') }}</th>
                                                <th>{{ __('content.comment') }}</th>
                                                <th>{{ __('content.author') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->comments as $commentDailyReport)
                                                @if($commentDailyReport->section=='report')
                                                    <tr>
                                                        <td>{{ $commentDailyReport->date }}</td>
                                                        <td>{{ $commentDailyReport->comment }}</td>
                                                        <td>{{ $commentDailyReport->projectUser->user->person->fullName }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            {{-- equipments --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.equipments') }}</label>
                                <div class="col-sm-10" >
                                    <table id="equipments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.stakeholder') }}</th>
                                                <th>{{ __('content.equipment') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->equipments as $equipmentDailyReport)
                                                <tr>
                                                    <td>{{ $equipmentDailyReport->stakeholder->name }}</td>
                                                    <td>{{ $equipmentDailyReport->equipment->name }}</td>
                                                    <td>{{ $equipmentDailyReport->quantity }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Comments Equipments --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10" >
                                    <p style="font-size: 1em;color: rgb(60,141,188);font-weight: bold;">{{ __('content.comments') }}</p>
                                    <table id="comments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.date') }}</th>
                                                <th>{{ __('content.comment') }}</th>
                                                <th>{{ __('content.author') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->comments as $commentDailyReport)
                                                @if($commentDailyReport->section=='equipments')
                                                    <tr>
                                                        <td>{{ $commentDailyReport->date }}</td>
                                                        <td>{{ $commentDailyReport->comment }}</td>
                                                        <td>{{ $commentDailyReport->projectUser->user->person->fullName }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            {{-- positions --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.positions') }}</label>
                                <div class="col-sm-10" >
                                    <table id="positions" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.stakeholder') }}</th>
                                                <th>{{ __('content.position') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->positions as $positionDailyReport)
                                                <tr>
                                                    <td>{{ $positionDailyReport->stakeholder->name }}</td>
                                                    <td>{{ $positionDailyReport->position->name }}</td>
                                                    <td>{{ $positionDailyReport->quantity }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Comments Positions --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10" >
                                    <p style="font-size: 1em;color: rgb(60,141,188);font-weight: bold;">{{ __('content.comments') }}</p>
                                    <table id="comments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.date') }}</th>
                                                <th>{{ __('content.comment') }}</th>
                                                <th>{{ __('content.author') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->comments as $commentDailyReport)
                                                @if($commentDailyReport->section=='positions')
                                                    <tr>
                                                        <td>{{ $commentDailyReport->date }}</td>
                                                        <td>{{ $commentDailyReport->comment }}</td>
                                                        <td>{{ $commentDailyReport->projectUser->user->person->fullName }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            {{-- events --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.events') }}</label>
                                <div class="col-sm-10" >
                                    <table id="events" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.origin') }}</th>
                                                <th>{{ __('content.start') }}</th>
                                                <th>{{ __('content.finish') }}</th>
                                                <th>{{ __('content.impact') }}?</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->events as $eventDailyReport)
                                                <tr>
                                                    <td>{{ $eventDailyReport->cause }}</td>
                                                    <td>{{ $eventDailyReport->start }}</td>
                                                    <td>{{ $eventDailyReport->finish }}</td>
                                                    <td>{{ $eventDailyReport->haveImpact() }}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#modal-show-event">{{ __('content.open') }}</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Comments Events --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10" >
                                    <p style="font-size: 1em;color: rgb(60,141,188);font-weight: bold;">{{ __('content.comments') }}</p>
                                    <table id="comments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.date') }}</th>
                                                <th>{{ __('content.comment') }}</th>
                                                <th>{{ __('content.author') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->comments as $commentDailyReport)
                                                @if($commentDailyReport->section=='events')
                                                    <tr>
                                                        <td>{{ $commentDailyReport->date }}</td>
                                                        <td>{{ $commentDailyReport->comment }}</td>
                                                        <td>{{ $commentDailyReport->projectUser->user->person->fullName }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            {{-- attachments --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.attachments') }}</label>
                                <div class="col-sm-10" >
                                    <table id="attachments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.attachment') }}</th>
                                                <th>{{ __('content.description') }}</th>
                                                <th>{{ __('content.author') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->attachments as $attachmentDailyReport)
                                                <tr>
                                                    <td style="width:50%"><img src="{{ asset('images/agreement/dailyreports/attachments/'.$attachmentDailyReport->filename) }}" alt="" style="width:100%"></td>
                                                    <td style="width:40%">{{ $attachmentDailyReport->description }}</td>
                                                    <td style="width:10%">{{ $attachmentDailyReport->projectUser->user->person->fullName }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Comments Attachments --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10" >
                                    <p style="font-size: 1em;color: rgb(60,141,188);font-weight: bold;">{{ __('content.comments') }}</p>
                                    <table id="comments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.date') }}</th>
                                                <th>{{ __('content.comment') }}</th>
                                                <th>{{ __('content.author') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->comments as $commentDailyReport)
                                                @if($commentDailyReport->section=='attachments')
                                                    <tr>
                                                        <td>{{ $commentDailyReport->date }}</td>
                                                        <td>{{ $commentDailyReport->comment }}</td>
                                                        <td>{{ $commentDailyReport->projectUser->user->person->fullName }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <a class="btn btn-info btn-sm" href="{{ route('dailyReports.index') }}">{{ __('content.close') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Show Event in Daily Report --}}

    <div class="modal fade" id="modal-show-event">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{ __('content.show').' '.__('content.event') }}</h4>
                </div>
                <div class="modal-body">
                    <div>

                        {{-- Cause --}}
                            
                        <div class="form-group">
                            <label for="cause">{{__('content.cause')}}</label>
                            <input id="cause" disabled type="text" class="form-control" name="cause" value="{{ $eventDailyReport->cause ?? '' }}">
                        </div>

                        {{-- Start --}}

                        <div class="form-group">
                            <label for="start">{{__('content.start')}}</label>
                            <input id="start" disabled type="text" class="form-control" name="start" value="{{ $eventDailyReport->start ?? '' }}">
                        </div>

                        {{-- Finish --}}

                        <div class="form-group">
                            <label for="finish">{{__('content.start')}}</label>
                            <input id="finish" disabled type="text" class="form-control" name="finish" value="{{ $eventDailyReport->finish ?? '' }}">
                        </div>

                        {{-- Description --}}

                        <div class="form-group">
                            <label for="description">{{__('content.description')}}</label>
                            <textarea id="description" disabled class="form-control" name="description" style="resize: vertical">{{ $eventDailyReport->description ?? '' }}</textarea>
                        </div>

                        {{-- Have Impact --}}

                        <div class="form-group">
                            <div class="checkbox">
                                <label for="haveImpact">
                                    <input id="haveImpact" disabled name="haveImpact" type="checkbox" {{ $eventDailyReport->haveImpact ?? ''==1 ? 'checked' : '' }}>{{__('content.impact')}}?
                                </label>
                            </div>
                        </div>

                        {{-- Author --}}

                        <div class="form-group">
                            <label for="author">{{__('content.author')}}</label>
                            <input id="author" disabled type="text" class="form-control" name="author" value="{{ $eventDailyReport->user->name ?? '' }}">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                </div>
            </div>
        </div>
    </div>

@endsection