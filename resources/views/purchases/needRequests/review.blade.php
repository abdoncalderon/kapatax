@extends('layouts.main')

@section('title', __('content.purchases'))

@section('section',__('messages.needRequests'))

@section('level',__('content.process'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myNeedRequests.index')}}"> {{ __('messages.needRequests') }} </a></li>
        <li class="active">{{ __('content.show') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
            
                
                   

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

                            {{-- request items --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.requestItems') }}</label>
                                <div class="col-sm-10" >
                                    <div>
                                        <br>
                                    </div>
                                    <table id="items" class="table table-bordered table-striped">
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
                                                        @if ($needRequestItem->status_id==3)
                                                            <a class="btn btn-info btn-xs" href=" {{ route('needRequestItems.quote',$needRequestItem) }} ">{{ __('messages.quotationRequest') }}</a>
                                                            <a class="btn btn-info btn-xs" href=" {{ route('needRequestItems.destocking',$needRequestItem) }} ">{{ __('content.destocking') }}</a>
                                                        @elseif ($needRequestItem->status_id==4)
                                                            <a class="btn btn-info btn-xs" href=" {{ route('needRequestItems.destocking',$needRequestItem) }} ">{{ __('content.destocking') }}</a>
                                                        @elseif ($needRequestItem->status_id==5)
                                                            <a class="btn btn-info btn-xs" href=" {{ route('needRequestItems.quote',$needRequestItem) }} ">{{ __('messages.quotationRequest') }}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            

                            {{-- supplier stakeholders --}}
    
                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.notify') }}:</label>
                                <div class="col-sm-10" >
                                    <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#addNotification">
                                        {{ __('messages.addSupplier') }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="suppliers" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.supplier') }}</th>
                                                <th>{{ __('content.status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($notifications as $notification)
                                                <tr>
                                                    <td>{{ $notification->stakeholder->name }}</td>
                                                    <td>{{ $notification->status() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>--}}


                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href=" {{ route('needRequests.index') }} ">{{ __('content.return') }}</a>
                        <a class="btn btn-success btn-sm" href=" {{ route('needRequests.process',$needRequest) }} ">{{ __('content.process') }}</a>
                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Modal Window Add Supplier Notification --}}

    {{-- <div class="modal fade" id="addNotification" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('quotationRequestNotifications.store') }}">
                @csrf
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.region') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">

                        <div class="form-group">
                            <label for="supplier_id">{{__('content.supplier')}}</label>
                            <select id="unity_id" class="form-control" name="unity_id" class="form-control" required>
                                <option value="">{{__('messages.select')}} {{__('content.unity')}}</option>
                                @foreach ($unities as $unity)
                                    <option value="{{ $unity->id }}">{{ $unity->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

    </div> --}}

@endsection