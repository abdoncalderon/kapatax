@extends('layouts.main')

@section('title', __('content.project'))

@section('section', __('content.project'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projects.index')}}"> {{ __('content.projects') }} </a></li>
        <li><a href="{{ route('projectFunctions.index',$project)}}"> {{ __('content.functions') }} </a></li>
        <li class="active">{{ __('content.assign') }}</li>
    </ol>
@endsection

@section('mainContent')
    
    <section class="content">
        
        <div>
            
            <div class="box box-info">

                {{-- Error Messages --}}
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        {{ $errors->first() }}
                    </div>
                @endif
                
                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ __('content.function').' '.$project->name }}</strong></h3>
                </div>

                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('projectFunctions.store',$project) }}">
                    @csrf

                    {{-- Form Body --}}

                    <div class="box-body">

                        {{-- Fields --}}

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- project --}}
    
                            <input id="project_id" hidden type="text" name="project_id" value="{{ $project->id }}">

                            {{-- Function --}}
                                
                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.function') }}</label>
                                <div class="col-sm-10" >
                                    <select id="funct1on_id" name="funct1on_id" class="form-control" required style="width: 100%;" >
                                        <option value="">{{__('messages.select')}} {{__('content.function')}}</option>
                                        @foreach ($functions as $function)
                                            <option value="{{ $function->id }}">{{ $function->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    {{-- Form Footer --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('projectFunctions.index',$project) }} ">{{ __('content.cancel') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection

