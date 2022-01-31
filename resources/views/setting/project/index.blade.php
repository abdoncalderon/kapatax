@extends('layouts.main')

@section('title', __('content.project'))

@section('section', __('content.project'))

@section('level', __('content.setting'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.projects') }}</li>
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
                <h3 class="box-title"><strong>{{ current_user()->project->name }}</strong></h3>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.subsidiary') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ $project->subsidiary->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('project.edit', $project)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-info btn-xs" href="{{ route('projectSectors.index', $project)}}">{{ __('content.sectors') }}</a>
                                    <a class="btn btn-info btn-xs" href="{{ route('projectFunctions.index', $project)}}">{{ __('content.functions') }}</a>
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