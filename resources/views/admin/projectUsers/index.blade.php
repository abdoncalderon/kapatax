@extends('layouts.main')

@section('title', __('content.roles'))

@section('section', __('content.roles'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('roles.index')}}"> {{ __('content.roles') }} </a></li>
        <li class="active">{{ __('content.menus') }}</li>
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
                <h3 class="box-title"><strong>{{ __('messages.roleMenus') }} {{ $role->name }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('roleMenus.create',$role) }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.menu') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($roleMenus as $roleMenu)
                            <tr>
                                <td>{{ $roleMenu->menu->code }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('menus.show', $roleMenu->menu) }}">{{ __('content.show') }}</a>
                                    @IF($role->name!='SUPERUSER')
                                    <a class="btn btn-info btn-xs" href="{{ route('roleMenus.destroy', $roleMenu)}}">{{ __('content.delete') }}</a>
                                    @ENDIF
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