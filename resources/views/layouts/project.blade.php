<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-dark">
    <div id="app" class="container">
        <main class="py-4">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('messages.selectProject') }}</div>
        
                        <div class="card-body">
                            <div class="p-5 text-center">
                                <img src="{{ asset('images/admin/logos/kapatax.png') }}" class="img-fluid" />
                            </div>
                            <form method="POST" action="{{ route('menu') }}">
                                @csrf
        
                                {{-- Name  --}}
        
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-md-right">{{ __('content.name') }}</label>
                                    <div class="col-sm-10">
                                        <input id="name" disabled class="form-control" name="name" value="{{ old('email',$user->name) }}">
                                    </div>
                                </div>
        
                                {{-- project --}}
        
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label text-md-right">{{ __('content.project') }}</label>
                                    <div class="col-sm-10" >
                                        <select name="project_id" class="form-control" style="width: 100%;" required>
                                            @foreach ($projects as $project)
                                                <option value="{{ $project->project_id }}">{{ $project->project->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
        
                                <div class="form-group row">
                                    <div class="col-12 text-center">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('messages.startSession') }}
                                        </button>
                                        <a class="btn btn-danger" href="#"
                                        @AUTH
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" 
                                        @ENDAUTH
                                        >{{ __('messages.closeSession') }}</a>
                                    </div>
                                </div>
        
                            </form>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </main>
        
    </div>
</body>
</html>