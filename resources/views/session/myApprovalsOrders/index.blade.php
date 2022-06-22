@extends('layouts.main')

@section('title', __('content.home'))

@section('section', __('messages.myApprovals'))

@section('level', __('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('messages.myApprovals') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.purchaseOrders') }}</strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('messages.requestedBy') }}</th>
                            <th>{{ __('messages.quotedBy') }}</th>
                            <th>{{ __('content.supplier') }}</th>
                            <th>{{ __('content.amount') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($purchaseOrders as $purchaseOrder)
                            <tr>
                                <td>{{ $purchaseOrder->id }}</td>
                                <td>{{ $purchaseOrder->quotation->quotationRequest->purchaseRequest->needRequest->projectUser->user->person->fullName }}</td>
                                <td>{{ $purchaseOrder->quotation->quotationRequest->buyer->user->person->fullName }}</td>
                                <td>{{ $purchaseOrder->quotation->quotationRequest->stakeholder->name }}</td>
                                <td>{{ $purchaseOrder->quotation->totalPrice }}</td>
                                <td>{{ $purchaseOrder->status() }}</td>
                                <td>
                                    
                                    @if ( $purchaseOrder->status_id == 1 )
                                        <a class="btn btn-info btn-xs" href="{{ route('myApprovalOrders.show', $purchaseOrder) }}">{{ __('content.review') }}</a>
                                    @else
                                        <a class="btn btn-default btn-xs" href="{{ route('myApprovalOrders.show', $purchaseOrder) }}">{{ __('content.show') }}</a>
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