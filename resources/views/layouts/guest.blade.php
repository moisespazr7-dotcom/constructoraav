<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Acceso interno | Constructora AV</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <style>
        body.auth-body {
            margin: 0;
            min-height: 100vh;
            background: radial-gradient(circle at top right, rgba(180, 140, 10, 0.22), transparent 42%), linear-gradient(135deg, #dfe6ed 0%, #edf2f7 55%, #f5f7fa 100%);
            color: #1c2a3a;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            display: grid;
            place-items: center;
            padding: 24px;
        }

        .auth-wrap {
            width: 100%;
            max-width: 460px;
        }

        .auth-brand {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            margin-bottom: 16px;
        }

        .auth-brand img {
            height: 90px;
            width: auto;
            object-fit: contain;
        }

        .auth-card {
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(28, 42, 58, 0.1);
            border-radius: 20px;
            padding: 28px;
            box-shadow: 0 24px 44px rgba(15, 23, 42, 0.14);
            backdrop-filter: blur(6px);
        }

        .auth-title {
            margin: 0 0 6px;
            font-size: 30px;
            line-height: 1.1;
            color: #0f172a;
        }

        .auth-subtitle {
            margin: 0 0 20px;
            color: #334155;
            font-size: 15px;
        }

        .auth-form {
            display: grid;
            gap: 12px;
        }

        .auth-label {
            display: block;
            margin-bottom: 6px;
            font-size: 13px;
            color: #475467;
            font-weight: 600;
        }

        .auth-input {
            width: 100%;
            border-radius: 12px;
            border: 1px solid rgba(28, 42, 58, 0.2);
            background: #fff;
            padding: 12px 14px;
            font-size: 15px;
            color: #1c2a3a;
        }

        .auth-input:focus {
            outline: none;
            border-color: #b48c0a;
            box-shadow: 0 0 0 3px rgba(180, 140, 10, 0.15);
        }

        .auth-error {
            color: #b42318;
            font-size: 13px;
            margin-top: 6px;
        }

        .auth-status {
            border-radius: 10px;
            background: #ecfdf3;
            border: 1px solid #abefc6;
            color: #027a48;
            font-size: 13px;
            padding: 8px 10px;
        }

        .auth-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            flex-wrap: wrap;
            margin-top: 6px;
        }

        .auth-link {
            color: #1c2a3a;
            font-size: 14px;
            text-decoration: none;
            border-bottom: 1px solid rgba(28, 42, 58, 0.35);
        }

        .auth-link:hover {
            border-bottom-color: #b48c0a;
            color: #b48c0a;
        }

        .auth-btn {
            border: none;
            border-radius: 999px;
            padding: 12px 20px;
            font-weight: 700;
            font-size: 15px;
            color: #fff;
            cursor: pointer;
            background: linear-gradient(145deg, #e6c66a 0%, #b48c0a 45%, #d4b056 100%);
            box-shadow: 0 12px 20px rgba(180, 140, 10, 0.3);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .auth-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 16px 24px rgba(180, 140, 10, 0.36);
        }

        .auth-check {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: #334155;
            font-size: 14px;
        }

        .auth-footer {
            margin-top: 16px;
            font-size: 13px;
            color: #667085;
            text-align: center;
        }

        @media (max-width: 520px) {
            .auth-card {
                padding: 22px;
                border-radius: 16px;
            }

            .auth-title {
                font-size: 26px;
            }

            .auth-brand img {
                height: 76px;
            }
        }
    </style>
</head>
<body class="auth-body">
    <main class="auth-wrap">
        <a href="{{ url('/') }}" class="auth-brand" aria-label="Ir al inicio">
            <img src="{{ asset('exteriores/logo-chido.png') }}" alt="Constructora AV">
        </a>
        <section class="auth-card">
            {{ $slot }}
        </section>
        <p class="auth-footer">Sistema interno de Constructora AV</p>
    </main>
</body>
</html>
