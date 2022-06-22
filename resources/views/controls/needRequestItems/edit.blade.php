@extends('layouts.main')

@section('title', __('content.home'))

@section('section', __('messages.needRequests'))

@section('level', __('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <<li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myNeedRequests.index')}}"> {{ __('messages.needRequests') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit').' '.__('messages.needRequestItem') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('needRequestItems.update',$needRequestItem) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- need request --}}
    
                            <input id="need_request" type="hidden" name="need_request_id" value="{{ $needRequestItem->need_request_id }}">

                            {{--status --}}
    
                            <input id="status" type="hidden" name="status_id" value="{{ $needRequestItem->status_id }}">
    
                            {{-- reference --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.reference') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <textarea id="reference" class="form-control" name="reference" style="resize: vertical; height: 100px;" rows="5" required>{{ $needRequestItem->reference }}</textarea>
                                </div>
                            </div>
    
                            {{-- Quantity --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.quantity')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="quantity" type="number" class="form-control" name="quantity" value="1" min="1" value="{{ $needRequestItem->quantity }}" required>
                                </div>
                            </div>

                            {{-- unity --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.unity')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="unity_id" class="form-control" name="unity_id" class="form-control" required>
                                        <option value="">{{__('messages.select')}} {{__('content.unity')}}</option>
                                        @foreach ($unities as $unity)
                                            <option value="{{ $unity->id }}"
                                                @if ($needRequestItem->unity_id==$unity->id)
                                                    selected
                                                @endif    
                                            >{{ $unity->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.update') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('needRequests.review',$needRequestItem->needRequest) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection