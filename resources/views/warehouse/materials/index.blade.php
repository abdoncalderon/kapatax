@extends('layouts.main')

@section('title', __('content.materials'))

@section('section', __('content.materials'))

@section('level', __('content.warehouse'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.materials') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.materials') }} - {{ current_user()->project->name }} </strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('materials.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.subcategory') }}</th>
                            <th>{{ __('content.brand') }}</th>
                            <th>{{ __('content.model') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($materials as $material)
                            <tr>
                                <td>{{ $material->name }}</td>
                                <td>{{ $material->subcategory->name }}</td>
                                <td>{{ $material->model->brand->name }}</td>
                                <td>{{ $material->model->name }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('materials.edit', $material)}}">{{ __('content.edit') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="#">{{ __('messages.stockMovements') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="#">{{ __('messages.priceHistory') }}</a>
                                    {{-- <a style="margin: 0.3em" class="btn btn-danger btn-xs" href="{{ route('materials.destroy', $material)}}">{{ __('content.delete') }}</a> --}}
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