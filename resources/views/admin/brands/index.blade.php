@extends('layouts.main')

@section('title', __('content.brands'))

@section('section', __('content.brands'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.brands') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Error Messages --}}

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.brands') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('brands.create') }}">{{ __('content.add') }}</a>
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#importBrands">{{ __('content.import') }} {{ __('content.from') }} Excel </button>
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
                        @foreach($brands as $brand)
                            <tr>
                                <td>{{ $brand->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('brands.edit', $brand)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('brands.destroy', $brand)}}">{{ __('content.delete') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('home') }} "><<< {{ __('content.return') }}</a>

            </div>

        </div>

    </section>

    {{-- Import Brands from Excel File --}}

    <div class="modal fade" id="importBrands">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('brands.import') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.brands') }}</h4>
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