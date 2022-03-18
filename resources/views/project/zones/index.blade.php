@extends('layouts.main')

@section('title', __('content.zones'))

@section('section', __('content.zones'))

@section('level', __('content.settings'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.zones') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">
            
            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.zones') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('zones.create') }}">{{ __('content.add') }}</a>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#importZones">{{ __('content.import') }} {{ __('content.from') }} Excel </button>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($zones as $zone)
                            <tr>
                                <td>{{ $zone->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('zones.edit', $zone)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('zones.destroy', $zone)}}">{{ __('content.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

            </div>

        </div>

    </section>

    {{-- Import from Excel File --}}

    <div class="modal fade" id="importZones">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('zones.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.zones') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- Filename --}}

                            <div class="form-group">
                                <label for="file">{{ __('content.file') }} Excel</label>
                                <input id="file" type="file" class="form-control" name="file" accept="application/xls" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.import')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection