@extends('layouts.main')

@section('title', __('content.equipments'))

@section('section', __('content.equipments'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.equipments') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.equipments') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('equipments.create') }}">{{ __('content.add') }}</a>
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
                        @foreach($equipments as $equipment)
                            <tr>
                                <td>{{ $equipment->name }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('equipments.show', $equipment)}}">{{ __('content.show') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-danger btn-xs" href="{{ route('equipments.destroy', $equipment)}}">{{ __('content.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('home') }} ">{{ __('messages.goBack') }}</a>

            </div>

        </div>

    </section>

@endsection