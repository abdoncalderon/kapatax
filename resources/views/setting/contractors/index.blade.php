@extends('layouts.main')

@section('title', __('content.contractors'))

@section('section', __('content.contractors'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.contractors') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.contractors') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('contractors.create') }}">{{ __('content.add') }}</a>
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
                        @foreach($contractors as $contractor)
                            <tr>
                                <td>{{ $contractor->name }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('contractors.edit', $contractor)}}">{{ __('content.edit') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-danger btn-xs" href="{{ route('contractors.destroy', $contractor)}}">{{ __('content.delete') }}</a>
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