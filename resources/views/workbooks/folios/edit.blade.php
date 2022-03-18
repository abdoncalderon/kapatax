@extends('layouts.main')

@section('title', __('content.folio'))

@section('section', __('content.folios'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('folios.index')}}"> {{ __('content.folios') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">

                
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.edit') }} {{ __('content.number') }} {{ __('content.folio') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('folios.update',$folio) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Current Sequence --}}

                            <div class="form-group">
                                <label for="currentNumber" class="col-sm-2 control-label">{{ __('content.current') }} {{ __('content.number') }}</label>
                                <div class="col-sm-10" >
                                    <input disabled class="form-control" type="text"value="{{ $folio->number }}">
                                </div>
                            </div>

                            {{-- New Sequence --}}

                            <div class="form-group">
                                <label for="number" class="col-sm-2 control-label">{{ __('content.new') }} {{__('content.number')}}</label>
                                <div class="col-sm-10">
                                    <input id="number" class="form-control" name="number" type="number"  value="{{ $folio->number }}" min="1" required>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('folios.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection