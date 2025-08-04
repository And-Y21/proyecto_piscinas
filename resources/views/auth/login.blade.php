<!-- @extends('adminlte::auth.login') -->

@section('auth_header')
    <p class="login-box-msg">Inicia sesión para comenzar</p>
@endsection

@section('auth_body')
    <form action="/login" method="post">
        @csrf
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
        </div>
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock"></span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <div class="icheck-primary">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember">Recuérdame</label>
                </div>
            </div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Entrar</button>
            </div>
        </div>
    </form>

    <!-- Botones sociales (debajo del formulario) -->
    <div class="social-auth-links text-center mt-4">
        <p class="text-muted mb-3">- O inicia con -</p>
        <a href="{{ url('/auth/google') }}" class="btn btn-block btn-outline-danger mb-2">
            <i class="fab fa-google mr-2"></i> Google
        </a>
        <a href="#" class="btn btn-block btn-outline-primary">
            <i class="fas fa-swimming-pool mr-2"></i> Nadarte
        </a>
    </div>
@endsection

@section('auth_footer')
    <p class="my-2 text-center">
        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a><br>
        <a href="{{ route('register') }}">Registrar nueva cuenta</a>
    </p>
@endsection