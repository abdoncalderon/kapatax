@extends('layouts.main')

@section('title', __('content.positions'))

@section('section', __('content.positions'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('positions.index')}}"> {{ __('content.positions') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Error Messages --}}

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $errors->first() }}
                    </div>
                @endif

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('positions.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- Project Sector --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.sector') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <select id="sector" name="project_sector_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.sector')}}</option>
                                        @foreach ($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addSector"> + </button>
                                    </span>
                                </div>
                            </div> --}}

                            {{-- Deparment --}}

                            {{-- <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.department') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="department" name="department_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.department')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addDepartment"> + </button>
                                    </span>
                                </div>
                            </div> --}}

                            {{-- Project Function --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.function') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <select name="function_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.function')}}</option>
                                        @foreach ($functions as $function)
                                            <option value="{{ $function->id }}">{{ $function->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addFunction"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.position') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" type="text" class="form-control" name="name" placeholder="{{ __('content.name') }}">
                                    @error('name')
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
                        <a class="btn btn-danger btn-sm" href=" {{ route('positions.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Modal Window Add Function --}}

    <div class="modal fade" id="addFunction" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('functions.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.function') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- project --}}
    
                        <input id="project_id" hidden type="text" name="project_id" value="{{ current_user()->project->id }}">

                        {{-- Function name --}}
                                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.function') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="name" type="text" class="form-control" name="name" placeholder="{{ __('content.name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

    {{-- Modal Window Add Sector --}}

    {{-- <div class="modal fade" id="addSector" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('sectors.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.sector') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

    
                        <input id="project_id" hidden type="text" name="project_id" value="{{ current_user()->project->id }}">

                                
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.sectors') }}</label>
                            <div class="col-sm-10" >
                                <input id="name" type="text" class="form-control" name="name" placeholder="{{ __('content.name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    </div> --}}

    {{-- Modal Window Add Department --}}

    {{-- <div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('departments.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.function') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                       


                        <input id="sectorModalId" type="hidden" class="form-control" name="project_sector_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.sector') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="sectorModalText" type="text" disabled class="form-control" name="project_sector">
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="name" type="text" class="form-control" name="name" placeholder="{{ __('content.name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
    </div> --}}

@endsection