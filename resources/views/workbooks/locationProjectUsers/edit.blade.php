@extends('layouts.main')

@section('title', __('content.user'))

@section('section', __('content.users'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('users.index')}}"> {{ __('content.users') }} </a></li>
        <li><a href="{{ route('locationProjectUsers.index',$projectUser)}}"> {{ __('content.locations') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">

                 
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit').' '.__('content.assignment').' '.$projectUser->user->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('locationProjectUsers.update',$locationProjectUser) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <input id="location" disabled class="form-control" type="text" name="location" value="{{ $locationProjectUser->location->name }}">
                                </div>
                            </div>

                            {{-- Daily Report Collaborator  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.dailyreport') }} {{ __('content.collaborator') }}</label>
                                <div class="col-sm-10" >
                                    <input id="dailyreport_collaborator" type="checkbox" name="dailyreport_collaborator" {{ checked($locationProjectUser->dailyreport_collaborator) }}>
                                </div>
                            </div>

                            {{-- Daily Report Approver  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.dailyreport') }} {{ __('content.approver') }}</label>
                                <div class="col-sm-10" >
                                    <input id="dailyreport_approver" type="checkbox" name="dailyreport_approver" {{ checked($locationProjectUser->dailyreport_approver) }}>
                                </div>
                            </div>

                            {{-- Folio Approver  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.folio') }} {{ __('content.approver') }}</label>
                                <div class="col-sm-10" >
                                    <input id="folio_approver" type="checkbox" name="folio_approver" {{ checked($locationProjectUser->folio_approver) }}>
                                </div>
                            </div>

                            {{-- Receive Notification  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.receive') }} {{ __('content.notification') }}</label>
                                <div class="col-sm-10" >
                                    <input id="receive_notification" type="checkbox" name="receive_notification" {{ checked($locationProjectUser->receive_notification) }}>
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