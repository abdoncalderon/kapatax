@extends('layouts.main')

@section('title', __('content.home'))

@section('section',__('messages.myQuotations'))

@section('level',__('content.show'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myQuotations.index')}}"> {{ __('messages.myQuotations') }} </a></li>
        <li class="active">{{ __('content.show') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.quotation') }} # {{ $myQuotation->id }}</strong></h3> |
                </div>

                {{-- Start Form  --}}




                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- stakeholder --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.company') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="company" disabled class="form-control" name="company" type="text" value="{{ active_stakeholder($myQuotation->quotationRequest->projectUser->user->person)->stakeholder->name }}">
                                </div>
                            </div>
                            
                            {{-- buyer --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.buyer') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="buyer" disabled class="form-control" name="buyer" type="text" value="{{ $myQuotation->quotationRequest->projectUser->user->person->fullName }}">
                                </div>
                            </div>

                            {{-- send date --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.sendDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="buyer" disabled class="form-control" name="buyer" type="text" value="{{ $myQuotation->sendDate }}">
                                </div>
                            </div>

                            {{-- total price --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.totalPrice') }} ( {{ __('messages.withoutTaxation') }} )</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="totalPrice" disabled class="form-control" name="totalPrice" type="number" value="{{ $myQuotation->totalPrice }}" min="0.0">
                                </div>
                            </div>

                            <hr>

                            {{-- items --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.referenceItems') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <div>
                                        <br>
                                    </div>
                                    <table id="quotationRequests" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.reference') }}</th>
                                                <th>{{ __('content.quantity') }}</th>
                                                <th>{{ __('content.unity') }}</th>
                                                <th>{{ __('content.status') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($myQuotation->quotationRequest->quotationRequestItems as $quotationRequestItem)
                                                <tr>
                                                    <td>{{ $quotationRequestItem->reference }}</td>
                                                    <td>{{ $quotationRequestItem->quantity }}</td>
                                                    <td>{{ $quotationRequestItem->unity->code }}</td>
                                                    <td>{{ $quotationRequestItem->status() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            @if ($myQuotation->quotationItems->count()>0)

                                <hr>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.quotedItems') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <div>
                                            <br>
                                        </div>
                                        <table id="quotationRequests" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('content.description') }}</th>
                                                    <th>{{ __('content.quantity') }}</th>
                                                    <th>{{ __('content.unity') }}</th>
                                                    <th>{{ __('messages.unitPrice') }}</th>
                                                    <th>{{ __('messages.deliveryDate') }}</th>
                                                    <th>{{ __('content.actions') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($myQuotation->quotationItems as $quotationItem)
                                                    <tr>
                                                        <td>{{ $quotationItem->description }}</td>
                                                        <td>{{ $quotationItem->quantity }}</td>
                                                        <td>{{ $quotationItem->unity->code }}</td>
                                                        <td>{{ $quotationItem->unitPrice }}</td>
                                                        <td>{{ $quotationItem->deliveryDate }}</td>
                                                        <td>
                                                            <a class="btn btn-success btn-xs" href="#">{{ __('content.delete') }}</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            @endif

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <a class="btn btn-danger btn-sm" href="{{ route('myQuotations.index') }}">{{ __('content.return') }}</a>
                    </div>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection