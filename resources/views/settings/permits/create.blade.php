@extends('layouts.main')

@section('title', __('content.permits'))

@section('section', __('content.permits'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('permits.index') }}"> {{ __('content.permits') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }} {{ __('content.permit') }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('permits.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- menu --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.menu') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select name="menu_id" class="form-control" style="width: 100%;">
                                        @foreach ($menus as $menu)
                                            <option value="{{ $menu->id }}">{{ $menu->code }}</option>
                                        @endforeach
                                    </select>
                                    @error('menu_id')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" class="form-control" name="name" value="{{ old('name') }}" type="text" placeholder="{{ __('content.name') }}" maxlength="255" required>
                                    @error('name')
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
                        <a class="btn btn-danger btn-sm" href=" {{ route('permits.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection