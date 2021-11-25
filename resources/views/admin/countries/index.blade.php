@extends('layouts.main')

@section('title', __('content.countries'))

@section('section', __('content.countries'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.countries') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.countries') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('countries.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.region') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($countries as $country)
                            <tr>
                                <td>{{ $country->name }}</td>
                                <td>{{ $country->region->name }}</td>
                                <td>
                                    {{-- <a class="btn btn-info btn-xs" href="{{ route('countries.show', $country)}}">{{ __('content.show') }}</a> --}}
                                    <a class="btn btn-info btn-xs" href="{{ route('countries.edit', $country)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('countries.destroy', $country)}}">{{ __('content.delete') }}</a>
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