@extends('layouts.main')

@section('title', __('content.roles'))

@section('section', __('content.roles'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('roles.index')}}"> {{ __('content.roles') }} </a></li>
        <li class="active">{{ __('content.permits') }}</li>
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
                <h3 class="box-title"><strong>{{ __('messages.rolePermits') }} {{ $role->name }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('rolePermits.create',$role) }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.permit') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($rolePermits as $rolePermit)
                            <tr>
                                <td>{{ $rolePermit->permit->name }}</td>
                                <td>
                                    @if ($rolePermit->isActive())
                                        <a class="btn btn-danger btn-xs" href="{{ route('rolePermits.activate', [$rolePermit, '0']) }}">{{ __('content.deactivate') }}</a>
                                    @else
                                        <a class="btn btn-info btn-xs" href="{{ route('rolePermits.activate', [$rolePermit, '1']) }}">{{ __('content.activate') }}</a>
                                    @endif

                                    {{-- @if($role->name!='SUPERUSER')
                                        <a class="btn btn-info btn-xs" href="{{ route('rolePermits.destroy', $rolePermit)}}">{{ __('content.delete') }}</a>
                                    @endif --}}
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