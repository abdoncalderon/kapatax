@extends('layouts.main')

@section('title', __('content.warehouse'))

@section('section', __('content.materials'))

@section('level', __('content.warehouse'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('materials.index')}}"> {{ __('content.materials') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                {{-- Title --}}

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('editMaterial') }} </strong></h3>
                </div>

                {{-- Start Form  --}}
               
                <form class="form-horizontal" method="POST" action="{{ route('materials.update',$material) }}">
                    @csrf
                    @method('PATCH')

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
                                        @foreach ($groups as $group)
                                            <option value="{{ $group->id }}"
                                                @if ($group->id == $material->group_id)
                                                    selected
                                                @endif
                                            >{{ $group->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            
                            {{--family --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.family') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <select id="family" name="family_id" class="form-control" style="width: 100%;">
                                        @foreach ($families as $family)
                                            <option value="{{ $family->id }}"
                                                @if ( $family->id == $material->subcategory->category->family->id )
                                                    selected
                                                @endif
                                            >{{ $family->code.' - '.$family->name }}</option>
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
                                        <option value="{{ $material->subcategory->category->id }}">{{ $material->subcategory->code.' - '.$material->subcategory->category->name }}</option>
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
                                        <option value="{{ $material->subcategory->id }}">{{ $material->subcategory->name }}</option>
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
                                            <option value="{{ $brand->id }}"
                                                @if ($brand->id == $material->model->brand->id)
                                                    selected
                                                @endif
                                            >{{ $brand->name }}</option>
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
                                        <option value="{{ $material->model->id }}">{{ $material->model->name }}</option>
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
                                        @foreach ($materials as $partOf)
                                            <option value="{{ $partOf->id }}"
                                                @if ($partOf->id == $material->partOf)
                                                    selected
                                                @endif
                                            >{{ $partOf->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- name --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" type="text" value="{{ $material->name }}" required>
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
                                    <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" style="resize: vertical; height: 100px;">{{ $material->description }}</textarea>
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
                                    <input id="sku" class="form-control @error('sku') is-invalid @enderror" name="sku" type="text" value="{{ $material->sku }}" required>
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
                                    <input id="upc" class="form-control" name="upc" type="text" value="{{ $material->upc }}">
                                </div>
                            </div>

                            {{-- weight --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.weight') }} (kg)</label>
                                <div class="input-group input-group-sm col-xs-12 col-sm-10" >
                                    <input id="weight" class="form-control @error('weight') is-invalid @enderror" name="weight" type="text" value="{{ $material->weight }}" required>
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
                                    <input id="volume" class="form-control @error('volume') is-invalid @enderror" name="volume" type="text" value="{{ $material->volume }}" required>
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
                                            <option value="{{ $unity->id }}"
                                                @if ($unity->id == $material->unity_id)
                                                    selected
                                                @endif
                                            >{{ $unity->name }}</option>
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

@endsection