@extends('layouts.main')

@section('title', __('content.people'))

@section('section', __('content.people'))

@section('level', __('content.people'))

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
                <a class="btn btn-success btn-sm" href="{{ route('people.createNew') }}">{{ __('content.add') }}</a>
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
                        @foreach($stakeholderPeople as $stakeholderPerson)
                            <tr>
                                <td>{{ $stakeholderPerson->person->fullName }}</td>
                                <td>{{ status(is_active_stakeholder_person($stakeholderPerson->person)) }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('people.edit',$stakeholderPerson->person)}}">{{ __('content.data') }}</a>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('stakeholderPeople.index',$stakeholderPerson->person)}}">{{ __('content.admissions') }}</a>
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