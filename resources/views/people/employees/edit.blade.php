@extends('layouts.main')

@section('title', __('content.employees'))

@section('section', __('content.payroll'))

@section('level', __('content.employees'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('employees.index')}}"> {{ __('content.employees') }} </a></li>
        <li class="active">{{ __('content.payroll') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.employeeData') }}</strong></h3> | 
                <h3 class="box-title"><strong>{{ $stakeholderPerson->person->fullName }}</strong></h3>
            </div>

            <form method="POST" action="{{ route('employees.update',$stakeholderPerson) }}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            
                <div class="box-body">

                    <div class="col-md-12">
                            
                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- person --}}

                            <input type="hidden" name="person_id" value="{{ $stakeholderPerson->person_id }}">

                            {{-- stakeholder --}}

                            <input type="hidden" name="stakeholder_id" value="{{ $stakeholderPerson->stakeholder_id}} ">

                            {{-- function --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.function') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="function" name="function_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.function')}}</option>
                                        @foreach ($functions as $function)
                                            <option value="{{ $function->id }}"
                                                @if ($function->id==$stakeholderPerson->position->function_id)
                                                    selected
                                                @endif
                                            >{{ $function->name }}</option>
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
                                    <select id="position" name="position_id" class="form-control" data-placeholder=" {{__('content.position')}}" style="width: 100%;">
                                        <option value="{{ $stakeholderPerson->position->id }}">{{ $stakeholderPerson->position->name }}</option>
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
                                    <select id="sector" name="sector_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.sector')}}</option>
                                        @foreach ($sectors as $sector)
                                            <option value="{{ $sector->id }}"
                                                @if ($sector->id==$stakeholderPerson->department->sector->id)
                                                    selected
                                                @endif
                                            >{{ $sector->name }}</option>
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
                                    <select id="department" name="department_id" class="form-control" data-placeholder=" {{__('content.department')}}" style="width: 100%;">
                                        <option value="{{ $stakeholderPerson->department->id }}">{{ $stakeholderPerson->department->name }}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addDepartment"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- leaders --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.leader') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="leader" name="leader_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.leader')}}</option>
                                        @foreach ($leaders as $leader)
                                            <option value="{{ $leader->id }}"
                                                @if ($leader->id==$stakeholderPerson->leader_id)
                                                    selected
                                                @endif
                                            >{{ $leader->person->fullName }}</option>
                                        @endforeach
                                    </select>
                                    
                                </div>
                            </div>

                            <!-- Hired Since -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.hiredSince') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="admissionhDate" class="form-control pull-right" type="date" name="hiredSince" value="{{ old('hiredSince',$stakeholderPerson->hiredSince) }}" required>
                                    @error('hiredSince')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Contracted Until -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.contractedUntil') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="contractedUntil" class="form-control pull-right" type="date" name="contractedUntil" value="{{ old('contractedUntil',$stakeholderPerson->contractedUntil) }}" required>
                                    @error('contractedUntil')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- salary --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.salary') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="salary" class="form-control" name="salary" type="number" placeholder="{{ __('content.salary') }}" value="{{ old('salary',$stakeholderPerson->salary) }}" min="0.0">
                                    @error('salary')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- business email --}}
        
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="businessEmail" type="email" class="form-control" name="businessEmail" value="{{ old('businessEmail',$stakeholderPerson->businessEmail) }}" placeholder="{{ __('content.email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- contract file --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.agreement') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="contractFile" class="form-control" name="contractFile" type="file">
                                </div>
                            </div>

                            {{-- is approver --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.approver') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="isApprover" name="isApprover" type="checkbox" 
                                        @if ($stakeholderPerson->isApprover==1)
                                            checked
                                        @endif
                                    >
                                </div>
                            </div>

                        
                        </div>
                                
                    </div>
                    
                </div>
                <!-- /. box-body -->

                {{-- Submit  --}}

                <div class="box-footer">
                    <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                    <a class="btn btn-danger btn-sm" href=" {{ route('employees.index') }} ">{{ __('content.cancel') }}</a>
                </div>

            </form>

        </div>
        <!-- /. box-info -->

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