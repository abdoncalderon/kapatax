@extends('layouts.main')

@section('title', __('content.home'))

@section('section', __('messages.myNeedRequests'))

@section('level', __('content.home'))

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
                <h3 class="box-title"><strong>{{ __('messages.needRequests') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('myNeedRequests.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.number') }}</th>
                            <th>{{ __('content.date') }}</th>
                            <th>{{ __('content.description') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($myNeedRequests as $myNeedRequest)
                            <tr>
                                <td>{{ $myNeedRequest->id }}</td>
                                <td>{{ $myNeedRequest->date }}</td>
                                <td>{{ $myNeedRequest->description }}</td>
                                <td>{{ $myNeedRequest->status() }}</td>
                                <td>
                                    
                                    @if ( $myNeedRequest->status_id==0 || $myNeedRequest->status_id==2 )
                                        <a class="btn btn-info btn-xs" href="{{ route('myNeedRequests.edit', $myNeedRequest) }}">{{ __('content.edit') }}</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('myNeedRequests.destroy', $myNeedRequest)}}">{{ __('content.delete') }}</a>
                                   {{--  @elseif( $myNeedRequest->status_id==2 )
                                        <a class="btn btn-info btn-xs" href="{{ route('myNeedRequests.modify', $myNeedRequest) }}">{{ __('content.modify') }}</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('myNeedRequests.destroy', $myNeedRequest)}}">{{ __('content.delete') }}</a> --}}
                                    @else
                                        <a class="btn btn-default btn-xs" href="{{ route('myNeedRequests.show', $myNeedRequest) }}">{{ __('content.show') }}</a>
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