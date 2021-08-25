@extends('layouts.main')

@section('title', __('content.location'))

@section('section', __('content.locations'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('users.index')}}"> {{ __('content.locations') }} </a></li>
        <li class="active">{{ __('content.turns') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Error Messages --}}
            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ $errors->first() }}
                </div>
            @endif

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.turns') }} {{ $location->name }} </strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('turnsLocations.create', $location) }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.from') }}</th>
                            <th>{{ __('content.to') }} </th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($location->turns as $turnlocation)
                            <tr>
                                <td>{{ $turnlocation->turn->name }}</td>
                                <td>{{ $turnlocation->dateFrom }}</td>
                                <td>{{ $turnlocation->dateTo }}</td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="{{ route('turnsLocations.destroy', $turnlocation)}}">{{ __('content.delete')}}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

            </div>

        </div>

    </section>

@endsection