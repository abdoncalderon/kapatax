@extends('layouts.main')

@section('title', __('content.notes'))

@section('section', __('content.notes'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('folios.index')}}"> {{ __('content.folios') }} </a></li>
        <li class="active">{{ __('content.create') }}</li>
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
                    <h3 class="box-title"><strong>{{ __('content.create').' '.__('content.note') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('notes.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- folio_id --}}
    
                            <input id="folio_id" hidden type="text" name="folio_id" value="{{ $folio->id }}">


                            {{-- date --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                                <div class="col-sm-10" >
                                    <input id="date" disabled type="text" class="form-control" name="date" value="{{ $folio->date }}">
                                </div>
                            </div>
                            
                            {{-- location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <input id="location" disabled type="text" class="form-control" name="location" value="{{ $folio->location->name }}">
                                </div>
                            </div>

                            {{-- turn --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.turn') }}</label>
                                <div class="col-sm-10" >
                                    <select id="turn_id" name="turn_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.turn')}}</option>
                                        @foreach ($folio->location->turns as $turnLocation)
                                            <option value="{{ $turnLocation->turn_id }}">{{ $turnLocation->turn->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Note Date --}}
    
                            <input id="date" hidden type="text" name="date" value="{{ now()->format('Y-m-d H:i:s') }}">

                            {{-- note --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.description') }}</label>
                                <div class="col-sm-10" >
                                    <textarea id="note" class="form-control @error('note') is-invalid @enderror" rows="20" style="resize: vertical" maxlength="65000" name="note" required autocomplete="report"></textarea>
                                    @error('note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- user_id --}}
    
                            <input id="user_id" hidden type="text" name="user_id" value="{{ auth()->user()->id }}">

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('folios.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection


