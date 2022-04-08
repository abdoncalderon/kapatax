@extends('layouts.main')

@section('title', __('content.home'))

@section('section',__('messages.myNeedRequests'))

@section('level',__('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myNeedRequests.index')}}"> {{ __('messages.myNeedRequests') }} </a></li>
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
            
                <form class="form-horizontal" method="POST" action="{{ route('myNeedRequests.update',$myNeedRequest) }}">
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

                            <input id="status" type="hidden" name="status_id" value="{{ $myNeedRequest->status_id }}">

                            {{-- zone --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.zone') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="zone" name="zone_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.zone')}}</option>
                                        @foreach ($zones as $zone)
                                            <option value="{{ $zone->id }}"
                                                @if($myNeedRequest->location->zone->id==$zone->id)    
                                                    selected
                                                @endif
                                            >{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- location --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="location" name="location_id" class="form-control" style="width: 100%;" required>
                                        <option value="{{ $myNeedRequest->location_id }}">{{ $myNeedRequest->location->name }}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- cost account --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.costAccount') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="cost_account" name="cost_account_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('messages.costAccount')}}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- description --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.descriptionOfNeed') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" style="resize: vertical; height: 100px;" rows="5">{{ $myNeedRequest->description }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- expected cost --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.expectedCost') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="expectedCost" class="form-control @error('expectedCost') is-invalid @enderror" name="expectedCost" type="number" value="{{ $myNeedRequest->expectedCost }}" min="0.0">
                                    @error('expectedCost')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- approving user --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.approvingUser') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="approving_user" name="approver_id" class="form-control" style="width: 100%;" required>
                                        @foreach ($approvers as $approver)
                                            <option value="{{ $approver->person_id }}"
                                                @if ( $approver->person_id == $myNeedRequest->approver_id )
                                                    selected
                                                @endif
                                            >{{ $approver->person->fullName }}</option>
                                        @endforeach
                                    </select>
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
                                            @foreach($myNeedRequest->needRequestItems as $myNeedRequestItem)
                                                <tr>
                                                    <td>{{ $myNeedRequestItem->reference }}</td>
                                                    <td>{{ $myNeedRequestItem->quantity }}</td>
                                                    <td>{{ $myNeedRequestItem->unity->code }}</td>
                                                    <td>{{ $myNeedRequestItem->status() }}</td>
                                                    <td>
                                                        @if ( $myNeedRequestItem->needRequest->status_id==0 || $myNeedRequestItem->needRequest->status_id==2 )
                                                            <a class="btn btn-info btn-xs" href="{{ route('myNeedRequestItems.edit',$myNeedRequestItem) }}">{{ __('content.edit') }}</a>
                                                            <a class="btn btn-danger btn-xs" href="{{ route('myNeedRequestItems.destroy',$myNeedRequestItem) }}">{{ __('content.delete') }}</a>
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
                        @if ($myNeedRequest->needRequestItems->count()>0)
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
    
                            <input id="need_request" type="hidden" name="need_request_id" value="{{ $myNeedRequest->id }}">

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