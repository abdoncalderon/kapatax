@extends('layouts.main')

@section('title', __('content.user'))

@section('section', __('content.users'))

@section('level', __('content.agreement'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projectUsers.index')}}"> {{ __('content.users') }} </a></li>
        <li><a href="{{ route('locationProjectUsers.index',$projectUser)}}"> {{ __('content.locations') }} </a></li>
        <li class="active">{{ __('content.assign') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.assignLocationTo').' '.$projectUser->user->person->fullName }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('locationProjectUsers.store',$projectUser) }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- projectUser --}}
    
                            <input id="project_user_id" hidden type="text" name="project_user_id" value="{{ $projectUser->id }}">

                            {{-- location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <select id="location_id" name="location_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.location')}}</option>
                                        @foreach ($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            

                            {{-- Daily Report Collaborator  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.dailyreport') }} {{ __('content.collaborator') }}</label>
                                <div class="col-sm-10" >
                                    <input id="dailyreport_collaborator" type="checkbox" name="dailyreport_collaborator">
                                </div>
                            </div>

                            {{-- Daily Report Approver  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.dailyreport') }} {{ __('content.approver') }}</label>
                                <div class="col-sm-10" >
                                    <input id="dailyreport_approver" type="checkbox" name="dailyreport_approver">
                                </div>
                            </div>

                            {{-- Folio Approver  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.folio') }} {{ __('content.approver') }}</label>
                                <div class="col-sm-10" >
                                    <input id="folio_approver" type="checkbox" name="folio_approver">
                                </div>
                            </div>

                            {{-- Receive Notification  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.receive') }} {{ __('content.notification') }}</label>
                                <div class="col-sm-10" >
                                    <input id="receive_notification" type="checkbox" name="receive_notification">
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('locationProjectUsers.index',$projectUser) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection


