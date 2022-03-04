@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.setting'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        {{-- <li><a href="{{ route('users.index')}}"> {{ __('content.users') }} </a></li> --}}
        <li class="active">{{ __('content.users') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.users') }} {{ current_user()->project->name }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('projectUsers.create') }}">{{ __('content.add') }}</a>
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
                        @foreach($projectUsers as $projectUser)
                            <tr>
                                <td>{{ $projectUser->user->user }}</td>
                                <td>{{ $projectUser->projectRole->role->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="#">{{ __('content.deactivate') }}</a>
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