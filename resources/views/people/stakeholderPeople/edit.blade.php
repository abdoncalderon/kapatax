@extends('layouts.main')

@section('title', __('content.person'))

@section('section', __('content.edit'))

@section('level', __('content.admissions'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('people.index')}}"> {{ __('content.people') }} </a></li>
        <li><a href="{{ route('stakeholderPeople.index',$stakeholderPerson->person)}}"> {{ __('content.admissions') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.editAdmissionRecord').' | '.$stakeholderPerson->person->fullName }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('stakeholderPeople.update',$stakeholderPerson) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Person --}}

                            <input id="person" class="hidden" type="text" name="person_id" value="{{ $stakeholderPerson->person_id }}">

                            {{-- stakeholder --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.organization') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="stakeholder" disabled class="form-control" type="text" name="stakeholder" value="{{ $stakeholderPerson->stakeholder->name }}">
                                </div>
                            </div>

                            <!-- Admission date -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.admissionDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="admissionhDate" class="form-control pull-right" type="date" name="admissionDate" value="{{ $stakeholderPerson->admissionDate }}" required>
                                    @error('admissionDate')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Departure date -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.departureDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="departureDate" class="form-control pull-right" type="date" name="departureDate" value="{{ $stakeholderPerson->departureDate }}">
                                    @error('departureDate')
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
                                    <select id="position" name="position_id" class="form-control" style="width: 100%;" required>
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
                                    <select id="sector" name="sector_id" class="form-control" style="width: 100%;" required>
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
                                    <select id="department" name="department_id" class="form-control" style="width: 100%;" required>
                                        <option value="{{ $stakeholderPerson->department->id }}">{{ $stakeholderPerson->department->name }}</option>
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
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.update') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('stakeholderPeople.index',$stakeholderPerson->person) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection