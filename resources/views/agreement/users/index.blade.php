@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.production'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.users') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.assignmentLocationtoUser') }}</strong></h3> | 
                {{-- <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">{{ __('content.add') }}</a> --}}
            </div>
                        
            <div class="box-body">
                
                {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.role') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->user->name }}</td>
                            <td>{{ $user->role->name }}</td>
                            @if($user->user->isActive())
                                <td>{{ __('content.active') }}</td>
                            @else
                                <td>{{ __('content.inactive') }}</td>
                            @endif
                            <td>
                                <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('locationsUsers.index', $user->user) }}">{{  __('content.assignments')  }}</a>
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