@extends('layouts.main')

@section('title', __('content.purchases'))

@section('section',__('content.destocking'))

@section('level',__('content.materials'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('destockingRequests.index')}}"> {{ __('messages.destockingRequests') }} </a></li>
        <li class="active">{{ __('content.open') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.process') }}</strong></h3>
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
                                    <input id="zone" disabled class="form-control" name="zone" type="text" value="{{ $needRequest->location->zone->name }}">
                                </div>
                            </div>

                            {{-- location --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="location" disabled class="form-control" name="location" type="text" value="{{ $needRequest->location->name }}">
                                </div>
                            </div>

                            {{-- cost account --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.costAccount') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    {{-- <input id="cost_account" disabled class="form-control" name="cost_account_id" type="text" value="{{ $destockingRequest->costAccount->name }}"> --}}
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <div>
                                        <br>
                                    </div>
                                    <table id="items" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.reference') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.unity') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($needRequest->needRequestItems as $needRequestItem)
                                                @if ($needRequestItem->class_id == 1)
                                                    <tr>
                                                        <td>{{ $needRequestItem->reference }}</td>
                                                        <td>{{ $needRequestItem->quantity }}</td>
                                                        <td>{{ $needRequestItem->unity->code }}</td>
                                                        <td>
                                                            <a class="btn btn-danger btn-sm" href=" {{ route('stockMovements.createDestocking',$needRequestItem) }} ">{{ __('content.destocking') }}</a>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href=" {{ route('destockingRequests.index') }} ">{{ __('content.return') }}</a>
                        {{-- @if ($notifications->count()>0)
                            <a class="btn btn-success btn-sm" href=" {{ route('destockingRequests.dispatch',$destockingRequest) }} ">{{ __('content.dispatch') }}</a>
                        @endif --}}
                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    

@endsection