@extends('layouts.main')

@section('title', __('content.sectors'))

@section('section', __('content.sectors'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.sectors') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.sectors') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('sectors.create') }}">{{ __('content.add') }}</a>
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
                        @foreach($project->sectors as $sector)
                            <tr>
                                <td>{{ $sector->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('sectors.edit', $sector)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('sectors.destroy', $sector)}}">{{ __('content.delete')}}</a>
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