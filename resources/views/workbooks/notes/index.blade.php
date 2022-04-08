@extends('layouts.main')

@section('title', __('content.notes'))

@section('section', __('content.notes'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.notes') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.notes') }}</strong></h3> | 
            </div>

            <form method="GET" action="{{ route('notes.filterLocation') }}" class="horizontal">

                <div class="box-body">

                    <div class="col-sm-4 col-md-6 col-lg-10">

                        {{-- location --}}
                                    
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                            <div class="col-sm-8" >
                                <select id="location" name="location" class="form-control" required style="width: 100%;" >
                                    <option value="">{{__('messages.select')}} {{__('content.location')}}</option>
                                    @foreach (user_managed_locations(current_user()) as $locationProjectUser)
                                        <option value="{{ $locationProjectUser->location_id }}"
                                            @if($locationProjectUser->location_id==$location->id):
                                                selected="selected"
                                            @endif
                                        >{{ $locationProjectUser->location->name }}</option>
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
                            <th>{{ __('content.author') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($notes as $note)
                            <tr>
                                <td>{{ $note->location }}</td>
                                <td>{{ date('Y-M-d',strtotime($note->date)) }}</td>
                                <td>{{ $note->person }}</td>
                                <td>
                                    @if($note->status==0)
                                        @if($note->project_user_id==current_user()->id)
                                            <a target="_blank" style="margin: 0.3em" class="btn btn-warning btn-xs" href="{{ route('notes.edit',$note) }}">{{ __('content.edit') }}</a>
                                        @endif
                                    @else
                                        <a target="_blank" style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('notes.show',$note) }}">{{ __('content.show') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('folios.index') }} ">{{ __('content.return') }}</a>

            </div>

        </div>

    </section>

@endsection