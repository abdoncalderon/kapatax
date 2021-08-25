@extends('layouts.main')

@section('title', __('content.subsidiaries'))

@section('section', __('content.subsidiaries'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.subsidiaries') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.subsidiaries') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('subsidiaries.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.company') }}</th>
                            <th>{{ __('content.division') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($subsidiaries as $subsidiary)
                            <tr>
                                <td>{{ $subsidiary->name }}</td>
                                <td>{{ $subsidiary->company->name }}</td>
                                <td>{{ $subsidiary->division->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('subsidiaries.show', $subsidiary)}}">{{ __('content.show') }}</a>
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