@extends('layouts.main')

@section('title', __('content.people'))

@section('section', __('content.employees'))

@section('level', __('content.people'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">{{ __('content.employees') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ __('messages.employeesInProject') }}</strong></h3> | 
                {{-- <a class="btn btn-success btn-sm" href="{{ route('people.create') }}">{{ __('content.add') }}</a> --}}
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.name') }}</th>
                            <th>{{ __('content.organization') }}</th>
                            <th>{{ __('content.position') }}</th>
                            <th>{{ __('content.department') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($stakeholderPeople as $stakeholderPerson)
                            <tr>
                                <td>{{ $stakeholderPerson->person->fullName }}</td>
                                <td>{{ $stakeholderPerson->stakeholder->name }}</td>
                                <td>{{ $stakeholderPerson->position->name }}</td>
                                <td>{{ $stakeholderPerson->department->name }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('people.edit',$stakeholderPerson->person)}}">{{ __('content.data') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('stakeholderPeople.index',$stakeholderPerson->person)}}">{{ __('content.admissions') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('employees.edit',$stakeholderPerson)}}">{{ __('content.payroll') }}</a>
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