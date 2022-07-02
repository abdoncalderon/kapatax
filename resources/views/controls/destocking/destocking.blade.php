@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('content.destocking'))

@section('level', __('content.controls'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <<li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('destocking.index')}}"> {{ __('content.destocking') }} </a></li>
        <li class="active">{{ __('content.process') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.processDestocking') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('destocking.destocking',$needRequestItem) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- need request --}}
    
                            <input id="need_request" type="hidden" name="need_request_id" value="{{ $needRequestItem->need_request_id }}">

                            {{-- need request item --}}
    
                            <input id="need_request_item" type="hidden" name="need_request_item_id" value="{{ $needRequestItem->id }}">

                            {{-- warehouse --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.warehouse') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="warehouse" name="warehouse_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.warehouse')}}</option>
                                        @foreach ($warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- stakeholder person --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('messages.withdrawnBy')}}</label>
                                <input id="stakeholderPerson" type="hidden" name="stakeholder_person_id">
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="cardIdStakeholderPerson" type="text" class="form-control" name="cardId" style="width: 15%;" placeholder="{{ __('content.cardId') }}" required>
                                    <input id="fullNameStakeholderPerson" type="text" class="form-control" name="fullName" style="width: 85%;" required disabled>
                                </div>
                                
                            </div>

                            {{-- reference --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.reference') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <textarea id="reference" class="form-control" name="reference" style="resize: vertical; height: 100px;" disabled>{{ $needRequestItem->reference }}</textarea>
                                </div>
                            </div>

                            {{-- material --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.material')}}</label>
                                <input id="material" type="hidden" name="material_id">
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="codeMaterial" type="text" class="form-control" name="code" style="width: 15%;" placeholder="{{ __('content.code') }}" required>
                                    <input id="nameMaterial" type="text" class="form-control" name="name" style="width: 75%;" disabled>
                                    <input id="stockMaterial" type="text" class="form-control" name="stock" style="width: 10%;" disabled>
                                </div>
                                
                            </div>
    
                            {{-- quantity --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.quantity')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="quantity" type="text" class="form-control" name="quantity" value="{{ $needRequestItem->quantity }}">
                                </div>
                            </div>



                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button id="processButton" type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px; display:none;">{{ __('content.process') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('destocking.open',$needRequestItem->needRequest) }} " >{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection