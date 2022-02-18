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
                <h3 class="box-title"><strong>{{ __('content.people') }}</strong></h3> | 
                <a class="btn btn-success btn-sm" href="{{ route('people.create') }}">{{ __('content.add') }}</a>
            </div>
            
            <div class="box-body">

                {{-- Error Messages --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $errors->first() }}
                    </div>
                @endif
                
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
                        @foreach($people as $person)
                            <tr>
                                <td>{{ $person->fullName }}</td>
                                <td>
                                    <a style="margin: 0.3em" class="btn btn-info btn-xs" href="{{ route('people.edit', $person)}}">{{ __('content.edit') }}</a>
                                    <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#addUser">{{ __('content.user') }}</button>

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