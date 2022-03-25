@extends('layouts.main')

@section('title', __('content.users'))

@section('section', __('content.add'))

@section('level', __('content.admissions'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('people.index')}}"> {{ __('content.people') }} </a></li>
        <li><a href="{{ route('stakeholderPeople.index',$person)}}"> {{ __('content.admissions') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.addAdmissionTo').' '.$person->fullName }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('stakeholderPeople.store') }}">
                @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- Person --}}

                            <input type="hidden" name="person_id" value="{{ $person->id }}">
                            
                            {{-- Stakeholder --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.organization')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <select id="stakeholder_id" class="form-control" name="stakeholder_id" required>
                                        <option value="">{{__('messages.select')}} {{__('content.stakeholder')}}</option>
                                        @foreach (current_user()->project->stakeholders as $stakeholder)
                                            <option value="{{ $stakeholder->id }}">{{ $stakeholder->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Admission date -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.admissionDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="admissionhDate" class="form-control pull-right" name="admissionDate" type="date" required >
                                    @error('admissionDate')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- function --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.function') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="function" name="function_id" class="form-control" style="width: 100%;" required>
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

                            {{-- position --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.position') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="position" name="position_id" class="form-control" data-placeholder=" {{__('content.position')}}" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.position')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addPosition"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- sectors --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.sector') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="sector" name="sector_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.sector')}}</option>
                                        @foreach ($sectors as $sector)
                                            <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addSector"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- department --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.department') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="department" name="department_id" class="form-control" data-placeholder=" {{__('content.department')}}" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.department')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addDepartment"> + </button>
                                    </span>
                                </div>
                            </div>
                            

                        </div>

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('stakeholderPeople.index',$person) }} ">{{ __('content.cancel') }}</a>
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

    {{-- Modal Window Add Position --}}

    <div class="modal fade" id="addPosition" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('positions.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.position') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input id="functionModalId" type="hidden" class="form-control" name="function_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.function') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="functionModalText" type="text" disabled class="form-control" name="function">
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
    </div>

    {{-- Modal Window Add Sector --}}

    <div class="modal fade" id="addSector" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

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

    {{-- Modal Window Add Department --}}

    <div class="modal fade" id="addDepartment" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('departments.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.department') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <input id="sectorModalId" type="hidden" class="form-control" name="sector_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.sector') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="sectorModalText" type="text" disabled class="form-control" name="sector">
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
    </div>

@endsection