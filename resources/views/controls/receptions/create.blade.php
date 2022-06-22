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
                    <h3 class="box-title"><strong>{{ __('content.create') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('receptions.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- receiver id --}}

                            <input type="hidden" id="receiver" name="receiver_user_id" value="{{ current_user()->id }}">

                            {{-- purchase order --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.purchaseOrder') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="purchase_order" type="text" class="form-control" name="purchase_order_id" placeholder="{{ __('content.number') }}" required>
                                </div>
                            </div>

                            {{-- type --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.type') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="type" name="type_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.type')}}</option>
                                        <option value="0">{{__('content.referralGuide')}}</option>
                                        <option value="1">{{__('content.worksheet')}}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- warehouse --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.warehouse') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="warehouse" name="warehouse_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.warehouse')}}</option>
                                        @foreach (current_user()->project->warehouses as $warehouse)
                                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- document number --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.reference') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="documentNumber" type="text" class="form-control" name="documentNumber" placeholder="{{ __('messages.documentNumber') }}" required>
                                </div>
                            </div>

                            {{-- Filename --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.file')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="file" type="file" class="form-control" name="file" accept="application/pdf">
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}
   
                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href=" {{ route('receptions.index') }} ">{{ __('content.cancel') }}</a>
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.create') }}</button>
                    </div>
                       
                </form>
   
                {{-- End Form  --}}
   
            </div>
   
        </div>
   
    </section>
       
@endsection