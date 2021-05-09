@extends('layouts.main')

@section('title', __('content.user'))

@section('section', __('content.users'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('users.index')}}"> {{ __('content.users') }} </a></li>
        <li class="active">{{ __('content.permits') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.permitsAssignedTo') }} {{ $user->name }} </strong></h3>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Form  --}}

                <form class="form-horizontal">

                    @foreach ($user->permits as $permit)

                        {{-- Form Body --}}

                        <div class="box-body">

                            <div class="col-sm-4 col-md-6 col-lg-10">
                                
                                {{-- Create Folio  --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.createFolio') }}</label>
                                    <div class="col-sm-10" >
                                        <input id="create_folio" disabled type="checkbox" name="create_folio" {{ checked($permit->create_folio) }} >
                                    </div>
                                </div>

                                {{-- Create Report --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.createReport') }}</label>
                                    <div class="col-sm-10" >
                                        <input id="create_dailyreport" disabled type="checkbox" name="create_dailyreport" {{ checked($permit->create_dailyreport) }}>
                                        
                                    </div>
                                </div>

                                {{-- Create Note  --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.createNote') }}</label>
                                    <div class="col-sm-10" >
                                        <input id="create_note" disabled type="checkbox" name="create_note" {{ checked($permit->create_note) }}>
                                        
                                    </div>
                                </div>

                                {{-- Create Comment  --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.createComment') }}</label>
                                    <div class="col-sm-10" >
                                        <input id="create_comment" disabled type="checkbox" name="create_comment" {{ checked($permit->create_comment) }}>
                                    
                                    </div>
                                </div>

                                {{-- Print Report  --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.printReport') }}</label>
                                    <div class="col-sm-10" >
                                        <input id="print_dailyreport" disabled type="checkbox" name="print_dailyreport" {{ checked($permit->print_dailyreport) }}>
                                        
                                    </div>
                                </div>

                                {{-- Print Note  --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.printNote') }}</label>
                                    <div class="col-sm-10" >
                                        <input id="print_note" disabled type="checkbox" name="print_note" {{ checked($permit->print_note) }}>
                                        
                                    </div>
                                </div>

                                {{-- Print Folio  --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.printFolio') }}</label>
                                    <div class="col-sm-10" >
                                        <input id="print_folio" disabled type="checkbox" name="print_folio" {{ checked($permit->print_folio) }}>
                                        
                                    </div>
                                </div>


                                {{-- Edit Sequence  --}}

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">{{ __('messages.editSequence') }}</label>
                                    <div class="col-sm-10" >
                                        <input id="edit_sequence" disabled type="checkbox" name="edit_sequence" {{ checked($permit->edit_sequence) }}>
                                    </div>
                                </div>
                        
                            </div>

                        </div>

                        {{-- Submit  --}}

                        <div class="box-footer">
                            <a class="btn btn-info btn-sm" href="{{ route('permits.edit', $permit)}}">{{ __('content.edit')}}</a>
                            <a class="btn btn-info btn-sm" href=" {{ route('users.index') }} ">{{ __('content.cancel') }}</a>
                        </div>
                    
                    @endforeach

                </form>

            </div>

        </div>

    </section>

@endsection