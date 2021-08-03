@extends('layouts.main')

@section('title', __('content.menus'))

@section('section', __('content.menus'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.menus') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.menus') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('menus.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.state') }}</th>
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
                                <td>{{ $menu->name }}</td>
                                @IF($menu->isActive())
                                    <td>{{ __('content.active') }}</td>
                                @ELSE
                                    <td>{{ __('content.inactive') }}</td>
                                @ENDIF
                                <td>
                                    @IF($menu->name!='SUPERUSER')
                                    <a class="btn btn-info btn-xs" href="{{ route('menus.show', $menu)}}">Ver</a>
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