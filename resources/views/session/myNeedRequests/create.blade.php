@extends('layouts.main')

@section('title', __('content.home'))

@section('section', __('messages.myNeedRequests'))

@section('level', __('content.home'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('myNeedRequests.index')}}"> {{ __('messages.needRequests') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.create') }} {{ __('messages.needRequest') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('myNeedRequests.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- applicant --}}

                            <input id="applicant" type="hidden" name="applicant_id" value="{{ current_user()->id }}">

                            {{-- date --}}

                            <input id="date" type="hidden" name="date" value="{{ now()->format('Y-m-d H:i:s') }}">

                            {{-- status --}}

                            <input id="status" type="hidden" name="status_id" value="0">


                            {{-- zone --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.zone') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="zone" name="zone_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.zone')}}</option>
                                        @foreach ($zones as $zone)
                                            <option value="{{ $zone->id }}">{{ $zone->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- location --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="location" name="location_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.location')}}</option>
                                    </select>
                                </div>
                            </div>
                            
                            {{-- cost account --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.costAccount') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="cost_account" name="cost_account_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('messages.costAccount')}}</option>
                                    </select>
                                </div>
                            </div>

                            {{-- description --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.descriptionOfNeed') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" style="resize: vertical; height: 100px;" rows="5" placeholder="{{ __('messages.typeADescription') }}" required></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- expected cost --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.expectedCost') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="expectedCost" class="form-control @error('expectedCost') is-invalid @enderror" name="expectedCost" type="number" placeholder="{{ __('messages.expectedCost') }}" value="0.0" min="0.0">
                                    @error('expectedCost')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- approving user --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.approvingUser') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="approving_user" name="approver_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.approver')}}</option>
                                        @foreach ($approvers as $approver)
                                            <option value="{{ $approver->person_id }}">{{ $approver->person->fullName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                        </div>

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.create') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('myNeedRequests.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    

@endsection