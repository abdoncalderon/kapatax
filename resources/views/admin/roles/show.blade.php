@extends('layouts.main')

@section('title', __('content.roles'))

@section('section', __('content.roles'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('roles.index')}}"> {{ __('content.roles') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $role->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- Id  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">Id</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $role->id }}">
                            </div>
                        </div>

                        {{-- Name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $role->name }}">
                            </div>
                        </div>
                        
                        {{-- State  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                            <div class="col-sm-10">
                                @IF($role->status==1)
                                    <input disabled class="form-control" value="{{ __('content.active') }}">
                                @ELSE
                                    <input disabled class="form-control" value="{{ __('content.inactive') }}">
                                @ENDIF
                            </div>
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('roles.edit', $role) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('roles.index') }} ">{{ __('content.returntolist') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection