@extends('layouts.main')

@section('title', __('content.families'))

@section('section', __('content.families'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.families') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.families') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('families.create') }}">{{ __('content.add') }}</a>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#importFamilies">{{ __('content.import') }} {{ __('content.from') }} Excel </button>
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
                        @foreach(current_user()->project->families as $family)
                            <tr>
                                <td>{{ $family->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('families.edit', $family)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('families.destroy', $family)}}">{{ __('content.delete')}}</a>
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

    <div class="modal fade" id="importFamilies">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('families.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.families') }}</h4>
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