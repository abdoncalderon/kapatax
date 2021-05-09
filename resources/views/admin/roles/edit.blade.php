@extends('layouts.main')

@section('title', __('content.roles'))

@section('section',__('content.roles'))

@section('level',__('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('roles.index')}}"> {{ __('content.roles') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $role->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('roles.update', $role) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10" >
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $role->name) }}" placeholder="Nombre">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- status --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.state') }}</label>
                            <div class="col-sm-10">
                                <select name="status" class="form-control" data-placeholder="Estado" style="width: 100%;" value="{{ old('status', $role->status) }}">
                                    <option value="0"
                                        @if($role->status==0):
                                            selected="selected"
                                        @endif
                                        >{{ __('content.inactive') }}</option>
                                    <option value="1"
                                        @if($role->status==1):
                                            selected="selected"
                                        @endif
                                        >{{ __('content.active') }}</option>
                                </select>
                            </div>
                        </div>

                    </div>

                    {{-- Submit --}}
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('roles.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection