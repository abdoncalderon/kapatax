@extends('layouts.main')

@section('title', __('content.locations'))

@section('section', __('content.locations'))

@section('level', __('content.production'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.locations') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.locations') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('workbook_settings_locations_create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($locations as $location)
                            <tr>
                                <td>{{ $location->name }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('workbook_settings_locations_edit', $location)}}">{{ __('content.edit') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('locationTurns.index', $location)}}">{{ __('content.turns') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-danger btn-xs" href="{{ route('workbook_settings_locations_destroy', $location)}}">{{ __('content.delete') }}</a>
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