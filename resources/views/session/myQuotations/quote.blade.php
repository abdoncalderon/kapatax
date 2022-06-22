@extends('layouts.main')

@section('title', __('content.home'))

@section('section',__('messages.myQuotations'))

@section('level',__('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myQuotations.index')}}"> {{ __('messages.myQuotations') }} </a></li>
        <li class="active">{{ __('content.open') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.quotation') }} # {{ $myQuotation->id }}</strong></h3> |
                    {{-- @if ($myQuotation->status_id==0)
                        <a class="btn btn-danger btn-sm" href="{{ route('myQuotations.reject',$myQuotation) }}">{{ __('content.reject') }}</a>
                        <a class="btn btn-success btn-sm" href="{{ route('myQuotations.accept',$myQuotation) }}">{{ __('content.accept') }}</a>
                    @endif --}}
                    
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
                                    <input id="company" disabled class="form-control" name="company" type="text" value="{{ active_stakeholder($myQuotation->quotationRequest->buyer->user->person)->stakeholder->name }}">
                                </div>
                            </div>
                            
                            {{-- buyer --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.buyer') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="buyer" disabled class="form-control" name="buyer" type="text" value="{{ $myQuotation->quotationRequest->buyer->user->person->fullName }}">
                                </div>
                            </div>

                            {{-- send date --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.sendDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="buyer" disabled class="form-control" name="buyer" type="text" value="{{ $myQuotation->quotationRequest->sendDate }}">
                                </div>
                            </div>

                            {{-- total price --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.totalPrice') }} ( {{ __('messages.withoutTaxation') }} )</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="totalPrice" class="form-control" name="totalPrice" type="number" value="{{ $myQuotation->totalPrice }}" min="0.0">
                                    @error('totalPrice')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
                                                <th>{{ __('content.reference') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.unity') }}</th>
                                                {{-- @if ($myQuotation->status_id > 0)
                                                    <th>{{ __('content.actions') }}</th>
                                                @endif --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($myQuotation->quotationRequest->purchaseRequest->purchaseRequestItems as $purchaseRequestItem)
                                                <tr>
                                                    <td>{{ $purchaseRequestItem->reference }}</td>
                                                    <td>{{ $purchaseRequestItem->quantity }}</td>
                                                    <td>{{ $purchaseRequestItem->unity->code }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @if ($myQuotation->status_id > 0)

                                <hr>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.quotedItems') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addItem">{{ __('content.add') }}</button>
                                        <div>
                                            <br>
                                        </div>
                                        <table id="quotationItems" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('content.description') }}</th>
                                                    <th>{{ __('content.quantity') }}</th>
                                                    <th>{{ __('content.unity') }}</th>
                                                    <th>{{ __('messages.unitPrice') }}</th>
                                                    <th>{{ __('messages.deliveryDate') }}</th>
                                                    <th>{{ __('content.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($myQuotation->quotationItems as $quotationItem)
                                                    <tr>
                                                        <td>{{ $quotationItem->description }}</td>
                                                        <td>{{ $quotationItem->quantity }}</td>
                                                        <td>{{ $quotationItem->unity->code }}</td>
                                                        <td>{{ $quotationItem->unitPrice }}</td>
                                                        <td>{{ $quotationItem->deliveryDate }}</td>
                                                        <td>
                                                            <a class="btn btn-danger btn-xs" href="{{ route('myQuotationItems.destroy',$quotationItem) }}">{{ __('content.delete') }}</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.attachments') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addAttachment">{{ __('content.add') }}</button>
                                        <div>
                                            <br>
                                        </div>
                                        <table id="attachments" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('content.filename') }}</th>
                                                    <th>{{ __('content.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($myQuotation->quotationAttachments as $quotationAttachment)
                                                    <tr>
                                                        <td>{{ $quotationAttachment->filename }}</td>
                                                        <td>
                                                            <a class="btn btn-danger btn-xs" href="{{ route('myQuotationAttachments.destroy',$quotationAttachment) }}">{{ __('content.delete') }}</a>
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
                        <a class="btn btn-danger btn-sm" href="{{ route('myQuotations.index') }}">{{ __('content.return') }}</a>
                        @if ($myQuotation->quotationItems->count()>0)
                            <a class="btn btn-success btn-sm" href="{{ route('myQuotations.send',$myQuotation) }}">{{ __('messages.sendQuote') }}</a>
                        @endif
                        

                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Add Need Request Item --}}

    <div class="modal fade" id="addItem">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('myQuotationItems.store') }}">
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
    
                            {{-- quotation --}}
    
                            <input id="quotation" type="hidden" name="quotation_id" value="{{ $myQuotation->id }}">
    
                            {{-- description --}}

                            <div class="form-group">
                                <label for="descrription">{{ __('content.description') }}</label>
                                <textarea id="description" class="form-control" name="description" style="resize: vertical" rows="5" required></textarea>
                            </div>
    
                            {{-- Quantity --}}
    
                            <div class="form-group">
                                <label for="quantity">{{__('content.quantity')}}</label>
                                <input id="quantity" type="number" class="form-control" name="quantity" value="1" min="1" required>
                            </div>

                            {{-- unity --}}
    
                            <div class="form-group">
                                <label for="unity_id">{{__('content.unity')}}</label>
                                <select id="unity_id" class="form-control" name="unity_id" class="form-control" required>
                                    <option value="">{{__('messages.select')}} {{__('content.unity')}}</option>
                                    @foreach ($unities as $unity)
                                        <option value="{{ $unity->id }}">{{ $unity->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            {{-- unit price --}}
    
                            <div class="form-group">
                                <label for="unitPrice">{{__('messages.unitPrice') }}</label>
                                <input id="unitPrice" type="number" class="form-control" name="unitPrice" value="0.0" min="1" required>
                            </div>

                            {{-- delivery date --}}
    
                            <div class="form-group">
                                <label for="dliveryDate">{{__('messages.deliveryDate') }}</label>
                                <input id="deliveryDate" type="date" class="form-control" name="deliveryDate" required>
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

    {{-- Add Attachemnts --}}

    <div class="modal fade" id="addAttachment">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('myQuotationAttachments.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('messages.addAttachment') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- quotation --}}
    
                            <input id="quotation" type="hidden" name="quotation_id" value="{{ $myQuotation->id }}">

                            {{-- Filename --}}

                            <div class="form-group">
                                <label for="file">{{__('content.file')}}</label>
                                <input id="file" type="file" class="form-control" name="file" accept="image/x-png,image/gif,image/jpeg,application/pdf" required>
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