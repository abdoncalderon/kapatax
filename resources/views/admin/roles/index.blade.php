@extends('layouts.main')

@section('title', __('content.roles'))

@section('section', __('content.roles'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.roles') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.roles') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($roles as $role)
                            <tr
                                @if(!$role->isActive())
                                    class='warning'
                                @endif
                            >
                                <td>{{ $role->name }}</td>
                                @if($role->isActive())
                                    <td>{{ __('content.active') }}</td>
                                @else
                                    <td>{{ __('content.inactive') }}</td>
                                @endif
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('roles.edit', $role)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-info btn-xs" href="{{ route('roleMenus.index', $role)}}">{{ __('content.menus') }}</a>
                                    <a class="btn btn-info btn-xs" href="{{ route('rolePermits.index', $role)}}">{{ __('content.permits') }}</a>
                                    @if($role->id!=1)
                                        @if ($role->isActive())
                                            <a class="btn btn-danger btn-xs" href="{{ route('roles.activate', [$role, '0']) }}">{{ __('content.deactivate') }}</a>
                                        @else
                                            <a class="btn btn-info btn-xs" href="{{ route('roles.activate', [$role, '1']) }}">{{ __('content.activate') }}</a>
                                        @endif
                                        <a class="btn btn-danger btn-xs" href="{{ route('roles.destroy', $role)}}">{{ __('content.delete') }}</a>
                                    @endif
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