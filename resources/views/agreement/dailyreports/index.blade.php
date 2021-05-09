@extends('layouts.main')

@section('title', __('content.dailyreports'))

@section('section', __('content.dailyreports'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.dailyreports') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Messages --}}
            @if(session('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session('message') }}
                </div>
            @endif

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.dailyreports') }}</strong></h3> | 
            </div>

            <form method="GET" action="{{ route('dailyReports.filterLocation') }}" class="horizontal">

                <div class="box-body">

                    <div class="col-sm-4 col-md-6 col-lg-10">

                        {{-- location --}}
                                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                            <div class="col-sm-8" >
                                <select id="location" name="location" class="form-control" required style="width: 100%;" >
                                    <option value="">{{__('messages.select')}} {{__('content.location')}}</option>
                                    @foreach (auth()->user()->locations as $locationUser)
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
                            <th>{{ __('content.turn') }}</th>
                            <th>{{ __('content.actions') }}</th>

                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($dailyReports as $dailyReport)
                            <tr>
                                <td>{{ $dailyReport->location }}</td>
                                <td>{{ date('Y-M-d',strtotime($dailyReport->date)) }}</td>
                                <td>{{ $dailyReport->turn }} {{ $dailyReport->status() }}</td>
                                <td>
                                    @if($dailyReport->status==0)
                                        <a target="_blank" class="btn btn-warning btn-xs" href="{{ route('dailyReports.edit',$dailyReport) }}" >{{ __('content.edit') }}</a>
                                    @elseif($dailyReport->status==1)
                                        <a target="_blank" class="btn btn-success btn-xs" href="{{ route('dailyReports.review',$dailyReport) }}">{{ __('content.Approve') }}</a>
                                    @else 
                                        <a target="_blank" class="btn btn-info btn-xs" href="{{ route('dailyReports.show',$dailyReport) }}">{{ __('content.show') }}</a>
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