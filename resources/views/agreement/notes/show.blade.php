@extends('layouts.main')

@section('title', ' - '.date('Y-M-d',strtotime($note->folio->date)).' - '.$note->folio->location->name.' - '.$note->turn->name)

@section('section', __('content.notes'))

@section('level', __('content.workbook'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('notes.index')}}"> {{ __('content.notes') }} </a></li>
        <li class="active">{{ __('content.show') }}</li>
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
                    <h3 class="box-title"><strong>{{ __('content.show').' '.__('content.note') }}</strong></h3>
                </div>

                {{-- Start Form  --}} 

                <form class="form-horizontal">

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
                                    <textarea id="note" disabled class="form-control" rows="20" style="resize: vertical" maxlength="65000" name="note">{{ $note->note }}</textarea>
                                </div>
                            </div>

                            <hr>

                            {{-- attachments --}}
    
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.attachments') }}</label>
                                <div class="col-sm-10" >
                                    <div>
                                        <br>
                                    </div>
                                    <table id="attachments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.attachment') }}</th>
                                                <th>{{ __('content.description') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($note->attachments as $attachmentNote)
                                                <tr>
                                                    <td><img src="{{ asset('images/agreement/notes/attachments/'.$attachmentNote->filename) }}" alt="" style="max-width: 100%; min-width:50%"></td>
                                                    <td>{{ $attachmentNote->description }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <hr>

                            {{-- comments --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.comments') }}</label>
                                <div class="col-sm-10" >
                                    @if(user_have_permission('workbook_create_comment'))
                                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-comments">
                                            {{ __('content.add') }}
                                        </button>
                                    @endif
                                    <div>
                                        <br>
                                    </div>
                                    <table id="comments" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>{{ __('content.date') }}</th>
                                                <th>{{ __('content.comment') }}</th>
                                                <th>{{ __('content.author') }}</th>
                                                <th>{{ __('content.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($note->comments as $commentNote)
                                                <tr>
                                                    <td>{{ $commentNote->date }}</td>
                                                    <td>{{ $commentNote->comment }}</td>
                                                    <td>{{ $commentNote->user->name }}</td>
                                                    <td>
                                                        @if($commentNote->user_id==auth()->user()->id)
                                                            <a class="btn btn-info btn-xs" href="{{ route('commentNotes.destroy',$commentNote) }}">{{ __('content.delete') }}</a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <a class="btn btn-info btn-sm" href=" {{ route('notes.index') }} ">{{ __('content.close') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

        

    </section>

    {{-- Add Comments in Note --}}

    <div class="modal fade" id="modal-comments">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('commentNotes.store') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.add').' '.__('content.comment') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- Note --}}

                            <input id="note_id" hidden type="text" name="note_id" value="{{ $note->id }}">

                            {{-- Date --}}

                            <input id="date" hidden type="text" name="date" value="{{ now()->format('Y-m-d H:i:s') }}">

                            {{-- Comment --}}

                            <div class="form-group">
                                <label for="comment">{{__('content.comment')}}</label>
                                <textarea id="comment" class="form-control" name="comment" style="resize: vertical"></textarea>
                            </div>

                            {{-- Author --}}

                            <input id="user_id" hidden type="text" name="user_id" value="{{ auth()->user()->id }}">
                            
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

@endsection

    