@extends('layouts.main')

@section('title', __('content.administration'))

@section('section', __('content.administration'))

@section('level', __('content.equipments'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('technology.stakeholderPeople.index') }}"> {{ __('content.people') }} </a></li>
        <li class="active">{{ __('content.assets') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.assetsAssignedTo').' '.$stakeholderPerson->person->fullName }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('technology.stakeholderPersonAssets.create',$stakeholderPerson) }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">

                 
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.category') }}</th>
                            <th>{{ __('content.brand') }}</th>
                            <th>{{ __('content.model') }}</th>
                            <th>{{ __('content.serialNumber') }}</th>
                            <th>{{ __('messages.deliveredOn') }}</th>
                            <th>{{ __('messages.returnedOn') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($stakeholderPersonAssets as $stakeholderPersonAsset)
                            <tr>
                                <td>{{ $stakeholderPersonAsset->asset->stockMovement->material->category->name }}</td>
                                <td>{{ $stakeholderPersonAsset->asset->stockMovement->material->model->brand->name }}</td>
                                <td>{{ $stakeholderPersonAsset->asset->stockMovement->material->model->name }}</td>
                                <td>{{ $stakeholderPersonAsset->asset->serialNumber }}</td>
                                <td>{{ $stakeholderPersonAsset->deliveryDate }}</td>
                                <td>{{ $stakeholderPersonAsset->returnDate }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('technology.stakeholderPersonAssets.edit', $stakeholderPersonAsset) }}">{{ __('content.edit') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('technology.stakeholderPeople.index') }} ">{{ __('content.return') }}</a>

            </div>

        </div>

    </section>

@endsection