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
                    <h3 class="box-title"><strong>{{ __('messages.showReceivedItems') }}</strong></h3>
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
                            <label class="col-sm-2 control-label">{{ __('content.type') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="type" disabled type="text" class="form-control" name="type_id" value="{{ $reception->type() }}" placeholder="{{ __('content.number') }}" required>
                            </div>
                        </div>

                        {{-- received by --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.receivedBy') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="receiver" disabled type="text" class="form-control" name="receiver_id" value="{{ $reception->receiver->user->person->fullName }}" >
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
                                <div>
                                    <br>
                                </div>
                                <table id="purchaseRequests" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="text-align: center">{{ __('content.date') }}</th>
                                            <th style="text-align: center">{{ __('content.description') }}</th>
                                            <th style="text-align: center">{{ __('content.quantity') }}</th>
                                            <th style="text-align: center">{{ __('content.unity') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($reception->receptionItems as $receptionItem)
                                            <tr>
                                                <td>{{ dateFormat($receptionItem->date, 'd-M-Y') }}</td>
                                                <td>{{ $receptionItem->purchaseOrderItem->material->name }}</td>
                                                <td style="text-align: right; width: 10%;">{{ $receptionItem->quantity }}</td>
                                                <td style="text-align: center; width: 10%;">{{ $receptionItem->purchaseOrderItem->unity->code }}</td>
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
                </div>
   
            </div>
   
        </div>
   
    </section>
       
@endsection