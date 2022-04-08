@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('messages.quotationRequests'))

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
                <h3 class="box-title"><strong>{{ __('messages.quotationRequests') }}</strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('messages.processedBy') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($quotationRequests as $quotationRequest)
                            <tr>
                                <td>{{ $quotationRequest->id }}</td>
                                <td>{{ $quotationRequest->date }}</td>
                                <td>{{ $quotationRequest->projectUser->user->person->fullName }}</td>
                                <td>{{ $quotationRequest->status() }}</td>
                                <td>
                                    @if ($quotationRequest->status_id==0)
                                        <a class="btn btn-info btn-xs" href="{{ route('quotationRequests.open', $quotationRequest) }}">{{ __('content.open') }}</a>
                                    @elseif ($quotationRequest->quotation != null)
                                        <a class="btn btn-default btn-xs" href="{{ route('quotations.index', $quotationRequest) }}">{{ __('content.quotations') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('home') }} ">{{ __('content.return') }}</a>

            </div>

        </div>

    </section>

@endsection