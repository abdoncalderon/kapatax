@extends('layouts.main')

@section('title', __('content.person'))

@section('section', __('content.people'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('people.index')}}"> {{ __('content.people') }} </a></li>
        <li><a href="{{ route('people.edit',$stakeholderPerson->person)}}"> {{ __('content.person') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
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
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.editAdmissionRecord').' '.$stakeholderPerson->person->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('stakeholderPeople.update',$stakeholderPerson) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- stakeholder --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.stakeholder') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="stakeholder" disabled class="form-control" type="text" name="stakeholder" value="{{ $stakeholderPerson->stakeholder->name }}">
                                </div>
                            </div>

                            <!-- Admission date -->

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.admissionDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10 col-md-1 col-lg-1">
                                    <input id="admissionhDate" class="form-control pull-right @error('admissionDate') is-invalid @enderror" type="date" name="admissionDate" value="{{ $stakeholderPerson->admissionDate }}">
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
                                <div class="input-group input-group-sm col-xs-12 col-sm-10 col-md-1 col-lg-1">
                                    <input id="departureDate" class="form-control pull-right @error('departureDate') is-invalid @enderror" type="date" name="departureDate">
                                    @error('departureDate')
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
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.update') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('people.edit',$stakeholderPerson->person) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection