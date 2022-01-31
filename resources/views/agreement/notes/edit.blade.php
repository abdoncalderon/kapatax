@extends('layouts.main')

@section('title', ' - '.date('Y-M-d',strtotime($note->folio->date)).' - '.$note->folio->location->name.' - '.$note->turn->name)

@section('section', __('content.notes'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('notes.index')}}"> {{ __('content.notes') }} </a></li>
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
                    <h3 class="box-title"><strong>{{ __('content.edit').' '.__('content.note') }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('notes.update',$note) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- date --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.date') }}</label>
                                <div class="col-sm-10" >
                                    <input id="date" disabled type="text" class="form-control" name="date" value="{{ $note->folio->date }}">
                                </div>
                            </div>
                            
                            {{-- location --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.location') }}</label>
                                <div class="col-sm-10" >
                                    <input id="date" disabled type="text" class="form-control" name="date" value="{{ $note->folio->location->name }}">
                                </div>
                            </div>

                            {{-- turn --}}
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.turn') }}</label>
                                <div class="col-sm-10" >
                                    <input id="turn" disabled type="text" class="form-control" name="turn" value="{{ $note->turn->name }}">
                                </div>
                            </div>

                            {{-- note --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.note') }}</label>
                                <div class="col-sm-10" >
                                    <textarea id="note" class="form-control @error('note') is-invalid @enderror" rows="20" style="resize: vertical" maxlength="65000" name="note" required autocomplete="report">{{ $note->note }}</textarea>
                                    @error('note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            

                            {{-- attachments --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.attachments') }}</label>
                                <div class="col-sm-10" >
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-attachments">
                                        {{ __('content.add') }}
                                    </button>
                                    <div>
                                        <br>
                                    </div>
                                    <table id="attachments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.attachment') }}</th>
                                                <th>{{ __('content.description') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($note->attachments as $attachmentNote)
                                                <tr>
                                                    <td><img src="{{ asset('images/attachments/notes/'.$attachmentNote->filename) }}" alt="" style="max-width: 50%; min-width: 100%"></td>
                                                    <td>{{ $attachmentNote->description }}</td>
                                                    <td>
                                                        <a class="btn btn-info btn-xs" href="{{ route('attachmentNotes.destroy',$attachmentNote) }}">{{ __('content.delete') }}</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{-- Note Status --}}
    
                            <input id="status" hidden type="text" name="status" value="{{ $note->status }}">

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" id="save" class="btn btn-success btn-sm">{{ __('content.save') }}</button>
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-save-note">{{ __('content.save') }} & {{ __('content.close') }}</button>
                        <a class="btn btn-info btn-sm" href=" {{ route('folios.index') }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Add Attachemnts in Note --}}

    <div class="modal fade" id="modal-attachments">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('attachmentNotes.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.attachment') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- Daily Report --}}

                            <input id="note_id" hidden type="text" name="note_id" value="{{ $note->id }}">

                            {{-- Filename --}}

                            <div class="form-group">
                                <label for="image">{{__('content.image')}}</label>
                                <input id="image" type="file" class="form-control" name="image" accept="image/x-png,image/gif,image/jpeg" required>
                            </div>

                            {{-- Description --}}

                            <div class="form-group">
                                <label for="description">{{__('content.description')}}</label>
                                <textarea id="description" class="form-control" name="description" style="resize: vertical"></textarea>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.add')}}</button>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

    {{-- Save & Close Note--}}

    <div class="modal fade" id="modal-save-note">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{ __('content.save').' & '.__('content.close').' '.__('content.note') }}</h4>
                </div>
                <div class="modal-body">
                    <div>
                        <p class="">{{ __('messages.confirmsavenote') }}</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.no')}}</button>
                    <button type="button" class="btn btn-primary" onclick="$('#status').val('1');$('#save').click();">{{__('content.yes')}}</button>
                </div>
            </div>
        </div>
    </div>

@endsection