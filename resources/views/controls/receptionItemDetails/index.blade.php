@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('content.receptions'))

@section('level', __('content.controls'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('receptions.index')}}"> {{ __('content.receptions') }} </a></li>
        <li><a href="{{ route('receptions.edit',$receptionItem->reception)}}"> {{ __('content.items') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.detailsPerUnit') }}</strong></h3> | 
                @if (count($receptionItem->receptionItemDetails) < $receptionItem->quantity)
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#addDetail">
                        {{ __('content.add') }}
                    </button>
                @endif
            </div>
            
            <div class="box-body">

                {{-- start table --}}
                            
                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th style="text-align: center">{{ __('content.name') }}</th>
                            <th style="text-align: center">{{ __('content.serialNumber') }}</th>
                            <th style="text-align: center">{{ __('content.partNumber') }}</th>
                            <th style="text-align: center">{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach ($receptionItem->receptionItemDetails as $receptionItemDetail)
                            <tr>
                                <td>{{ $receptionItemDetail->receptionItem->purchaseOrderItem->material->name }}</td>
                                <td>{{ $receptionItemDetail->serialNumber }}</td>
                                <td>{{ $receptionItemDetail->partNumber }}</td>
                                <td style="width: 15%;">
                                    <a class="btn btn-danger btn-xs" href="{{ route('receptionItemDetails.destroy',$receptionItemDetail) }}">{{ __('content.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('receptions.edit',$receptionItem->reception) }} ">{{ __('messages.goBack') }}</a>

            </div>

        </div>
   
    </section>

    {{-- Add Item Detail --}}

    <div class="modal fade" id="addDetail">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('receptionItemDetails.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('messages.addDetail') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
    
                            {{-- reception item --}}
    
                            <input id="receptionItem" type="hidden" name="reception_item_id" value="{{ $receptionItem->id }}">

                            {{-- Serial Number --}}

                            <div class="form-group">
                                <label for="quantity">{{__('content.serialNumber')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-12">
                                    <input id="serialNumber" class="form-control" name="serialNumber" type="text" placeholder="{{ __('content.serialNumber') }}" required>
                                </div>
                            </div>

                            {{-- Part Number --}}

                            <div class="form-group">
                                <label for="partNumber">{{__('content.partNumber')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-12">
                                    <input id="partNumber" class="form-control" name="partNumber" type="text" placeholder="{{ __('content.partNumber') }}" >
                                </div>
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