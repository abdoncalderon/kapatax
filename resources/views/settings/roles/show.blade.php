@extends('layouts.main')

@section('title', __('content.roles'))

@section('section', __('content.roles'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
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

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- Name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $role->name }}">
                                </div>
                            </div>
                            
                            {{-- Status  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.status') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    @IF($role->isActive())
                                        <input disabled class="form-control" value="{{ __('content.active') }}">
                                    @ELSE
                                        <input disabled class="form-control" value="{{ __('content.inactive') }}">
                                    @ENDIF
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        @IF($role->name!='SUPERUSER')
                        <a class="btn btn-success btn-sm" href=" {{ route('roles.edit', $role) }} ">{{ __('content.edit') }}</a>
                        @ENDIF
                        <a class="btn btn-danger btn-sm" href=" {{ route('roles.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection