@extends('layouts.main')

@section('title', __('content.turns'))

@section('section', __('content.turns'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.turns') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.turns') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('turns.create') }}">{{ __('content.add') }}</a>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#importTurns">{{ __('content.import') }} {{ __('content.from') }} Excel </button>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($turns as $turn)
                            <tr>
                                <td>{{ $turn->name }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('turns.edit', $turn)}}">{{ __('content.edit') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('turns.destroy', $turn)}}">{{ __('content.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

            </div>

        </div>

    </section>

    {{-- Import from Excel File --}}

    <div class="modal fade" id="importTurns">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('turns.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.turns') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            
                            {{-- Filename --}}

                            <div class="form-group">
                                <label for="file">{{ __('content.file') }} Excel</label>
                                <input id="file" type="file" class="form-control" name="file" accept="application/xls" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                        <button type="submit" class="btn btn-primary">{{__('content.import')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection