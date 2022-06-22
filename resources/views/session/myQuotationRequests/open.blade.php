@extends('layouts.main')

@section('title', __('content.home'))

@section('section',__('messages.myQuotationRequests'))

@section('level',__('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myQuotationRequests.index')}}"> {{ __('messages.myQuotationRequests') }} </a></li>
        <li class="active">{{ __('content.open') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.quotation') }} # {{ $myQuotationRequest->id }}</strong></h3> |
                    @if ($myQuotationRequest->status_id==0)
                        <a class="btn btn-danger btn-sm" href="{{ route('myQuotationRequests.reject',$myQuotationRequest) }}">{{ __('content.reject') }}</a>
                        <a class="btn btn-success btn-sm" href="{{ route('myQuotationRequests.accept',$myQuotationRequest) }}">{{ __('content.accept') }}</a>
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
                                    <input id="company" disabled class="form-control" name="company" type="text" value="{{ active_stakeholder($myQuotationRequest->purchaseRequest->projectUser->user->person)->stakeholder->name }}">
                                </div>
                            </div>
                            
                            {{-- buyer --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.buyer') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="buyer" disabled class="form-control" name="buyer" type="text" value="{{ $myQuotationRequest->purchaseRequest->projectUser->user->person->fullName }}">
                                </div>
                            </div>

                            {{-- send date --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.sendDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="buyer" disabled class="form-control" name="buyer" type="text" value="{{ $myQuotationRequest->sendDate }}">
                                </div>
                            </div>

                            {{-- total price --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.totalPrice') }} ( {{ __('messages.withoutTaxation') }} )</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="totalPrice" class="form-control" name="totalPrice" type="number" value="{{ $myQuotationRequest->totalPrice }}" min="0.0">
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
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($myQuotationRequest->purchaseRequest->purchaseRequestItems as $purchaseRequestItem)
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

                            

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href="{{ route('myQuotationRequests.index') }}">{{ __('content.return') }}</a>
                        {{-- @if ($myQuotationRequest->quotationRequestItems->count()>0)
                            <a class="btn btn-success btn-sm" href="{{ route('myQuotationRequests.send',$myQuotationRequest) }}">{{ __('messages.sendQuote') }}</a>
                        @endif --}}
                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    


@endsection