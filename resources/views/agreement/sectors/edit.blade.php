@extends('layouts.main')

@section('title', __('content.sectors'))

@section('section', __('content.sectors'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('sectors.index')}}"> {{ __('content.sectors') }} </a></li>
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
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ $sector->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('sectors.update',$sector) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10" >
                                <input id="name" type="text" class="form-control" name="name" value="{{ $sector->name }}" placeholder="{{ __('content.name') }}">
                            </div>
                        </div>


                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('sectors.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection