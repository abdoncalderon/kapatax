@extends('layouts.main')

@section('title', __('content.administration'))

@section('section', __('content.administration'))

@section('level', __('content.assignments'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.people') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.peopleInProject') }}</strong></h3> | 
                {{-- <a class="btn btn-success btn-sm" href="{{ route('projectPeople.create') }}">{{ __('content.add') }}</a> --}}
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
                        @foreach($stakeholderPeople as $stakeholderPerson)
                            <tr>
                                <td>{{ $stakeholderPerson->person->fullName }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('technology.stakeholderPersonAssets.index', $stakeholderPerson) }}">{{ __('content.equipments') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="#">{{ __('content.services') }}</a>
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