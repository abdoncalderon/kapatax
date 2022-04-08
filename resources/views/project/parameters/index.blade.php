@extends('layouts.main')

@section('title', __('content.project'))

@section('section', __('content.parameters'))

@section('level', __('content.project'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.parameters') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        {{-- Parameters --}}

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.parameters') }}</strong></h3>
            </div>

            <form class="form-horizontal" method="POST" action="{{ route('project.parameters.update') }}">
            @csrf
            @method('PATCH')

                {{-- Body --}}

                <div class="box-body">

                    <div class="col-sm-9 col-md-9 col-lg-9">

                        <div class="form-group">
                            <h4>{{ __('messages.emailSettings')}}</h4>
                        </div>

                        {{-- sender name --}}
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.sender') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="senderName" type="text" class="form-control" name="senderName" value="{{ current_user()->project->parameter->senderName }}" placeholder="{{ __('content.sender') }}" required>
                                @error('senderName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- sender email --}}
            
                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.email') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                <input id="senderEmail" type="email" class="form-control" name="senderEmail" value="{{ current_user()->project->parameter->senderEmail }}" placeholder="{{ __('content.from') }}" required>
                                @error('senderEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>
                    
                </div>

                <div class="box-footer">

                    <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.update') }}</button>

                </div>

            </form>

            

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

                {{-- Import Functions --}}

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.functions') }} | {{ current_user()->project->functions->count().' '.__('content.records') }} </h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/functions.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importFunctions">{{ __('messages.importFromExcel') }}</button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cloneFunctions">{{ __('messages.cloneFromProject') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
                
                {{-- Import Positions --}}

                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.positions') }} | {{ $positions->count().' '.__('content.records') }} </h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/positions.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importPositions">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Sectors --}}

                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.sectors') }} | {{ current_user()->project->sectors->count().' '.__('content.records') }} </h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/sectors.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importSectors">{{ __('messages.importFromExcel') }}</button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cloneFunctions">{{ __('messages.cloneFromProject') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Departments --}}

                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.departments') }} | {{ $departments->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/departments.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importDepartments">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Zones --}}
                
                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.zones') }}  | {{ current_user()->project->zones->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/zones.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importZones">{{ __('messages.importFromExcel') }}</button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cloneZones">{{ __('messages.cloneFromProject') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Location --}}

                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.locations') }} | {{ $locations->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/locations.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importLocations">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Families --}}
                
                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.families') }} | {{ current_user()->project->families->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/families.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importFamilies">{{ __('messages.importFromExcel') }}</button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cloneFunctions">{{ __('messages.cloneFromProject') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Categories --}}
                
                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.categories') }} | {{ $categories->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/categories.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importCategories">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                 {{-- Import Subcategories --}}
                
                 <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.subcategories') }} | {{ $subcategories->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/subcategories.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importSubcategories">{{ __('messages.importFromExcel') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Equipments --}}

                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.equipments') }} | {{ current_user()->project->equipments->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/equipments.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importEquipments">{{ __('messages.importFromExcel') }}</button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cloneFunctions">{{ __('messages.cloneFromProject') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->

                {{-- Import Turns --}}
                
                <div class="col-md-6">
                    <div class="box box-solid">

                        <div class="box-header with-border">
                            <h3 class="box-title">{{ __('content.turns') }} | {{ current_user()->project->turns->count().' '.__('content.records') }}</h3>
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body">
                            <a class="btn btn-info btn-sm" href="{{ asset('templates/turns.xlsx') }}">{{ __('messages.downloadTemplate') }}</a>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#importTurns">{{ __('messages.importFromExcel') }}</button>
                            <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#cloneFunctions">{{ __('messages.cloneFromProject') }}</button>
                        </div>
                        <!-- /.box-body -->

                    </div>
                    <!-- /.box -->

                </div>
                <!-- /.col -->
                

            </div>
            <!-- /.row -->

        </div>
            

    </section>

    {{-- Import Functions from Excel File --}}

    <div class="modal fade" id="importFunctions">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.functionsImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.functions') }}</h4>
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

    {{-- Import Positions from Excel File --}}

    <div class="modal fade" id="importPositions">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.positionsImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.positions') }}</h4>
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

    {{-- Import Sectors from Excel File --}}

    <div class="modal fade" id="importSectors">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.sectorsImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.sectors') }}</h4>
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

    {{-- Import Departments from Excel File --}}

    <div class="modal fade" id="importDepartments">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.departmentsImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.departments') }}</h4>
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

    {{-- Import Zones from Excel File --}}

    <div class="modal fade" id="importZones">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.zonesImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.zones') }}</h4>
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

    {{-- Import Locations from Excel File --}}

    <div class="modal fade" id="importLocations">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.locationsImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.locations') }}</h4>
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

    {{-- Import Equipments from Excel File --}}

    <div class="modal fade" id="importEquipments">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.equipmentsImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.equipments') }}</h4>
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

    {{-- Import Families from Excel File --}}

    <div class="modal fade" id="importFamilies">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.familiesImport') }}" enctype="multipart/form-data">
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

    {{-- Import Categories from Excel File --}}

    <div class="modal fade" id="importCategories">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.categoriesImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.categories') }}</h4>
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

    {{-- Import Subcategories from Excel File --}}

    <div class="modal fade" id="importSubcategories">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.subcategoriesImport') }}" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.import').' '.__('content.subcategories') }}</h4>
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

    {{-- Import Turns from Excel File --}}

    <div class="modal fade" id="importTurns">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.turnsImport') }}" enctype="multipart/form-data">
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


    {{-- Clone Functions Project  --}}

    <div class="modal fade" id="cloneFunctions">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.functionsClone') }}">
                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.clone').' '.__('content.functions').' '.__('content.from') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="alert alert-danger">
                                <p>
                                    {{ __('messages.cloningWarning')}}
                                </p>
                            </div>
                            

                            {{--project --}}

                            <div class="form-group">
                                <label for="project">{{ __('content.project') }}</label>
                                <select id="project" name="project_id" class="form-control" style="width: 100%;" required>
                                    <option value="">{{__('messages.select')}} {{__('content.project')}}</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>                                                
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{__('content.clone')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    {{-- Clone Zones Project  --}}

    <div class="modal fade" id="cloneZones">
        <div class="modal-dialog">
            <form method="POST" action="{{ route('parameters.zonesClone') }}">
                @csrf

                <div class="modal-content">

                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title">{{ __('content.clone').' '.__('content.zones').' '.__('content.from') }}</h4>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="alert alert-danger">
                                <p>
                                    {{ __('messages.cloningWarning')}}
                                </p>
                            </div>
                            

                            {{--project --}}

                            <div class="form-group">
                                <label for="project">{{ __('content.project') }}</label>
                                <select id="project" name="project_id" class="form-control" style="width: 100%;" required>
                                    <option value="">{{__('messages.select')}} {{__('content.project')}}</option>
                                    @foreach ($projects as $project)
                                        <option value="{{ $project->id }}">{{ $project->name }}</option>                                                
                                    @endforeach
                                </select>
                            </div>
                            
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">{{__('content.cancel')}}</button>
                        <button type="submit" class="btn btn-danger">{{__('content.clone')}}</button>
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