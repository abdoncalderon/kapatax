@extends('layouts.main')

@section('title', __('content.materials'))

@section('section', __('content.materials'))

@section('level', __('content.warehouse'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('materials.index')}}"> {{ __('content.materials') }} </a></li>
        <li class="active">{{ __('content.add') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">


                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.add') }} {{ __('content.material') }} </strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('materials.store') }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-11 col-md-11 col-lg-11">

                            {{-- project_id --}}

                            <input id="project_id" type="hidden" class="form-control" name="project_id" value="{{ current_user()->project_id }}" type="text">

                            {{-- group --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.group') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="gropup" name="group_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.group')}}</option>
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}">{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            {{--family --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.family') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="family" name="family_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.family')}}</option>
                                        @foreach ($families as $family)
                                            <option value="{{ $family->id }}">{{ $family->code.' - '.$family->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addFamily"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- category --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.category') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="category" name="category_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.category')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addCategory"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- subcategory --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.subcategory') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="subcategory" name="subcategory_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.subcategory')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addSubcategory"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{--brand --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.brand') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="brand" name="brand_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.brand')}}</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addBrand"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- model --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.model') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="model" name="model_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.model')}}</option>
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addModel"> + </button>
                                    </span>
                                </div>
                            </div>

                            {{-- partOf --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.partOf') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="partOf" name="partOf_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.material')}}</option>
                                        @foreach ($materials as $material)
                                            <option value="{{ $material->id }}">{{ $material->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text" placeholder="{{ __('content.name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- description --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{__('content.description')}}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" style="resize: vertical; height: 100px;" placeholder="{{ __('messages.typeADescription') }}"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- SKU --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">SKU</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="sku" class="form-control @error('sku') is-invalid @enderror" name="sku" type="text" placeholder="{{ __('messages.stockKeepingCode') }}" required>
                                    @error('sku')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- UPC --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">UPC</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="upc" class="form-control" name="upc" type="text" placeholder="{{ __('messages.universalProductCode') }}">
                                </div>
                            </div>

                            {{-- weight --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.weight') }} (kg)</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="weight" class="form-control @error('weight') is-invalid @enderror" name="weight" type="number" placeholder="{{ __('content.weight') }}" value="0.0" min="0.0">
                                    @error('weight')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- volume --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.volume') }} (m3)</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="volume" class="form-control @error('volume') is-invalid @enderror" name="volume" type="number" placeholder="{{ __('content.volume') }}" value="0.0" min="0.0">
                                    @error('volume')
                                        <span class="invalid-feedback" role="alert" style="color:red">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{--unity --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('messages.measurementUnity') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="unity" name="unity_id" class="form-control" style="width: 100%;">
                                        <option value="">{{__('messages.select')}} {{__('content.unity')}}</option>
                                        @foreach ($unities as $unity)
                                            <option value="{{ $unity->id }}">{{ $unity->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#addUnity"> + </button>
                                    </span>
                                </div>
                            </div>

                        </div>

                    </div>

                     {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('materials.index') }} ">{{ __('content.cancel') }}</a>
                    </div>
                    
                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

    {{-- Modal Window Add Family --}}

    <div class="modal fade" id="addFamily" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('families.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.family') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

    {{-- Modal Window Add Category --}}

    <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('categories.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.category') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- family --}}

                        <input id="familyModal1Id" type="hidden" class="form-control" name="family_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.family') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="familyModal1Text" type="text" disabled class="form-control" name="family">
                            </div>
                        </div>

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>

    {{-- Modal Window Add Subcategory --}}

    <div class="modal fade" id="addSubcategory" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('subcategories.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.subcategory') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- family --}}

                        <input id="familyModal2Id" type="hidden" class="form-control" name="family_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.family') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="familyModal2Text" type="text" disabled class="form-control" name="family">
                            </div>
                        </div>

                        {{-- Category --}}

                        <input id="categoryModal1Id" type="hidden" class="form-control" name="category_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.category') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="categoryModal1Text" type="text" disabled class="form-control" name="category">
                            </div>
                        </div>

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>

    {{-- Modal Window Add Brand --}}

    <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('brands.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.brand') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

    {{-- Modal Window Add Model --}}

    <div class="modal fade" id="addModel" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('models.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.model') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- brand --}}

                        <input id="brandModal1Id" type="hidden" class="form-control" name="brand_id">

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.brand') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input id="brandModal1Text" type="text" disabled class="form-control" name="brand">
                            </div>
                        </div>

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group input-group-sm col-xs-12 col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
        
    </div>

    {{-- Modal Window Add Unity --}}

    <div class="modal fade" id="addUnity" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered" role="document">

            <form method="POST" action="{{ route('unities.add') }}">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="exampleModalLongTitle">{{ __('content.add') }} {{ __('content.unity') }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        {{-- name --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="input-group col-sm-10">
                                <input type="text" class="form-control" name="name" maxlength="255" required>
                            </div>
                        </div>

                        {{-- code --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="input-group col-sm-10">
                                <input type="text" class="form-control" name="code" maxlength="255" required>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                            <button type="button" class="btn btn-danger pull-left btn-sm" data-dismiss="modal">{{ __('content.cancel') }}</button>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>

    </div>

@endsection