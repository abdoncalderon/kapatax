@extends('layouts.main')

@section('title', __('content.projects').' ['.__('content.roles').']')

@section('section', __('content.projects').' ['.__('content.roles').']')

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projects.index')}}"> {{ __('content.projects') }} </a></li>
        <li><a href="{{ route('projectRoles.index',$project)}}"> {{ __('content.roles') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.assignRoleToProject').' '.$project->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('projectRoles.store', $project) }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                                {{-- Project Id (hide) --}}

                                <input id="project_id" type="hidden" class="form-control" name="project_id" value="{{ $project->id}}">
    
                                {{-- Role --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <select name="role_id" class="form-control" style="width: 100%;">
                                            @foreach ($availablesRoles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                        </div>

                        

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('projectRoles.index',$project) }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    

@endsection