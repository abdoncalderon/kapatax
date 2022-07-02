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

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.rolePermits') }} {{ $role->name }}</strong></h3> | 
                <button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#clonePermits">{{ __('content.clone') }} {{ __('content.from') }}... </button>
            </div>
            
            <div class="box-body">

                
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

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
                                </td>

                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('roles.index') }} ">{{ __('messages.goBack') }}</a>

            </div>

        </div>

    </section>

    {{-- Modal Clone Permits --}}

    <div class="modal fade" id="clonePermits" tabindex="-1" role="dialog" aria-labelledby="clonePermits" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('rolePermits.clone') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.clone') }} {{ __('content.permits') }} {{ __('content.from') }} ...</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">


                        <input type="hidden" class="form-control" name="role_target_id" value="{{ $role->id }}">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                            <select name="role_source_id" class="form-control" required>
                                <option value="">{{ __('messages.select') }} {{ __('content.role') }}</option>
                                @foreach ($otherRoles as $role)
                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.clone') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

@endsection