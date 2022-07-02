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

            {{-- Title --}}

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('content.companies') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('companies.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

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
                                    {{-- <a class="btn btn-info btn-xs" href="{{ route('companies.show', $company)}}">{{ __('content.show') }}</a> --}}
                                    <a class="btn btn-info btn-xs" href="{{ route('companies.edit', $company)}}">{{ __('content.edit') }}</a>
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
                                    <a class="btn btn-danger btn-xs" href="{{ route('companies.destroy', $company)}}">{{ __('content.delete') }}</a>
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