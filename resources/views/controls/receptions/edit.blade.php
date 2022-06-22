@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('content.receptions'))

@section('level', __('content.controls'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('receptions.index')}}"> {{ __('content.receptions') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.addItemsReceived') }}</strong></h3>
                </div>

           
               

                {{-- Form Body --}}

                <div class="box-body">

                    {{-- Fields --}}

                    <div class="col-sm-11 col-md-11 col-lg-11">

                        {{-- receiver id --}}

                        <input type="hidden" id="receiver_id" name="receiver_id" value="{{ current_user()->id }}">

                        {{-- purchase order --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.purchaseOrder') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="purchase_order_id" disabled type="text" class="form-control" name="purchase_order_id" value="{{ $reception->purchase_order_id }}" placeholder="{{ __('content.number') }}" required>
                            </div>
                        </div>

                        {{-- type --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.purchaseOrder') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="type" disabled type="text" class="form-control" name="type_id" value="{{ $reception->type() }}" placeholder="{{ __('content.number') }}" required>
                            </div>
                        </div>

                        {{-- document number --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.reference') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="documentNumber" disabled type="text" class="form-control" name="documentNumber" value="{{ $reception->documentNumber }}" placeholder="{{ __('messages.documentNumber') }}" required>
                            </div>
                        </div>

                        {{-- Filename --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{__('content.file')}}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="file" type="text" class="form-control" name="file" accept="application/pdf" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.itemsReceived') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addItemReceived">
                                    {{ __('content.add') }}
                                </button>
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
                                            <th style="text-align: center">{{ __('content.actions') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reception->receptionItems as $receptionItem)
                                            <tr>
                                                <td>{{ $receptionItem->purchaseOrderItem->material->name }}</td>
                                                
                                                <td style="text-align: right; width: 10%;">{{ $receptionItem->quantity }}</td>
                                                <td style="text-align: center; width: 10%;">{{ $receptionItem->purchaseOrderItem->unity->code }}</td>
                                                <td style="text-align: right; width: 10%;">{{ $receptionItem->purchaseOrderItem->unitPrice }}</td>
                                                {{-- <td style="text-align: center; width: 15%;">{{ dateFormat($receptionItem->deliveryDate, 'd-m-Y') }}</td> --}}
                                                {{-- <td style="text-align: right; width: 10%;">{{ number_format($receptionItem->quantity * $receptionItem->unitPrice,2,',','.') }}</td> --}}
                                                <td style="width: 15%;">
                                                    <a class="btn btn-danger btn-xs" href="{{ route('receptionItems.destroy',$receptionItem)  }}">{{ __('content.delete') }}</a>
                                                </td>
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
                    <a class="btn btn-danger btn-sm" href=" {{ route('receptions.index') }} ">{{ __('content.cancel') }}</a>
                    <a class="btn btn-success btn-sm" href=" {{ route('receptions.process',$reception) }} ">{{ __('content.process') }}</a>
                </div>
   
            </div>
   
        </div>
   
    </section>

    {{-- Add Items Received --}}

    <div class="modal fade" id="addItemReceived">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('receptionItems.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.item') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
    
                            {{-- reception --}}
    
                            <input id="reception" type="hidden" name="reception_id" value="{{ $reception->id }}">

                            {{-- Purchase Item --}}
    
                            <div class="form-group">
                                <label for="purchase_order_item_id">{{__('content.unity')}}</label>
                                <select id="purchaseOrderItem" class="form-control" name="purchase_order_item_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.item')}}</option>
                                    @foreach ($reception->purchaseOrder->purchaseOrderItems as $purchaseOrderItem)
                                        @if ($purchaseOrderItem->consumptionAvailable>0)
                                            <option value="{{ $purchaseOrderItem->id }}">{{ $purchaseOrderItem->material->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
    
                            {{-- Quantity --}}
    
                            <div class="form-group">
                                <label for="quantity">{{__('content.quantity')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-12">
                                    <input id="quantity" type="number" class="form-control" name="quantity" value="0" min="0" max="0" style="width: 15%;" required>
                                    <input id="maximum" type="text" class="form-control" name="maximum" style="width: 15%;" disabled>
                                </div>
                                
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
            
        </div>

    </div>
       
@endsection