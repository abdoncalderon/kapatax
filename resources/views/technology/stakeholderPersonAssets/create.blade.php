@extends('layouts.main')

@section('title', __('content.administration'))

@section('section', __('content.administration'))

@section('level', __('content.assets'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('technology.stakeholderPeople.index')}}"> {{ __('content.people') }} </a></li>
        <li><a href="{{ route('technology.stakeholderPersonAssets.index',$stakeholderPerson)}}"> {{ __('content.assets') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('messages.assignAssetTo').' '.$stakeholderPerson->person->fullName }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('technology.stakeholderPersonAssets.store', $stakeholderPerson) }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- Stakeholder Person Id (hide) --}}

                            <input id="stakeholder_person_id" type="hidden" class="form-control" name="stakeholder_person_id" value="{{ $stakeholderPerson->id}}">

                            {{-- Project User Id (hide) --}}

                            <input id="deliveredBy" type="hidden" class="form-control" name="deliveredBy" value="{{ current_user()->id }}">

                            {{-- Asset --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.asset') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="asset" name="asset_id" class="form-control" style="width: 100%;" required>
                                        <option value="">{{__('messages.select')}} {{__('content.asset')}}</option>
                                        @foreach ($assets as $asset)
                                            <option value="{{ $asset->id }}">{{ $asset->serialNumber }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Family --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.family') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="family" disabled class="form-control">
                                </div>
                            </div>

                            {{-- Category --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.category') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="category" disabled class="form-control">
                                </div>
                            </div>

                            {{-- Brand --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.brand') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="brand" disabled class="form-control">
                                </div>
                            </div>

                            {{-- Model --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.model') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input id="model" disabled class="form-control">
                                </div>
                            </div>

                            {{-- Delivery Date  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.deliveryDate') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input type="date" class="form-control @error('deliveryDate') is-invalid @enderror" name="deliveryDate" required>
                                    @error('sdeliveryDate')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Comment --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.comment')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <textarea id="comment" class="form-control @error('deliveryDate') is-invalid @enderror" name="comment" style="resize: vertical; height: 100px;"></textarea>
                                    @error('comment')
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
                        <a class="btn btn-danger btn-sm" href=" {{ route('technology.stakeholderPersonAssets.index',$stakeholderPerson) }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

      

@endsection