@extends('layouts.main')

@section('title', __('content.user'))

@section('section', __('content.users'))

@section('level', __('content.production'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('workbook_settings_users')}}"> {{ __('content.users') }} </a></li>
        <li class="active">{{ __('content.locations') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.locationsAssignedTo') }} {{ $user->name }} </strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('locationsUsers.create', $user) }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.location') }}</th>
                            <th>{{ __('content.collaborate') }}</th>
                            <th>{{ __('content.checkout') }}</th>
                            <th>{{ __('content.approve') }}</th>
                            <th>{{ __('messages.receiveEmailNotification') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($user->locations as $locationUser)
                            <tr>
                                <td>{{ $locationUser->location->name }}</td>
                                <td>{{ yesNo($locationUser->dailyreport_collaborator) }}</td>
                                <td>{{ yesNo($locationUser->dailyreport_approver) }}</td>
                                <td>{{ yesNo($locationUser->folio_approver) }}</td>
                                <td>{{ yesNo($locationUser->receive_notification) }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('locationsUsers.edit', $locationUser)}}">{{ __('content.edit')}}</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('locationsUsers.destroy', $locationUser)}}">{{ __('content.delete')}}</a>
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