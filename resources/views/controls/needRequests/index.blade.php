@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('messages.needRequests'))

@section('level', __('content.purchases'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('messages.needRequests') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.all') }}</strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.applicant') }}</th>
                            <th>{{ __('messages.approvedBy') }}</th>
                            <th>{{ __('content.description') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($needRequests as $needRequest)
                            <tr>
                                <td>{{ $needRequest->id }}</td>
                                <td>{{ $needRequest->date }}</td>
                                <td>{{ $needRequest->applicant->user->person->fullName }}</td>
                                <td>{{ $needRequest->approver->person->fullName }}</td>
                                <td>{{ $needRequest->description }}</td>
                                <td>{{ $needRequest->status() }}</td>
                                <td>
                                    @if ($needRequest->status_id == 3)
                                        <a class="btn btn-info btn-xs" href="{{ route('needRequests.review', $needRequest) }}">{{ __('content.review') }}</a>
                                    @else
                                        <a class="btn btn-default btn-xs" href="{{ route('needRequests.show', $needRequest) }}">{{ __('content.show') }}</a>
                                    @endif
                                    
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('home') }} ">{{ __('messages.goBack') }}</a>

            </div>

        </div>

    </section>

@endsection