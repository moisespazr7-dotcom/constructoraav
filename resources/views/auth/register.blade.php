<x-guest-layout>
    <h1 class="auth-title">Registro interno</h1>
    <p class="auth-subtitle">Alta de usuarios autorizados para el sistema administrativo.</p>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <div>
            <label for="name" class="auth-label">Nombre</label>
            <input id="name" class="auth-input" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="email" class="auth-label">Correo</label>
            <input id="email" class="auth-input" type="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password" class="auth-label">Contrasena</label>
            <input id="password" class="auth-input" type="password" name="password" required autocomplete="new-password">
            @error('password')
                <p class="auth-error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="password_confirmation" class="auth-label">Confirmar contrasena</label>
            <input id="password_confirmation" class="auth-input" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="auth-row" style="margin-top: 8px;">
            <a class="auth-link" href="{{ route('login') }}">Ya tengo cuenta</a>
            <button type="submit" class="auth-btn">Registrar</button>
        </div>
    </form>
</x-guest-layout>
