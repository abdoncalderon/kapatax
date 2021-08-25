@extends('layouts.main')

@section('title', __('content.menus'))

@section('section', __('content.menus'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
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
                <h3 class="box-title"><strong>{{ __('content.menus') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('menus.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.code') }}</th>
                            <th>{{ __('content.father') }}</th>
                            <th>{{ __('content.route') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($menus as $menu)
                            <tr
                                @IF(!$menu->isActive())
                                    class='warning'
                                @ENDIF
                            >
                                <td>{{ $menu->code }}</td>
                                <td>{{ $menu->menu->code ?? '' }}</td>
                                <td>{{ $menu->route }}</td>
                                @IF($menu->isActive())
                                    <td>{{ __('content.active') }}</td>
                                @ELSE
                                    <td>{{ __('content.inactive') }}</td>
                                @ENDIF
                                <td>
                                    @IF($menu->name!='SUPERUSER')
                                    <a class="btn btn-info btn-xs" href="{{ route('menus.show', $menu)}}">{{ __('content.show') }}</a>
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