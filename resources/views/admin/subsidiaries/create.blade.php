@extends('layouts.main')

@section('title', __('content.subsidiaries'))

@section('section', __('content.subsidiaries'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('subsidiaries.index')}}"> {{ __('content.subsidiaries') }} </a></li>
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
               
                <form class="form-horizontal" method="POST" action="{{ route('subsidiaries.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10" >
                                <input id="name" class="form-control" name="name" type="text" placeholder="{{ __('content.name') }}" maxlength="255" required>
                            </div>
                        </div>

                        {{-- code --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="col-sm-10" >
                                <input id="code" class="form-control" name="code" type="text" placeholder="{{ __('content.code') }}" maxlength="255" required>
                            </div>
                        </div>

                        {{-- company --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.company') }}</label>
                            <div class="col-sm-10" >
                                <select name="company_id" class="form-control" data-placeholder="{{ __('content.company') }}" style="width: 100%;">
                                    @foreach ($companies as $company)
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- division --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.division') }}</label>
                            <div class="col-sm-10" >
                                <select name="division_id" class="form-control" data-placeholder="{{ __('content.division') }}" style="width: 100%;">
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('subsidiaries.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection