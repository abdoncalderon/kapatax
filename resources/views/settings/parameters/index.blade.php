@extends('layouts.main')

@section('title', __('content.settings'))

@section('section', __('content.parameters'))

@section('level', __('content.settings'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.parameters') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.parameters') }}</strong></h3>
            </div>

            {{-- Body --}}

            <div class="box-body">
                
            </div>

        </div>

        {{-- Bulk Load --}}

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.bulkLoad') }}</strong></h3> | 
                @if (session()->has('failures'))
                    <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#showErrors">{{ __('content.errors') }}</button>
                @endif
            </div>

            <div class="row">

                {{-- Import Regions --}}

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.regions') }} | {{ $regions->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/regions.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importRegions">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Countries --}}

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.countries') }} | {{ $countries->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/countries.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importCountries">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import States --}}

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.states') }} | {{ $states->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/states.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importStates">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Cities --}}

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.cities') }} | {{ $cities->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/cities.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importCities">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Brands --}}

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.brands') }} | {{ $brands->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/brands.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importBrands">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->


                {{-- Import Models --}}

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.models') }} | {{ $models->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/models.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importModels">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Unities --}}

                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-3">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.unities') }} | {{ $unities->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/unities.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importUnities">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

            </div>

        </div>

    </section>

    {{-- Import Regions from Excel File --}}

    <div class="modal fade" id="importRegions">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.regionsImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.regions') }}</h4>
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

    {{-- Import Countries from Excel File --}}

    <div class="modal fade" id="importCountries">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.countriesImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.countries') }}</h4>
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

    {{-- Import States from Excel File --}}

    <div class="modal fade" id="importStates">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.statesImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.states') }}</h4>
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

    {{-- Import Cities from Excel File --}}

    <div class="modal fade" id="importCities">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.citiesImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.cities') }}</h4>
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

    {{-- Import Brands from Excel File --}}

    <div class="modal fade" id="importBrands">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.brandsImport') }}" enctype="multipart/form-data">
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

    {{-- Import Models from Excel File --}}

    <div class="modal fade" id="importModels">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.modelsImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.models') }}</h4>
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

    {{-- Import Unities from Excel File --}}

    <div class="modal fade" id="importUnities">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.unitiesImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.unities') }}</h4>
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

    




    {{--Show Errors --}}

    <div class="modal fade" id="showErrors">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">{{ __('content.results') }}</h4>
                </div>
                <div class="modal-body">
                    <div>
                        
                        @if (session()->has('failures'))
                            <table class="table table-danger">
                                <tr>
                                    <th>Row</th>
                                    <th>Attribute</th>
                                    <th>Errors</th>
                                    <th>Value</th>
                                </tr>
                                @foreach (session()->get('failures') as $validation )
                                    <tr>
                                        <td>{{ $validation->row() }}</td>
                                        <td>{{ $validation->attribute() }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($validation->errors() as $e )
                                                    <li>{{ $e }}</li>
                                                @endforeach
                                            </ul>
                                        </td>
                                        <td>{{ $validation->values()[$validation->attribute()] }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        @endif
                        
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.close')}}</button>
                </div>
            </div>
        </div>
    </div>




    
@endsection