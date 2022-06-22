@extends('layouts.main')

@section('title', __('content.commercial'))

@section('section', __('content.quotations'))

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
                <h3 class="box-title"><strong>{{ __('content.quotations') }}</strong></h3> | 
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.quotation') }} Nº</th>
                            <th>{{ __('content.request') }} Nº</th>
                            
                            <th>{{ __('content.supplier') }}</th>
                            <th>{{ __('content.seller') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($quotations as $quotation)
                            <tr>
                                <td>{{ dateFormat($quotation->answerDate,'d-M-Y') }}</td>
                                <td>{{ $quotation->id }}</td>
                                <td>{{ $quotation->quotationRequest->purchaseRequest->need_request_id }}</td>
                                <td>{{ $quotation->quotationRequest->stakeholder->name }}</td>
                                <td>{{ $quotation->seller->user->person->fullName }}</td>
                                <td>{{ $quotation->status() }}</td>
                                <td>
                                    @if ($quotation->status_id < 4)
                                        <a class="btn btn-info btn-xs" href="{{ route('quotations.open', $quotation) }}">{{ __('content.open') }}</a>
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