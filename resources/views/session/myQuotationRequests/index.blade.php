@extends('layouts.main')

@section('title', __('content.home'))

@section('section', __('messages.myQuotations'))

@section('level', __('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('messages.myQuotations') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.myQuotationRequests') }}</strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.company') }}</th>
                            <th>{{ __('content.buyer') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($myQuotationRequests as $myQuotationRequest)
                            <tr>
                                <td>{{ $myQuotationRequest->id }}</td>
                                <td>{{ $myQuotationRequest->sendDate }}</td>
                                <td>{{ active_stakeholder($myQuotationRequest->buyer->user->person)->stakeholder->name }}</td>
                                <td>{{ $myQuotationRequest->buyer->user->person->fullName }}</td>
                                <td>{{ $myQuotationRequest->status() }}</td>
                                <td>
                                    @if (($myQuotationRequest->status_id==0) || ($myQuotationRequest->status_id==4))
                                        <a class="btn btn-info btn-xs" href="{{ route('myQuotationRequests.open', $myQuotationRequest) }}">{{ __('content.open') }}</a>
                                   @else
                                        <a class="btn btn-default btn-xs" href="{{ route('myQuotationRequests.open', $myQuotationRequest) }}">{{ __('content.show') }}</a>
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