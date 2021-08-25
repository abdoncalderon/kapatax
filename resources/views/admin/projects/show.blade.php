@extends('layouts.main')

@section('title', __('content.projects'))

@section('section', __('content.projects'))

@section('level', __('content.configuration'))

@section('breadcrumb')
    <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-home"></i>Home</a></li>
        <li><a href="{{ route('projects.index')}}"> {{ __('content.projects') }} </a></li>
        <li class="active">{{ __('content.details') }}</li>
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

                <form class="form-horizontal">

                    <div class="box-body">

                        {{-- name  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->name }}">
                            </div>
                        </div>

                        {{-- code  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.code') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->code }}">
                            </div>
                        </div>

                        {{-- tax ID  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.taxId') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->taxId }}">
                            </div>
                        </div>

                        {{-- city  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.city') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->city->name }}">
                            </div>
                        </div>

                        {{-- address  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.address') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->address }}">
                            </div>
                        </div>

                        {{-- zip code  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.name') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->zipCode }}">
                            </div>
                        </div>


                        {{-- phone number  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.phoneNumber') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->phoneNumber }}">
                            </div>
                        </div>

                        {{-- subsidiary  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.subsidiary') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->subsidiary->name }}">
                            </div>
                        </div>

                        {{-- start date  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.startDate') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->startDate }}">
                            </div>
                        </div>

                        {{-- finish date  --}}

                        <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.startDate') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->finishDate }}">
                            </div>
                        </div>
                    

                        {{-- Finish Date  --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.finish') }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->datefinish }}">
                            </div>
                        </div> --}}


                        {{-- Logo 1  --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.logo') }} 1</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/logos/'.$project->logofilename1) }}" alt="" style="width: 200px">
                            </div>
                        </div> --}}

                        {{-- Logo 2  --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.logo') }} 2</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/logos/'.$project->logofilename2) }}" alt="" style="width: 200px">
                            </div>
                        </div>
 --}}
                        {{-- Logo 3  --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.logo') }} 3</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/logos/'.$project->logofilename3) }}" alt="" style="width: 200px">
                            </div>
                        </div> --}}

                        {{-- Logo 4  --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('content.logo') }} 4</label>
                            <div class="col-sm-10">
                                <img src="{{ asset('images/logos/'.$project->logofilename4) }}" alt="" style="width: 200px">
                            </div>
                        </div> --}}

                        {{-- Max Time for Open WorkBook  --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.maxtimeopen').' ('.__('content.hours').') '  }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->maxtimeopen }}">
                            </div>
                        </div> --}}

                        {{-- Max Time for Create Note  --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.maxtimenote').' ('.__('content.hours').') ' }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->maxtimenote }}">
                            </div>
                        </div> --}}


                        {{-- Max Time for Comment --}}

                        {{-- <div class="form-group">
                            <label class="col-sm-2 control-label">{{ __('messages.maxtimecomment').' ('.__('content.hours').') '  }}</label>
                            <div class="col-sm-10">
                                <input disabled class="form-control" value="{{ $project->maxtimecomment }}">
                            </div>
                            </div>
                        </div> --}}
                       
                        


                    </div>

                    {{-- Submit  --}}

                    <div class="box-footer">
                        <a class="btn btn-success btn-sm" href=" {{ route('projects.edit', $project) }} ">{{ __('content.edit') }}</a>
                        <a class="btn btn-info btn-sm" href=" {{ route('projects.index') }} ">{{ __('messages.returntolist') }}</a>
                    </div>

                </form>

                {{-- End Form  --}}

            </div>

        </div>

    </section>

@endsection