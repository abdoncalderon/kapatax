@extends('layouts.main')

@section('title', __('content.unities'))

@section('section',__('content.unities'))

@section('level',__('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('unities.index')}}"> {{ __('content.unities') }} </a></li>
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
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $unity->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('unities.update', $unity) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10" >
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $unity->name) }}" placeholder="{{ __('content.name') }}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert"  style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- code --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="col-sm-10" >
                                <input id="code" type="text" class="form-control" name="code" value="{{ old('code', $unity->code) }}" placeholder="{{ __('content.code') }}" maxlength="3">
                                @error('code')
                                    <span class="invalid-feedback" role="alert" style="color:red">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    {{-- Submit --}}
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('unities.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection