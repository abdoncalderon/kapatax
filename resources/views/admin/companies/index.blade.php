@extends('layouts.main')

@section('title', __('content.companies'))

@section('section', __('content.companies'))

@section('level', __('content.administration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.companies') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

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
                            <th>{{ __('content.state') }}</th>
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
                                @IF($company->isActive())
                                    <td>{{ __('content.active') }}</td>
                                @ELSE
                                    <td>{{ __('content.inactive') }}</td>
                                @ENDIF
                                <td>
                                    @IF($company->name!='SUPERUSER')
                                    <a class="btn btn-info btn-xs" href="{{ route('companies.show', $company)}}">Ver</a>
                                    @ENDIF
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