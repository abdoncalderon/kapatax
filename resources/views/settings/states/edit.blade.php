@extends('layouts.main')

@section('title', __('content.states'))

@section('section',__('content.states'))

@section('level',__('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('states.index') }}"> {{ __('content.states') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $state->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('states.update', $state) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" disabled type="text" class="form-control" name="name" value="{{ old('name', $state->name) }}" placeholder="{{ __('content.name') }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- country --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.country') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select name="country_id" class="form-control" style="width: 100%;">
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}"
                                                @if($country->country_id==$country->id):
                                                    selected="selected"
                                                @endif
                                            >{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>
                        

                    </div>

                    {{-- Submit --}}
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('states.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection