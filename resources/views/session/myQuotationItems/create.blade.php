@extends('layouts.main')

@section('title', __('content.home'))

@section('section', __('messages.myQuotations'))

@section('level', __('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <<li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myQuotations.index')}}"> {{ __('messages.myQuotations') }} </a></li>
        <li class="active">{{ __('content.quote') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.quoteItem') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('myQuotationItems.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- quotation --}}
    
                            <input id="quotation" type="hidden" name="quotation_id" value="{{ $myQuotation->id }}">

                            {{-- quotation request item --}}
    
                            <input id="purchaseRequest" type="hidden" name="quotation_request_item_id" value="{{ $purchaseRequestItem->id }}">
    
                            {{-- request --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.request') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <textarea class="form-control" style="resize: vertical; height: 100px;" rows="5" disabled>{{ $purchaseRequestItem->reference }}</textarea>
                                </div>
                            </div>

                            {{-- description --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.description') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <textarea id="description" class="form-control" name="description" style="resize: vertical; height: 100px;" rows="5" required></textarea>
                                </div>
                            </div>
    
                            {{-- Quantity --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.quantity')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="quantity" type="number" class="form-control" name="quantity" value="1" min="1" required>
                                </div>
                            </div>

                            {{-- unity --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.unity')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="unity_id" class="form-control" name="unity_id" class="form-control" required>
                                        <option value="">{{__('messages.select')}} {{__('content.unity')}}</option>
                                        @foreach ($unities as $unity)
                                            <option value="{{ $unity->id }}">{{ $unity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>

                            {{-- unit price --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('messages.unitPrice') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="unitPrice" type="number" class="form-control" name="unitPrice" value="0.0" min="1" required>
                                </div>
                            </div>

                            {{-- delivery date --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('messages.deliveryDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="deliveryDate" type="date" class="form-control" name="deliveryDate" required>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.quote') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('myQuotations.quote',$myQuotation) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection