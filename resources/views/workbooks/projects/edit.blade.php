@extends('layouts.main')

@section('title', __('content.projects'))

@section('section', __('content.projects'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projects.index')}}"> {{ __('content.projects') }} </a></li>
        <li class="active">{{ __('content.edit') }}</li>
    </ol>
@endsection

@section('mainContent')

    <section class="content">

        <div>

            <div class="box box-info">

                <div class="box-header with-border">
                    <h3 class="box-title"><strong>{{ $project->name }}</strong></h3>
                </div>
               
                {{-- Start Form  --}}

                <form class="form-horizontal" method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    {{-- Form Body --}}

                    <div class="box-body">

                        <div class="col-sm-4 col-md-6 col-lg-10">

                            {{-- Id  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Id</label>
                                <div class="col-sm-10">
                                    <input disabled class="form-control" value="{{ $project->id }}">
                                </div>
                            </div>

                            {{-- Name  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="name" value="{{ $project->name }}">
                                </div>
                            </div>

                            {{-- Start Date  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.start') }}</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="datestart" value="{{ date('Y-m-d',strtotime($project->datestart)) }}">
                                </div>
                            </div>

                            {{-- Finish Date  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="datefinish" value="{{ date('Y-m-d',strtotime($project->datefinish)) }}">
                                </div>
                            </div>

                            {{-- Logo 1  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} 1</label>
                                <div class="col-sm-10">
                                    <input id="logo1" type="file" class="form-control" name="logo1">
                                </div>
                                
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('images/logos/'.$project->logofilename1) }}" alt="" style="width: 200px">
                                </div>
                            </div>

                            <input id="logofilename1" hidden type="text" name="logofilename1" value="{{ $project->logofilename1 }}">
                            
                            {{-- Logo 2  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} 2</label>
                                <div class="col-sm-10">
                                    <input id="logo2" type="file" class="form-control" name="logo2"}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('images/logos/'.$project->logofilename2) }}" alt="" style="width: 200px">
                                </div>
                            </div>

                            <input id="logofilename2" hidden type="text" name="logofilename2" value="{{ $project->logofilename2 }}">
                          
                            {{-- Logo 3  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} 3</label>
                                <div class="col-sm-10">
                                    <input id="logo3" type="file" class="form-control" name="logo3"}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('images/logos/'.$project->logofilename3) }}" alt="" style="width: 200px">
                                </div>
                            </div>

                            <input id="logofilename3" hidden type="text" name="logofilename3" value="{{ $project->logofilename3 }}">
                           
                            {{-- Logo 4  --}}

                            <div class="form-group">
                                <label class="col-sm-2 control-label">{{ __('content.logo') }} 4</label>
                                <div class="col-sm-10">
                                    <input id="logo4" type="file" class="form-control" name="logo4"}}>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label"></label>
                                <div class="col-sm-10">
                                    <img src="{{ asset('images/logos/'.$project->logofilename4) }}" alt="" style="width: 200px">
                                </div>
                            </div>

                            <input id="logofilename4" hidden type="text" name="logofilename4" value="{{ $project->logofilename4 }}">
                       
                        </div>

                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <button type="submit" class="btn btn-success pull-left btn-sm" style="margin: 0px 5px;">{{ __('content.save') }}</button>
                        <a class="btn btn-danger btn-sm" href=" {{ route('home') }} ">{{ __('content.cancel') }}</a>
                       
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection