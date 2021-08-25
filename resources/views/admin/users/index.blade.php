@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.users') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.users') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">{{ __('content.add') }}</a>
            </div>
                        
            <div class="box-body">
                
                {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.email') }}</th>
                            <th>{{ __('content.state') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($users as $user)
                            <tr 
                            @IF(!$user->isActive())
                                class='warning'
                            @ENDIF
                            >
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                @IF($user->isActive())
                                    <td>{{ __('content.active') }}</td>
                                @ELSE
                                    <td>{{ __('content.inactive') }}</td>
                                @ENDIF
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('users.show', $user) }}">{{  __('content.show')  }}</a>
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