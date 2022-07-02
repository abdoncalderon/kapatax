@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('content.destocking'))

@section('level', __('content.materials'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <<li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('purchaseOrders.index')}}"> {{ __('content.destocking') }} </a></li>
        <li><a href="{{ route('purchaseOrders.open',$purchaseOrderItem->purchaseOrder)}}"> {{ __('content.open') }} </a></li>
        <li class="active">{{ __('content.associate') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.associateMaterialToItem') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('purchaseOrderItems.update',$purchaseOrderItem) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- item description --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.description') }} </label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="description" disabled class="form-control" name="description" type="text" value="{{ $purchaseOrderItem->description }}" min="0.0">
                                </div>
                            </div>

                            {{-- material --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('messages.equivalentMaterial')}}</label>
                                <input id="material" type="hidden" name="material_id">
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="codeMaterial2" type="text" class="form-control" name="code" style="width: 15%;" placeholder="{{ __('content.code') }}" required>
                                    <input id="nameMaterial" type="text" class="form-control" name="name" style="width: 75%;" disabled>
                                    <input id="stockMaterial" type="text" class="form-control" name="stock" style="width: 10%;" disabled>
                                </div>
                                
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button id="processButton" type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.associate') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('purchaseOrders.open',$purchaseOrderItem->purchaseOrder) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection