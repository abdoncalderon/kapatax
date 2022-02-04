@extends('layouts.main')

@section('title', __('content.folio'))

@section('section', __('content.folios'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.folios') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Error Messages --}}

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ $errors->first() }}
                </div>
            @endif
            
            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.folio') }}</strong></h3> | 
                @if(user_have_permission('workbook_create_folio'))
                    <a class="btn btn-success btn-sm" href="{{ route('folios.create') }}">{{ __('content.insert') }}</a>
                @endif
            </div>

            <form method="GET" action="{{ route('folios.filterLocation') }}" class="horizontal">

                <div class="box-body">
                    <div class="col-sm-4 col-md-6 col-lg-10">

                        {{-- location --}}
                                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                            <div class="col-sm-8" >
                                <select id="location" name="location" class="form-control" required style="width: 100%;" >
                                    <option value="">{{__('messages.select')}} {{__('content.location')}}</option>
                                    @foreach (user_managed_locations(current_user()) as $locationUser)
                                        <option value="{{ $locationUser->location_id }}"
                                            @if($locationUser->location_id==$location_id):
                                                selected="selected"
                                            @endif
                                        >{{ $locationUser->location->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button class="col-sm-2 btn btn-success pull-left btn-sm" type="submit">{{ __('content.search') }}</button>
                        </div>
    
                    </div>
                </div>

            </form>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.location') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($folios as $folio)
                            <tr>
                                <td>{{ $folio->name }}</td>
                                <td>{{ date('Y-M-d',strtotime($folio->date)) }}</td>
                                <td>{{ $folio->number }}</td>
                                <td>{{ $folio->status() }}</td>
                                <td>
                                    @if(is_valid_date_for_open_folio(strtotime($folio->date),$folio->location))
                                        @if(user_have_permission('workbook_create_dailyreport'))
                                            <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('dailyReports.create',$folio) }}">{{ __('content.dailyreport') }}</a>
                                        @endif
                                        @if(user_have_permission('workbook_create_note'))
                                            <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('notes.create',$folio) }}">{{ __('content.note') }}</a>
                                        @endif
                                    @endif
                                    @if(user_have_permission('workbook_edit_sequence'))
                                        <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('folios.edit',$folio) }}">{{ __('content.edit') }} {{ __('content.number') }}</a>
                                    @endif
                                    @if((user_have_permission('workbook_print_folio'))&&(($folio->daily_reports->count()>0)||($folio->notes->count()>0)))
                                        <a target="_blank" style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('folios.print',$folio) }}">{{ __('content.print') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

            </div>

        </div>

    </section>

    

@endsection