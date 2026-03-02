<x-guest-layout>
    <h1 class="auth-title">Acceso interno</h1>
    <p class="auth-subtitle">Ingrese con sus credenciales para administrar solicitudes y evaluaciones.</p>

    @if (session('status'))
        <div class="auth-status">{{ session('status') }}</div>
    @endif

    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf

        <div>
            <label for="email" class="auth-label">Correo</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="auth-label">Contrasena</label>
            <input id="password" class="auth-input" type="password" name="password" required autocomplete="current-password">
            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        <div class="auth-row">
            <label for="remember_me" class="auth-check">
                <input id="remember_me" type="checkbox" name="remember">
                <span>Recordarme</span>
            </label>

            @if (Route::has('password.request'))
                <a class="auth-link" href="{{ route('password.request') }}">Olvide mi contrasena</a>
            @endif
        </div>

        <div class="auth-row" style="justify-content:flex-end; margin-top: 8px;">
            <button type="submit" class="auth-btn">Entrar</button>
        </div>
    </form>
</x-guest-layout>
