@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('content.orders'))

@section('level', __('content.purchases'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.quotations') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.purchaseOrders') }}</strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('messages.purchaseOrder') }} Nº</th>
                            <th>{{ __('content.quotation') }} Nº</th>
                            <th>{{ __('content.supplier') }}</th>
                            <th>{{ __('content.seller') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($purchaseOrders as $purchaseOrder)
                            <tr>
                                <td style="width: 5%;">{{ dateFormat($purchaseOrder->date,'d-M-Y') }}</td>
                                <td style="width: 10%;">{{ $purchaseOrder->id }}</td>
                                <td style="width: 10%;">{{ $purchaseOrder->quotation_id }}</td>
                                <td style="width: 20%;">{{ $purchaseOrder->quotation->quotationRequest->stakeholder->name }}</td>
                                <td style="width: 20%;">{{ $purchaseOrder->quotation->seller->user->person->fullName }}</td>
                                <td style="width: 10%;">{{ $purchaseOrder->status() }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('purchaseOrders.open', $purchaseOrder) }}">{{ __('content.open') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('home') }} ">{{ __('content.return') }}</a>

            </div>

        </div>

    </section>

@endsection