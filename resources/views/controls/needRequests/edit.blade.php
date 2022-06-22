@extends('layouts.main')

@section('title', __('content.purchases'))

@section('section',__('messages.needRequests'))

@section('level',__('content.purchases'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myNeedRequests.index')}}"> {{ __('messages.needRequests') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ __('messages.needRequest') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
            
                <form class="form-horizontal" method="POST" action="{{ route('myNeedRequests.update',$needRequest) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- project user --}}

                            <input id="project_user" type="hidden" name="project_user_id" value="{{ current_user()->id }}">

                            {{-- date --}}

                            <input id="date" type="hidden" name="date" value="{{ now()->format('Y-m-d H:i:s') }}">

                            {{-- status --}}

                            <input id="status" type="hidden" name="status_id" value="{{ $needRequest->status_id }}">

                            {{-- zone --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.zone') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="zone" disabled class="form-control" name="zone_id" type="text" value="{{ $needRequest->location->zone->name }}">
                                </div>
                            </div>

                            {{-- location --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="location" disabled class="form-control" name="location_id" type="text" value="{{ $needRequest->location->name }}">
                                </div>
                            </div>

                            {{-- cost account --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.costAccount') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    {{-- <input id="cost_account" disabled class="form-control" name="cost_account_id" type="text" value="{{ $needRequest->costAccount->name }}"> --}}
                                    <input id="cost_account" disabled class="form-control" name="cost_account_id" type="text" value="">
                                </div>
                            </div>

                            {{-- description --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.descriptionOfNeed') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <textarea id="description" disabled class="form-control" name="description" style="resize: vertical; height: 100px;" >{{ $needRequest->description }}</textarea>
                                </div>
                            </div>

                            {{-- expected cost --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.expectedCost') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="expectedCost" disabled class="form-control" name="expectedCost" type="number" value="{{ $needRequest->expectedCost }}">
                                </div>
                            </div>

                            {{-- approving user --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.approvingUser') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="approving_user" disabled class="form-control" name="approver_id" type="text" value="{{ $needRequest->approver->person->fullName }}">
                                </div>
                            </div>

                            <hr>

                            {{-- items --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.items') }}</label>
                                <div class="col-sm-10" >
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#addNeedRequestItem">
                                        {{ __('content.add') }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="equipments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.reference') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.unity') }}</th>
                                                <th>{{ __('content.status') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($needRequest->needRequestItems as $needRequestItem)
                                                <tr>
                                                    <td>{{ $needRequestItem->reference }}</td>
                                                    <td>{{ $needRequestItem->quantity }}</td>
                                                    <td>{{ $needRequestItem->unity->code }}</td>
                                                    <td>{{ $needRequestItem->status() }}</td>
                                                    <td>
                                                        @if ( $needRequestItem->needRequest->status_id==4 )
                                                            <a class="btn btn-info btn-xs" href="{{ route('myNeedRequestItems.edit',$needRequestItem) }}">{{ __('content.edit') }}</a>
                                                            <a class="btn btn-danger btn-xs" href="{{ route('myNeedRequestItems.destroy',$needRequestItem) }}">{{ __('content.delete') }}</a>
                                                        @endif
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
                        <button id="save" type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.update') }}</button>
                        @if ($needRequest->needRequestItems->count()>0)
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modalSaveAndSendRequest">{{ __('content.send') }}</button>
                        @endif
                        <a class="btn btn-danger btn-sm" href=" {{ route('myNeedRequests.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Save & Send Need Request --}}

    <div class="modal fade" id="modalSaveAndSendRequest">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title"><strong>{{ __('messages.saveAndSend').' '.__('messages.needRequest') }}</strong></h4>
                </div>
                <div class="modal-body">
                    <div>
                        <p class="">{{ __('messages.confirmSendNeedRequest') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.no')}}</button>
                    <button type="button" class="btn btn-primary" onclick="$('#status').val('1');$('#save').click();">{{__('content.yes')}}</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Add Need Request Item --}}

    <div class="modal fade" id="addNeedRequestItem">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('myNeedRequestItems.store') }}">
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
    
                            {{-- need request --}}
    
                            <input id="need_request" type="hidden" name="need_request_id" value="{{ $needRequest->id }}">

                            {{--status --}}
    
                            <input id="status" type="hidden" name="status_id" value="0">
    
                            {{-- reference --}}

                            <div class="form-group">
                                <label for="reference">{{ __('content.reference') }}</label>
                                <textarea id="reference" class="form-control" name="reference" style="resize: vertical" rows="5" required></textarea>
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