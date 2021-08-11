@extends('layouts.app')

@section('content')


<div class="col-lg-5 bg-dark d-flex flex-column align-items-end min-vh-100">
    <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 mb-auto w-100">
        <img src="{{ asset('images/admin/logos/kapatax.png') }}" class="img-fluid" />
    </div>
    <div class="align-self-center w-100 px-lg-5 py-lg-4 p-4">
        <h1 class="font-weight-bold mb-4 fc-center">KAPATAX</h1>
        <form class="mb-5">
            <div class="mb-4">
                <label for="exampleInputEmail1" class="form-label font-weight-bold">Email</label>
                <input type="email" class="form-control bg-dark-x border-0" id="exampleInputEmail1" placeholder="Ingresa tu email" aria-describedby="emailHelp">
            </div>
            <div class="mb-4">
                <label for="exampleInputPassword1" class="form-label font-weight-bold">Contraseña</label>
                <input type="password" class="form-control bg-dark-x border-0 mb-2" placeholder="Ingresa tu contraseña" id="exampleInputPassword1">
                <a href="" id="emailHelp" class="form-text text-muted text-decoration-none">¿Has olvidado tu contraseña?</a>
            </div>
            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
        </form>

        {{-- <p class="font-weight-bold text-center text-muted">O inicia sesión con</p>
        <div class="d-flex justify-content-around">
            <button type="button" class="btn btn-outline-light flex-grow-1 mr-2"><i class="fab fa-google lead mr-2"></i> Google</button>
            <button type="button" class="btn btn-outline-light flex-grow-1 ml-2"><i class="fab fa-facebook-f lead mr-2"></i> Facebook</button>
        </div> --}}
    </div>
    <div class="text-center px-lg-5 pt-lg-3 pb-lg-4 p-4 mt-auto w-100">
        <p class="d-inline-block mb-0">¿Todavia no tienes una cuenta?</p> <a href="" class="text-light font-weight-bold text-decoration-none">Crea una ahora</a>
    </div>
</div>






{{-- <div class="container w-75 bg-primary mt-5 rounded shadow">
    <div class="row">
        <div class="col bg">

        </div>
        <div class="col">
            <div class="text-end">
                <img src="images/logos/logo.png" width="48" alt="">
            </div>
            
             <h2 class="fw-bold text-center py-5">Login</h2>
            
             <form action="#">
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-4">
                    <label for="project" class="form-label">Project</label>
                    <input type="text" class="form-control" name="project">
                </div>
                <div class="mb-4 form-check">
                    <input type="checkbox" class="form-check-input" name="connected">
                    <label for="connected" class="form-check-label">Stay Connect</label>
                </div>
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            
             </form>
        </div>
    </div>
</div> --}}




{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}

@endsection
