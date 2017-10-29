@extends('layouts.inicial')
@section('contenido')

<section id="two" class="wrapper style1">
    <header class="major">
        <h2>Login</h2>
    </header>
    <div class="container" align="center">
        <form class="form-horizontal" method="POST" action="{{ route('login') }}" style="width: 40%; text-align: left;">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                E-Mail Address:<br>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <br>Contraseña:<br>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-6 col-md-offset-4">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me 
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Forgot Your Password?
                    </a>
                </div>
            </div><br>

            <div class="form-group">
                <div class="row" >
                    <div class="6u" align="right"> <a href="/" class="button special"  >Cancelar</a> </div>
                    <div id="aceptar" class="6u" align="left"> <button type="submit" class="button special">
                        Aceptar</button> 
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>

@endsection
