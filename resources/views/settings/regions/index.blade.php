@extends('layouts.main')

@section('title', __('content.regions'))

@section('section', __('content.regions'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.regions') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.regions') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('regions.create') }}">{{ __('content.add') }}</a>
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
                        @foreach($regions as $region)
                            <tr>
                                <td>{{ $region->name }}</td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('regions.edit', $region)}}">{{ __('content.edit') }}</a>
                                    <a class="btn btn-danger btn-xs" href="{{ route('regions.destroy', $region)}}">{{ __('content.delete') }}</a>
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