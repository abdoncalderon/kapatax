@extends('layouts.main')

@section('title', __('content.home'))

@section('section',__('messages.myApprovals'))

@section('level',__('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myApprovalOrders.index')}}"> {{ __('messages.myApprobals') }} </a></li>
        <li class="active">{{ __('content.show') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.purchaseOrder') }} # {{ $purchaseOrder->id }}</strong></h3> | 
                    @if ($purchaseOrder->status_id==1)
                        <a class="btn btn-success btn-sm" href="{{ route('myApprovalOrders.approve',[$purchaseOrder->id,2]) }}">{{  __('content.approve') }}</a> 
                        <a class="btn btn-danger btn-sm" href="{{ route('myApprovalOrders.reject',[$purchaseOrder->id,3]) }}">{{  __('content.reject') }}</a>
                    @endif
                </div>

                {{-- Start Form  --}}

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- applicant --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.applicant') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="applicant" disabled class="form-control" name="applicant_id" type="text" value="{{ $purchaseOrder->quotation->quotationRequest->purchaseRequest->needRequest->applicant->user->person->fullName }}">
                                </div>
                            </div>

                            
                            {{-- stakeholder --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.company') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="company" disabled class="form-control" name="company" type="text" value="{{ $purchaseOrder->quotation->quotationRequest->stakeholder->name }}">
                                </div>
                            </div>
                            
                            {{-- seller --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.seller') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="seller" disabled class="form-control" name="seller" type="text" value="{{ $purchaseOrder->quotation->seller->user->person->fullName }}">
                                </div>
                            </div>

                            {{-- send date --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.sendDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="buyer" disabled class="form-control" name="buyer" type="text" value="{{ dateFormat($purchaseOrder->date,'l j F Y') }}">
                                </div>
                            </div> --}}

                            {{-- total price --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.totalPrice') }} ( {{ __('messages.withoutTaxation') }} )</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="totalPrice" disabled class="form-control" name="totalPrice" type="number" value="{{ $purchaseOrder->quotation->totalPrice }}" min="0.0">
                                </div>
                            </div>

                            <hr>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.items') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <div>
                                        <br>
                                    </div>
                                    <table id="purchaseRequests" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">{{ __('content.name') }}</th>
                                                <th style="text-align: center">{{ __('content.quantity') }}</th>
                                                <th style="text-align: center">{{ __('content.unity') }}</th>
                                                <th style="text-align: center">{{ __('messages.unitPrice') }}</th>
                                                <th style="text-align: center">{{ __('messages.deliveryDate') }}</th>
                                                <th style="text-align: center">{{ __('content.subtotal') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($purchaseOrder->purchaseOrderItems as $purchaseOrderItem)
                                                <tr>
                                                    <td style="text-align: left; width: 40%;">{{ $purchaseOrderItem->material->name }}</td>
                                                    <td style="text-align: right; width: 8%;">{{ $purchaseOrderItem->quantity }}</td>
                                                    <td style="text-align: center; width: 8%;">{{ $purchaseOrderItem->unity->code }}</td>
                                                    <td style="text-align: right; width: 8%;">{{ $purchaseOrderItem->unitPrice }}</td>
                                                    <td style="text-align: center; width: 12%;">{{ dateFormat($purchaseOrderItem->deliveryDate, 'd-m-Y') }}</td>
                                                    <td style="text-align: right; width: 8%;">{{ number_format($purchaseOrderItem->quantity * $purchaseOrderItem->unitPrice,2,',','.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href=" {{ route('myApprovalOrders.index') }} ">{{ __('messages.goBack') }}</a>
                        
                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection