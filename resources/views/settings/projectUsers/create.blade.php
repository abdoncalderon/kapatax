@extends('layouts.main')

@section('title', __('content.settings'))

@section('section', __('content.users'))

@section('level', __('content.projects'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projects.index')}}"> {{ __('content.projects') }} </a></li>
        <li><a href="{{ route('settings.projectUsers.index',$project)}}"> {{ __('content.users') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.addUserToProject').' '.$project->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('settings.projectUsers.store', $project) }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                                {{-- Project Id (hide) --}}

                                <input id="project_id" type="hidden" name="project_id" value="{{ $project->id }}">
    
                                {{-- User--}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.user') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <select id="user" name="user_id" class="form-control" style="width: 100%;" required>
                                            <option value="">{{ __('messages.choiceUser') }}</option>
                                            @foreach ($availablesUsers as $user)
                                                <option value="{{ $user->id }}">{{ $user->person->fullName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> 
    
                                {{-- role --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <select id="role" name="project_role_id" class="form-control" style="width: 100%;">
                                            <option value="">{{ __('messages.choiceRole') }}</option>
                                            @foreach ($project->projectRoles as $projectRole)
                                                <option value="{{ $projectRole->id }}">{{ $projectRole->role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                        </div>

                        

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('settings.projectUsers.index',$project) }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Modal Window Add Role --}}

    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('roles.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.role') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>

@endsection