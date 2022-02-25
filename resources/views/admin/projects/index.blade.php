@extends('layouts.main')

@section('title', __('content.projects'))

@section('section', __('content.projects'))

@section('level', __('content.administration'))

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
                <h3 class="box-title"><strong>{{ __('content.projects') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('projects.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

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
                                    <a class="btn btn-info btn-xs" href="{{ route('projects.edit', $project)}}">{{ __('content.edit') }}</a>
                                    @if($project->id!=1)
                                        @if ($project->isActive())
                                            <a class="btn btn-danger btn-xs" href="{{ route('projects.activate', [$project, '0']) }}">{{ __('content.deactivate') }}</a>
                                        @else
                                            <a class="btn btn-info btn-xs" href="{{ route('projects.activate', [$project, '1']) }}">{{ __('content.activate') }}</a>
                                        @endif
                                        @if ($project->isLocked())
                                            <a class="btn btn-info btn-xs" href="{{ route('projects.lock', [$project, '0']) }}">{{ __('content.unlock') }}</a>
                                        @else
                                            <a class="btn btn-danger btn-xs" href="{{ route('projects.lock', [$project, '1']) }}">{{ __('content.lock') }}</a>
                                        @endif
                                        <a class="btn btn-danger btn-xs" href="{{ route('projects.destroy', $project)}}">{{ __('content.delete') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('home') }} "><<< {{ __('content.return') }}</a>

            </div>

        </div>

    </section>

@endsection