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

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" type="text" class="form-control" name="name" placeholder="Nombre">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Project Function --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.function') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <select name="project_function_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.function')}}</option>
                                        @foreach ($projectFunctions as $projectFunction)
                                            <option value="{{ $projectFunction->id }}">{{ $projectFunction->funct1on->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Project Sector --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.sector') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <select id="sectorPosition" name="project_sector_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.sector')}}</option>
                                        @foreach ($projectSectors as $projectSector)
                                            <option value="{{ $projectSector->id }}">{{ $projectSector->sector->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Deparment --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.department') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="departmentPosition" name="department_id" class="form-control" style="width: 100%;">
                                    </select>
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

@endsection