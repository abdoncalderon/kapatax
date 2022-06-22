@extends('layouts.main')

@section('title', __('content.home'))

@section('section', __('messages.myQuotations'))

@section('level', __('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('messages.myQuotations') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.myQuotations') }}</strong></h3> | 
                {{-- <a class="btn btn-success btn-sm" href="{{ route('myQuotations.create') }}">{{ __('content.add') }}</a> --}}
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($myQuotations as $myQuotation)
                            <tr>
                                <td>{{ $myQuotation->id }}</td>
                                <td>{{ $myQuotation->answerDate }}</td>
                                <td>{{ $myQuotation->status() }}</td>
                                <td>
                                    <a class="btn btn-default btn-xs" href="{{ route('myQuotations.show', $myQuotation) }}">{{ __('content.show') }}</a>
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