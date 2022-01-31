@extends('layouts.main')

@section('title', __('content.project'))

@section('section', __('content.project'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('project.index')}}"> {{ __('content.project') }} </a></li>
        <li class="active">{{ __('content.positions') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.sectors').' '.__('content.project') }} {{ $project->name }} </strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('projectSectors.create', $project) }}">{{ __('content.add') }}</a>
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
                        @foreach($project->sectors as $projectSector)
                            <tr>
                                <td>{{ $projectSector->sector->name }}</td>
                                <td>
                                    <a class="btn btn-danger btn-xs" href="{{ route('projectSectors.destroy', $projectSector)}}">{{ __('content.delete')}}</a>
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