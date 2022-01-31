@extends('layouts.main')

@section('title', __('content.sectors'))

@section('section', __('content.sectors'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('sectors.index')}}"> {{ __('content.sectors') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $sector->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal">

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields  --}}

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- Name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <input disabled class="form-control" value="{{ $sector->name }}">
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('sectors.edit', $sector) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('sectors.index') }} ">{{ __('messages.returnToList') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection