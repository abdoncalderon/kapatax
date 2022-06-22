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
                                                @if ($purchaseOrder->status_id==0)
                                                    <th style="text-align: center">{{ __('content.actions') }}</th>
                                                @endif
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
                                                    <td style="text-align: right; width: 10%;">{{ $purchaseOrderItem->quantity }}</td>
                                                    <td style="text-align: center; width: 10%;">{{ $purchaseOrderItem->unity->code }}</td>
                                                    <td style="text-align: right; width: 10%;">{{ $purchaseOrderItem->unitPrice }}</td>
                                                    <td style="text-align: center; width: 15%;">{{ dateFormat($purchaseOrderItem->deliveryDate, 'd-m-Y') }}</td>
                                                    <td style="text-align: right; width: 10%;">{{ number_format($purchaseOrderItem->quantity * $purchaseOrderItem->unitPrice,2,',','.') }}</td>
                                                    @if ($purchaseOrder->status_id==0)
                                                        <td style="width: 15%;">
                                                            <a class="btn btn-info btn-xs" href="{{ route('purchaseOrderItems.associate',$purchaseOrderItem)  }}">{{ __('content.material') }}</a>
                                                            <a class="btn btn-danger btn-xs" href="{{ route('purchaseOrderItems.destroy',$purchaseOrderItem)  }}">{{ __('content.delete') }}</a>
                                                        </td>
                                                    @endif
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
                        <a class="btn btn-danger btn-sm" href="{{ route('quotations.index') }}">{{ __('content.return') }}</a>
                        @if (($purchaseOrder->status_id==0)&&(all_items_associated($purchaseOrder)))
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#sendToApprove">{{ __('messages.sendToApprove') }}</button>
                        @endif
                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Add Need Request Item --}}

    <div class="modal fade" id="sendToApprove">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('purchaseOrders.sendToApprove',$purchaseOrder) }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('messages.sendToApprove') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
    
                            {{-- approver --}}
    
                            <div class="form-group">
                                <label for="approver">{{__('content.approver') }}</label>
                                <select id="approver" class="form-control" name="approver_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.approver')}}</option>
                                    @foreach ($approvers as $approver)
                                        <option value="{{ $approver->person_id }}">{{ $approver->person->fullName }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.send')}}</button>
                    </div>
                </div>
            </form>
            
        </div>
    </div>


@endsection