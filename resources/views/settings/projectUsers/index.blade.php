@extends('layouts.main')

@section('title', __('content.settings'))

@section('section', __('content.users'))

@section('level', __('content.project'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projects.index') }}"> {{ __('content.projects') }} </a></li>
        <li class="active">{{ __('content.users') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.usersWithAccessTo') }} {{ $project->name }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('settings.projectUsers.create',$project) }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.user') }}</th>
                            <th>{{ __('content.role') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($project->projectUsers as $projectUser)
                            <tr>
                                <td>{{ $projectUser->user->person->fullName }}</td>
                                <td>{{ $projectUser->projectRole->role->name }}</td>
                                <td>
                                    @if($projectUser->id!=1)
                                        <a class="btn btn-info btn-xs" href="{{ route('settings.projectUsers.edit', $projectUser) }}">{{ __('content.edit') }}</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('settings.projectUsers.destroy', $projectUser) }}">{{ __('content.delete') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('projects.index') }} ">{{ __('messages.goBack') }}</a>

            </div>

        </div>

    </section>

@endsection