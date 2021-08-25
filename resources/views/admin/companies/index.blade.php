@extends('layouts.main')

@section('title', __('content.companies'))

@section('section', __('content.companies'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.companies') }}</li>
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
                <h3 class="box-title"><strong>{{ __('content.companies') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('companies.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="datatable" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.status') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($companies as $company)
                            <tr
                                @IF(!$company->isActive())
                                    class='warning'
                                @ENDIF
                            >
                                <td>{{ $company->name }}</td>
                                <td>
                                    @if($company->isActive())
                                        {{ __('content.active') }}
                                    @else
                                        {{ __('content.inactive') }}
                                    @endif
                                    /
                                    @if($company->isLocked())
                                        {{ __('content.locked') }}
                                    @else
                                        {{ __('content.unlocked') }}
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-info btn-xs" href="{{ route('companies.show', $company)}}">{{ __('content.show') }}</a>
                                    @if ($company->isActive())
                                        <a class="btn btn-danger btn-xs" href="{{ route('companies.activate', [$company, '0']) }}">{{ __('content.deactivate') }}</a>
                                    @else
                                        <a class="btn btn-info btn-xs" href="{{ route('companies.activate', [$company, '1']) }}">{{ __('content.activate') }}</a>
                                    @endif
                                    @if ($company->isLocked())
                                        <a class="btn btn-info btn-xs" href="{{ route('companies.lock', [$company, '0']) }}">{{ __('content.unlock') }}</a>
                                    @else
                                        <a class="btn btn-danger btn-xs" href="{{ route('companies.lock', [$company, '1'])}}">{{ __('content.lock') }}</a>
                                    @endif
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