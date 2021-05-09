@extends('layouts.main')

@section('title', __('content.roles'))

@section('section', __('content.roles'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.roles') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

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
                            <th>{{ __('content.state') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($roles as $role)
                        <tr
                        @IF($role->status==0)
                        class='warning'
                        @ENDIF
                        >
                            <td>{{ $role->name }}</td>
                            @IF($role->status==1)
                                <td>{{ __('content.active') }}</td>
                            @ELSE
                                <td>{{ __('content.inactive') }}</td>
                            @ENDIF
                            <td>
                                @IF($role->name!='SUPERUSER')
                                <a class="btn btn-info btn-xs" href="{{ route('roles.show', $role)}}">Ver</a>
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