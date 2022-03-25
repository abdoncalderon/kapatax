@extends('layouts.main')

@section('title', __('content.people'))

@section('section', __('content.admissions'))

@section('level', __('content.people'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('people.index')}}"> {{ __('content.people') }} </a></li>
        <li class="active">{{ __('content.admissions') }}</li>
    </ol>
@endsection

@section('mainContent') 

    <section class="content">

        <div class="box box-info">

            <div class="box-header with-border center-block">
                <h3 class="box-title"><strong>{{ $person->fullName }}</strong></h3> | 
                @if (!is_active_stakeholder_person($person))
                    <a class="btn btn-success btn-sm" href="{{ route('stakeholderPeople.create',$person) }}">{{ __('content.add') }}</a>
                @endif
            </div>
            
            <div class="box-body">
                
                 {{-- Start Table  --}}

                <table id="example1" class="table table-bordered table-striped">

                    {{-- Header  --}}

                    <thead>
                        <tr>
                            <th>{{ __('content.organization') }}</th>
                            <th>{{ __('messages.admissionDate') }}</th>
                            <th>{{ __('messages.departureDate') }}</th>
                            <th>{{ __('content.actions') }}</th>
                        </tr>
                    </thead>

                    {{-- Rows  --}}

                    <tbody>
                        @foreach($stakeholderPeople as $stakeholderPerson)
                            <tr>
                                <td>{{ $stakeholderPerson->stakeholder->name }}</td>
                                <td>{{ $stakeholderPerson->admissionDate }}</td>
                                <td>{{ $stakeholderPerson->departureDate }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('stakeholderPeople.edit',$stakeholderPerson) }}">{{ __('content.edit') }}</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>

                {{-- End Table  --}}

                <hr>

                <a class="btn btn-danger btn-sm" href=" {{ route('people.index') }} "><<< {{ __('content.return') }}</a>


            </div>

        </div>

    </section>

@endsection