@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section',__('content.quotations'))

@section('level',__('content.purchases'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myQuotations.index')}}"> {{ __('content.quotations') }} </a></li>
        <li class="active">{{ __('content.open') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.quotation') }} # {{ $quotation->id }}</strong></h3> |
                    @if ($quotation->status_id==2 )
                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#addNeedRequestItem">{{ __('content.discard') }}</button>
                        <a class="btn btn-success btn-sm" href="{{ route('quotations.approve',$quotation) }}">{{ __('content.approve') }}</a>
                    @endif
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
                                    <input id="company" disabled class="form-control" name="company" type="text" value="{{ $quotation->quotationRequest->stakeholder->name }}">
                                </div>
                            </div>
                            
                            {{-- seller --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.seller') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="seller" disabled class="form-control" name="seller" type="text" value="{{ $quotation->seller->user->person->fullName }}">
                                </div>
                            </div>

                            {{-- send date --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.sendDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="buyer" disabled class="form-control" name="buyer" type="text" value="{{ dateFormat($quotation->sendDate,'l j F Y') }}">
                                </div>
                            </div>

                            {{-- total price --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.totalPrice') }} ( {{ __('messages.withoutTaxation') }} )</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="totalPrice" disabled class="form-control" name="totalPrice" type="number" value="{{ $quotation->totalPrice }}" min="0.0">
                                </div>
                            </div>

                            <hr>

                            {{-- items --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.referenceItems') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <div>
                                        <br>
                                    </div>
                                    <table id="purchaseRequests" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center">{{ __('content.reference') }}</th>
                                                <th style="text-align: center">{{ __('content.quantity') }}</th>
                                                <th style="text-align: center">{{ __('content.unity') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($quotation->quotationRequest->purchaseRequest->purchaseRequestItems as $purchaseRequestItem)
                                                <tr>
                                                    <td>{{ $purchaseRequestItem->reference }}</td>
                                                    <td style="text-align: right; width: 10%;">{{ $purchaseRequestItem->quantity }}</td>
                                                    <td style="text-align: center; width: 10%;">{{ $purchaseRequestItem->unity->code }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @if ($quotation->quotationItems->count()>0)

                                <hr>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.quotedItems') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <div>
                                            <br>
                                        </div>
                                        <table id="purchaseRequests" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">{{ __('content.description') }}</th>
                                                    <th style="text-align: center">{{ __('content.quantity') }}</th>
                                                    <th style="text-align: center">{{ __('content.unity') }}</th>
                                                    <th style="text-align: center">{{ __('messages.unitPrice') }}</th>
                                                    <th style="text-align: center">{{ __('messages.deliveryDate') }}</th>
                                                    <th style="text-align: center">{{ __('content.subtotal') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($quotation->quotationItems as $quotationItem)
                                                    <tr>
                                                        <td>{{ $quotationItem->description }}</td>
                                                        <td style="text-align: right; width: 10%;">{{ $quotationItem->quantity }}</td>
                                                        <td style="text-align: center; width: 10%;">{{ $quotationItem->unity->code }}</td>
                                                        <td style="text-align: right; width: 10%;">{{ $quotationItem->unitPrice }}</td>
                                                        <td style="text-align: center; width: 15%;">{{ dateFormat($quotationItem->deliveryDate, 'd-m-Y') }}</td>
                                                        <td style="text-align: right; width: 10%;">{{ number_format($quotationItem->quantity * $quotationItem->unitPrice,2,',','.') }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            @endif

                            @if ($quotation->quotationAttachments->count()>0)

                                <hr>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.attachments') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <div>
                                            <br>
                                        </div>
                                        <table id="quotationAttachments" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('content.filename') }}</th>
                                                    <th>{{ __('content.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($quotation->quotationAttachments as $quotationAttachment)
                                                    <tr>
                                                        <td>{{ $quotationAttachment->filename }}</td>
                                                        <td>
                                                            <a class="btn btn-info btn-xs" href="{{  asset('documents/commercial/purchases/quotations/attachments/',$quotationAttachment->file)  }}">{{ __('content.open') }}</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            @endif

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href="{{ route('quotations.index') }}">{{ __('messages.goBack') }}</a>
                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection