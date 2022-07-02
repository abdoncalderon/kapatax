@extends('layouts.main')

@section('title', __('content.settings'))

@section('section', __('content.users'))

@section('level', __('content.projects'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projects.index') }}"> {{ __('content.projects') }} </a></li>
        <li><a href="{{ route('settings.projectUsers.index',$projectUser->project) }}"> {{ __('content.users') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.editUserAssignToProject').' '.$projectUser->project->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('settings.projectUsers.update', $projectUser) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                                {{-- Project Id (hide) --}}

                                <input id="project_id" type="hidden" class="form-control" name="project_id" value="{{ $projectUser->project_id}}">
    
                                {{-- project --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.project') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                        <input id="project" disabled type="text" class="form-control" name="project" value="{{ $projectUser->project->name }}">
                                    </div>
                                </div>

                                 {{-- User Id (hide) --}}

                                 <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $projectUser->user_id}}">
    
                                 {{-- user --}}
     
                                 <div class="form-group">
                                     <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                     <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                         <input id="user" disabled type="text" class="form-control" name="user" value="{{ $projectUser->user->person->fullName }}">
                                     </div>
                                 </div>
    
                                {{-- role --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <select name="project_role_id" class="form-control" style="width: 100%;">
                                            @foreach ($project->projectRoles as $projectRole)
                                                <option value="{{ $projectRole->id }}"
                                                    @if($projectRole->id==$projectUser->project_role_id)
                                                        selected
                                                    @endif      
                                                >{{ $projectRole->role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                        </div>
                        

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('settings.projectUsers.index',$projectUser->project) }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>


@endsection