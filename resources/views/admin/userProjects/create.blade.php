@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.users'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('users.index')}}"> {{ __('content.users') }} </a></li>
        <li><a href="{{ route('projectUsers.index',$user)}}"> {{ __('content.projects') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.assignProjectToUser').' '.$user->person->fullName }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('userProjects.store', $user) }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                                {{-- User Id (hide) --}}

                                <input id="user_id" type="hidden" class="form-control" name="user_id" value="{{ $user->id}}">
    
                                {{-- project --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.project') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <select name="project_id" class="form-control" style="width: 100%;">
                                            @foreach ($availablesProjects as $project)
                                                <option value="{{ $project->id }}">{{ $project->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project_id')
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
    
                                {{-- role --}}
    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('content.role') }}</label>
                                    <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                        <select name="role_id" class="form-control" style="width: 100%;">
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <span class="invalid-feedback" role="alert" style="color:red">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                        </div>

                        

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('userProjects.index',$user) }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

      

@endsection