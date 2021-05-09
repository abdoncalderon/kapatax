@extends('layouts.main')

@section('title', __('content.positions'))

@section('section', __('content.positions'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.positions') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.positions') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('positions.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">

                {{-- Error Messages --}}
                
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $errors->first() }}
                    </div>
                @endif
                
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
                        @foreach($positions as $position)
                            <tr>
                                <td>{{ $position->name }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('positions.show', $position)}}">{{ __('content.show') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('positions.destroy', $position)}}">{{ __('content.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

            </div>

        </div>

    </section>

@endsection