@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.users') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div class="box box-info">
            
            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.users') }}</strong></h3> | 
                {{-- <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">{{ __('content.add') }}</a> --}}
            </div>
                        
            <div class="box-body">
                
                {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            {{-- <th>{{ __('content.name') }}</th> --}}
                            <th>{{ __('content.person') }}</th>
                            <th>{{ __('content.email') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($users as $user)
                            <tr 
                            @if(!$user->isActive())
                                class='warning'
                            @endif
                            >
                                <td>{{ $user->person->fullName }}</td>
                                <td>{{ $user->email }}</td>
                                @if($user->isActive())
                                    <td>{{ __('content.active') }}</td>
                                @else
                                    <td>{{ __('content.inactive') }}</td>
                                @endif
                                <td>
                                    {{-- <a class="btn btn-info btn-xs" href="{{ route('users.edit', $user) }}">{{ __('content.edit') }}</a> --}}
                                    <a class="btn btn-info btn-xs" href="{{ route('userProjects.index', $user) }}">{{ __('content.projects') }}</a>
                                    @if($user->id!=1)
                                        @if ($user->isActive())
                                            <a class="btn btn-danger btn-xs" href="{{ route('users.activate', [$user, '0']) }}">{{ __('content.deactivate') }}</a>
                                        @else
                                            <a class="btn btn-info btn-xs" href="{{ route('users.activate', [$user, '1']) }}">{{ __('content.activate') }}</a>
                                        @endif
                                        <a class="btn btn-danger btn-xs" href="{{ route('users.destroy', $user)}}">{{ __('content.delete') }}</a>
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