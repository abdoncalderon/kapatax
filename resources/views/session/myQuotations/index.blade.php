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
                            <th>{{ __('content.buyer') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($myQuotations as $myQuotation)
                            <tr>
                                <td>{{ $myQuotation->id }}</td>
                                <td>{{ $myQuotation->sendDate }}</td>
                                <td>{{ $myQuotation->projectUser->user->person->fullName }}</td>
                                <td>{{ $myQuotation->status() }}</td>
                                <td>
                                    @if ( $myQuotation->status_id==0 )
                                        <a class="btn btn-info btn-xs" href="{{ route('myQuotations.open', $myQuotation) }}">{{ __('content.open') }}</a>
                                    @elseif( $myQuotation->status_id==0 )
                                        <a class="btn btn-info btn-xs" href="{{ route('myQuotations.edit', $myQuotation) }}">{{ __('content.edit') }}</a>
                                    @else
                                        <a class="btn btn-info btn-xs" href="{{ route('myQuotations.show', $myQuotation) }}">{{ __('content.show') }}</a>
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