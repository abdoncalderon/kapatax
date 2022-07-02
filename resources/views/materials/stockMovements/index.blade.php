@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('messages.stockMovements'))

@section('level', __('content.materials'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.materials') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.stockMovements') }} - {{ $material->name }} </strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th style="text-align: center">{{ __('content.date') }}</th>
                            <th style="text-align: center">{{ __('content.warehouse') }}</th>
                            <th style="text-align: center">{{ __('content.material') }}</th>
                            <th style="text-align: center">{{ __('content.type') }}</th>
                            <th style="text-align: center">{{ __('content.quantity') }}</th>
                            <th style="text-align: center">{{ __('messages.unitPrice') }}</th>
                            <th style="text-align: center">{{ __('content.balance') }}</th>
                            <th style="text-align: center">{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($material->stockMovements as $stockMovement)
                            <tr>
                                <td style="text-align: left; width: 6%;"">{{ dateFormat($stockMovement->date,'Y-M-d') }}</td>
                                <td style="text-align: left; width: 25%;">{{ $stockMovement->warehouse->name }}</td>
                                <td style="text-align: left; width: 30%;;">{{ $stockMovement->material->name }}</td>
                                <td style="text-align: left; width: 8%;">{{ $stockMovement->transactionType() }}</td>
                                <td style="text-align: right; width: 7%;">{{ $stockMovement->quantity }}</td>
                                <td style="text-align: right; width: 9%;">{{ $stockMovement->unitPrice }}</td>
                                <td style="text-align: right; width: 7%;">{{ $stockMovement->balance }}</td>
                                <td>
                                   {{--  <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('stockMovements.edit', $stockMovement)}}">{{ __('content.edit') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="#">{{ __('messages.stockMovements') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="#">{{ __('messages.priceHistory') }}</a> --}}
                                    {{-- <a style="margin: 0.3em" class="btn btn-danger btn-xs" href="{{ route('stockMovements.destroy', $stockMovement)}}">{{ __('content.delete') }}</a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('materials.index') }} ">{{ __('messages.goBack') }}</a>

            </div>

        </div>

    </section>

@endsection