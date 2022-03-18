@extends('layouts.main')

@section('title', __('content.users').' ['.__('content.projects').']')

@section('section', __('content.users').' ['.__('content.projects').']')

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('people.edit',$user->person)}}"> {{ __('content.users') }} </a></li>
        <li class="active">{{ __('content.projects') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.accessToProjectsOf') }} {{ $user->person->fullName }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('userProjects.create',$user) }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.project') }}</th>
                            <th>{{ __('content.role') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($projectUsers as $projectUser)
                            <tr>
                                <td>{{ $projectUser->project->name }}</td>
                                <td>{{ $projectUser->projectRole->role->name }}</td>
                                <td>
                                    @if($projectUser->id!=1)
                                        <a class="btn btn-info btn-xs" href="{{ route('userProjects.edit', $projectUser)}}">{{ __('content.edit') }}</a>
                                        <a class="btn btn-danger btn-xs" href="{{ route('userProjects.destroy', $projectUser)}}">{{ __('content.delete') }}</a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('people.edit',$user->person) }} "><<< {{ __('content.return') }}</a>

            </div>

        </div>

    </section>

@endsection