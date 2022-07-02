@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section',__('messages.purchaseOrder'))

@section('level',__('content.purchases'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('purchaseOrders.index')}}"> {{ __('messages.purchaseOrder') }} </a></li>
        <li class="active">{{ __('content.open') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.purchaseOrder') }} # {{ $purchaseOrder->id }}</strong></h3> |
                    
                </div>

                {{-- Start Form  --}}

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

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
                                                <th style="text-align: center">{{ __('content.description') }}</th>
                                                <th style="text-align: center">{{ __('messages.equivalentMaterial') }}</th>
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
                                                    <td>{{ $purchaseOrderItem->description }}</td>
                                                    <td>
                                                        @if ( $purchaseOrderItem->material_id <> null )
                                                            {{ $purchaseOrderItem->material->name }}
                                                        @endif
                                                    </td>
                                                    <td style="text-align: right; width: 5%;">{{ $purchaseOrderItem->quantity }}</td>
                                                    <td style="text-align: center; width: 5%;">{{ $purchaseOrderItem->unity->code }}</td>
                                                    <td style="text-align: right; width: 9%;">{{ $purchaseOrderItem->unitPrice }}</td>
                                                    <td style="text-align: center; width: 10%;">{{ dateFormat($purchaseOrderItem->deliveryDate, 'd-M-Y') }}</td>
                                                    <td style="text-align: right; width: 7%;">{{ number_format($purchaseOrderItem->quantity * $purchaseOrderItem->unitPrice,2,',','.') }}</td>
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
                        <a class="btn btn-danger btn-sm" href="{{ route('purchaseOrders.index') }}">{{ __('messages.goBack') }}</a>
                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    


@endsection