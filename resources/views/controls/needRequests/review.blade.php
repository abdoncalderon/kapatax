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
            
                    <form class="form-horizontal" method="POST" action="{{ route('needRequests.process') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- need request --}}

                            <input type="hidden" name="need_request_id" value="{{ $needRequest->id }}">

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

                                    <table id="items" class="table table-bordered table-striped" >
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.reference') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.unity') }}</th>
                                                <th>{{ __('content.status') }}</th>
                                                <th>{{ __('messages.processAs') }}</th>
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
                                                        <input type="hidden" name="needRequestItems[]" id="needRequestItems" value="{{ $needRequestItem->id }}" >
                                                        <select class="form-control" name="processType[]" id="processType">
                                                            <option value="0">{{ __('content.purchase') }}</option>
                                                            <option value="1">{{ __('content.destocking') }}</option>
                                                        </select>
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
                        <a class="btn btn-danger btn-sm" href=" {{ route('needRequests.index') }} ">{{ __('messages.goBack') }}</a>
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.process') }}</button>
                    </div>

                    </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection