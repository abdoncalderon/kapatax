@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('content.receptions'))

@section('level', __('content.controls'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('messages.needRequests') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.all') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('receptions.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('messages.purchaseOrder') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.type') }}</th>
                            <th>{{ __('content.reference') }}</th>
                            <th>{{ __('content.company') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($receptions as $reception)
                            <tr>
                                <td>{{ $reception->id }}</td>
                                <td>{{ $reception->purchase_order_id }}</td>
                                <td>{{ $reception->date }}</td>
                                <td>{{ $reception->type() }}</td>
                                <td>{{ $reception->documentNumber }}</td>
                                <td>{{ $reception->purchaseOrder->quotation->quotationRequest->stakeholder->name }}</td>
                                <td>
                                    @if ($reception->status_id==0)
                                        <a class="btn btn-success btn-xs" href="{{ route('receptions.edit', $reception) }}">{{ __('content.edit') }}</a>
                                    @else
                                        <a class="btn btn-default btn-xs" href="{{ route('receptions.show', $reception) }}">{{ __('content.show') }}</a>
                                    @endif
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