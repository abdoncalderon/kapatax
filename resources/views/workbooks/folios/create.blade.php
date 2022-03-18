@extends('layouts.main')

@section('title', __('content.folio'))

@section('section', __('content.folios'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('folios.index')}}"> {{ __('content.folios') }} </a></li>
        <li class="active">{{ __('content.insert') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.insert').' '.__('content.folio') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('folios.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <select id="folio_location_id" name="location_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.location')}}</option>
                                        @foreach ($locationProjectUsers as $locationProjectUser)
                                            <option value="{{ $locationProjectUser->location_id }}">{{ $locationProjectUser->location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- date --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                                <div class="col-sm-10" >
                                    <input id="date" type="date" class="form-control" name="date" required autofocus>
                                </div>
                            </div>

                            {{-- user_id --}}
    
                            <input id="user_id" hidden type="text" name="project_user_id" value="{{ current_user()->id }}">
    
                            {{-- number --}}
    
                            <input id="number" hidden type="text" name="number">

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


