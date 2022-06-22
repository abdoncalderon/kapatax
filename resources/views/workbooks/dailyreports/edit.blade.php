@extends('layouts.main')

@section('title', ' - '.date('Y-M-d',strtotime($dailyReport->folio->date)).' - '.$dailyReport->folio->location->name.' - '.$dailyReport->turn->name)

@section('section', __('content.dailyreports'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('dailyReports.index',$dailyReport->folio->location->id)}}"> {{ __('content.dailyreports') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit').' '.__('content.dailyreport') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('dailyReports.update',$dailyReport) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Date --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                                <div class="col-sm-10" >
                                    <input id="date" disabled type="text" class="form-control" name="date" value="{{ $dailyReport->folio->date }}">
                                </div>
                            </div>
                            
                            {{-- Location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <input id="date" disabled type="text" class="form-control" name="date" value="{{ $dailyReport->folio->location->name }}">
                                </div>
                            </div>

                            {{-- Turn --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.turn') }}</label>
                                <div class="col-sm-10" >
                                    <input id="turn" disabled type="text" class="form-control" name="turn" value="{{ $dailyReport->turn->name }}">
                                </div>
                            </div>

                            {{-- Responsible --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.responsible') }}</label>
                                <div class="col-sm-10" >
                                    <input id="turn" disabled type="text" class="form-control" name="turn" value="{{ $dailyReport->responsible()->person->fullName }}">
                                </div>
                            </div>


                            {{-- report --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.description') }}</label>
                                <div class="col-sm-10" >
                                    <textarea id="report" class="form-control @error('report') is-invalid @enderror" rows="20" style="resize: vertical" maxlength="65000" name="report" required autocomplete="report">{{ $dailyReport->report }}</textarea>
                                    @error('report')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <hr>

                            {{-- equipments --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.equipments') }}</label>
                                <div class="col-sm-10" >
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-equipments">
                                        {{ __('content.add') }}
                                    </button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-clone-equipments">
                                        {{ __('content.clone').' '.__('content.from').'...' }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="equipments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.stakeholder') }}</th>
                                                <th>{{ __('content.equipment') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->equipments as $equipmentDailyReport)
                                                <tr>
                                                    <td>{{ $equipmentDailyReport->stakeholder->name }}</td>
                                                    <td>{{ $equipmentDailyReport->equipment->name }}</td>
                                                    <td>{{ $equipmentDailyReport->quantity }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('equipmentDailyReports.destroy',$equipmentDailyReport) }}">{{ __('content.delete') }}</a>
                                                    </td>
                                                </tr>
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
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-positions">
                                        {{ __('content.add') }}
                                    </button>
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-clone-positions">
                                        {{ __('content.clone').' '.__('content.from').'...' }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="positions" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.stakeholder') }}</th>
                                                <th>{{ __('content.position') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->positions as $positionDailyReport)
                                                <tr>
                                                    <td>{{ $positionDailyReport->stakeholder->name }}</td>
                                                    <td>{{ $positionDailyReport->position->name }}</td>
                                                    <td>{{ $positionDailyReport->quantity }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('positionDailyReports.destroy',$positionDailyReport) }}">{{ __('content.delete') }}</a>
                                                    </td>
                                                </tr>
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
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-events">
                                        {{ __('content.add') }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="events" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.cause') }}</th>
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
                                                        <a class="btn btn-info btn-xs" href="{{ route('eventDailyReports.destroy',$eventDailyReport) }}">{{ __('content.delete') }}</a>
                                                    </td>
                                                </tr>
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
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-attachments">
                                        {{ __('content.add') }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="attachments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.attachment') }}</th>
                                                <th>{{ __('content.description') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($dailyReport->attachments as $attachmentDailyReport)
                                                <tr>
                                                    <td style="width:50%"><img src="{{ asset('documents/agreement/dailyreports/attachments/'.$attachmentDailyReport->filename) }}" alt="" style="width:100%"></td>
                                                    <td style="width:40%">{{ $attachmentDailyReport->description }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('attachmentDailyReports.destroy',$attachmentDailyReport) }}">{{ __('content.delete') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- project user_id --}}
    
                            <input id="project_user_id" hidden type="text" name="project_user_id" value="{{ current_user()->id }}">

                            {{-- Status --}}
    
                            <input id="status" hidden type="text" name="status" value="{{ $dailyReport->status }}">

                            {{-- Approved by --}}
    
                            <input id="reviewedby" hidden type="text" name="reviewedby" value="0">

                            {{-- Reviewed by --}}
    
                            <input id="approvedby" hidden type="text" name="approvedby" value="0">

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button id="save" type="submit" class="btn btn-success btn-sm">{{ __('content.save') }}</button>
                        @if(user_have_profile_in_location('dailyreport_approver',$dailyReport->folio->location))
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-save-dailyreport">{{ __('messages.saveAndFinish') }}</button>
                        @endif
                        <a class="btn btn-danger btn-sm" href="{{ route('dailyReports.index',$dailyReport->folio->location->id) }}">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Add Equipments in Daily Report --}}

    <div class="modal fade" id="modal-equipments">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('equipmentDailyReports.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.equipment') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
    
                            {{-- Daily Report --}}
    
                            <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">
    
                            {{-- Stakeholder --}}
    
                            <div class="form-group">
                                <label for="stakeholder_id">{{__('content.stakeholder')}}</label>
                                <select id="stakeholder_id" name="stakeholder_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.stakeholder')}}</option>
                                    @foreach ($stakeholders as $stakeholder)
                                        <option value="{{ $stakeholder->id }}">{{ $stakeholder->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            {{-- Equipment --}}
    
                            <div class="form-group">
                                <label for="equipment_id">{{__('content.equipment')}}</label>
                                <select id="equipment_id" name="equipment_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.equipment')}}</option>
                                    @foreach ($equipments as $equipment)
                                        <option value="{{ $equipment->id }}">{{ $equipment->name }}</option>
                                    @endforeach
                                </select>
                            </div>
    
                            {{-- Quantity --}}
    
                            <div class="form-group">
                                <label for="quantity">{{__('content.quantity')}}</label>
                                <input id="quantity" type="number" class="form-control" name="quantity" value="1" min="1" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

    {{-- Add Positions in Daily Report --}}

    <div class="modal fade" id="modal-positions">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('positionDailyReports.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.position') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- Daily Report --}}

                            <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">

                            {{-- Stakeholder --}}

                            <div class="form-group">
                                <label for="stakeholder">{{__('content.stakeholder')}}</label>
                                <select id="stakeholder_id" name="stakeholder_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.stakeholder')}}</option>
                                    @foreach ($stakeholders as $stakeholder)
                                        <option value="{{ $stakeholder->id }}">{{ $stakeholder->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Position --}}

                            <div class="form-group">
                                <label for="position_id">{{__('content.position')}}</label>
                                <select id="position_id" name="position_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.position')}}</option>
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- Quantity --}}

                            <div class="form-group">
                                <label for="quantity">{{__('content.quantity')}}</label>
                                <input id="quantity" type="number" class="form-control" name="quantity" value="1" min="1" required>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

    {{-- Clone Equipments in Daily Report --}}

    <div class="modal fade" id="modal-clone-equipments">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('equipmentDailyReports.clone') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.clone').' '.__('content.equipments').' '.__('content.from').'...' }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>

                            {{-- Daily Report --}}

                            <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">
                            
                            {{-- Old Daily Reports --}}
                            
                            <div class="form-group">
                                <label class="col-sm-4 control-label">{{ __('content.dailyreports') }} {{ __('content.olds') }} </label>
                                <select id="old_daily_report_id" name="old_daily_report_id" class="form-control" required>
                                    <option value="">{{ __('messages.select') }} {{ __('content.date') }} {{ __('content.turn') }}</option>
                                    @foreach ($oldDailyReports as $oldDailyReport)
                                        <option value="{{ $oldDailyReport->old_daily_report_id }}">{{ $oldDailyReport->date }} - {{ $oldDailyReport->turn }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.clone')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Clone Positions in Daily Report --}}

    <div class="modal fade" id="modal-clone-positions">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('positionDailyReports.clone') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.clone').' '.__('content.positions').' '.__('content.from').'...' }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>

                            {{-- Daily Report --}}

                            <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">
                            
                            {{-- Old Daily Reports --}}
                            
                            <div class="form-group">
                                <label class="col-sm-4 control-label">{{ __('content.dailyreports') }} {{ __('content.olds') }} </label>
                                <select id="old_daily_report_id" name="old_daily_report_id" class="form-control" required>
                                    <option value="">{{ __('messages.select') }} {{ __('content.date') }} {{ __('content.turn') }}</option>
                                    @foreach ($oldDailyReports as $oldDailyReport)
                                        <option value="{{ $oldDailyReport->old_daily_report_id }}">{{ $oldDailyReport->date }} - {{ $oldDailyReport->turn }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.clone')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Add Events in Daily Report --}}

    <div class="modal fade" id="modal-events">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('eventDailyReports.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.event') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- Daily Report --}}
    
                            <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">
    
                            {{-- Cause --}}
    
                            <div class="form-group">
                                <label for="cause">{{__('content.cause')}}</label>
                                <select id="cause" name="cause" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.cause')}}</option>
                                    <option value="{{__('content.internal')}}">{{__('content.internal')}}</option>
                                    <option value="{{__('content.external')}}">{{__('content.external')}}</option>
                                    <option value="{{__('content.climate')}}">{{__('content.climate')}}</option>
                                </select>
                            </div>
    
                            {{-- Start --}}
    
                            <div class="form-group">
                                <label for="start">{{__('content.start')}}</label>
                                <input id="start" type="time" class="form-control" name="start" required>
                            </div>
    
                            {{-- Finish --}}
    
                            <div class="form-group">
                                <label for="finish">{{__('content.start')}}</label>
                                <input id="finish" type="time" class="form-control" name="finish" required>
                            </div>
    
                            {{-- Description --}}
    
                            <div class="form-group">
                                <label for="description">{{__('content.description')}}</label>
                                <textarea id="description" class="form-control" name="description" style="resize: vertical" required></textarea>
                            </div>
    
                            {{-- Have Impact --}}
    
                            <div class="form-group">
                                <div class="checkbox">
                                    <label for="haveImpact">
                                        <input id="haveImpact" name="haveImpact" type="checkbox">{{__('content.impact')}}?
                                    </label>
                                </div>
                            </div>
    
                            {{-- project_user_id --}}
    
                            <input id="project_user_id" hidden type="text" name="project_user_id" value="{{ current_user()->id }}">
    
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

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
                            <input id="author" disabled type="text" class="form-control" name="author" value="{{ $eventDailyReport->projectUser->user->person->fullName ?? '' }}">
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Attachemnts in Daily Report --}}

    <div class="modal fade" id="modal-attachments">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('attachmentDailyReports.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.attachment') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- Daily Report --}}

                            <input id="daily_report_id" hidden type="text" name="daily_report_id" value="{{ $dailyReport->id }}">

                            {{-- Filename --}}

                            <div class="form-group">
                                <label for="image">{{__('content.image')}}</label>
                                <input id="image" type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg,application/pdf" required>
                            </div>


                            {{-- Description --}}

                            <div class="form-group">
                                <label for="description">{{__('content.description')}}</label>
                                <textarea id="description" class="form-control" name="description" style="resize: vertical"></textarea>
                            </div>

                            {{-- Author --}}

                            <input id="project_user_id" hidden type="text" name="project_user_id" value="{{ current_user()->id }}">
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- Save & Finalize Daily Report--}}

    <div class="modal fade" id="modal-save-dailyreport">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><strong>{{ __('content.save').' & '.__('content.close').' '.__('content.dailyreport') }}</strong></h4>
                </div>
                <div class="modal-body">
                    <div>
                        <p class="">{{ __('messages.confirmreviewdailyreport') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.no')}}</button>
                    <button type="button" class="btn btn-primary" onclick="$('#status').val('1');$('#reviewedby').val('{{ current_user()->id }}');$('#save').click();">{{__('content.yes')}}</button>
                </div>
            </div>
        </div>
    </div>

@endsection
