@extends('layouts.main')

@section('title', __('content.areas'))

@section('section', __('content.areas'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.areas') }}</li>
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

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.areas') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('areas.create') }}">{{ __('content.add') }}</a>
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
                        @foreach($areas as $area)
                            <tr>
                                <td>{{ $area->name }}</td>
                                <td>
                                    {{-- <a class="btn btn-info btn-xs" href="{{ route('areas.show', $area)}}">{{ __('content.show') }}</a> --}}
                                    <a class="btn btn-info btn-xs" href="{{ route('areas.edit', $area)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('areas.destroy', $area)}}">{{ __('content.delete') }}</a>
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