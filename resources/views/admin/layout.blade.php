<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin | Constructora AV</title>
    <style>
        :root {
            --bg: #f4f6f9;
            --panel: #ffffff;
            --muted: #667085;
            --text: #101828;
            --accent: #b48c0a;
            --accent-dark: #a0783c;
            --border: #e6e8ec;
        }
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: "Segoe UI", Arial, sans-serif;
            color: var(--text);
            background: var(--bg);
        }
        a { color: inherit; text-decoration: none; }
        .layout {
            display: grid;
            grid-template-columns: 240px 1fr;
            min-height: 100vh;
        }
        .sidebar {
            background: #0f172a;
            color: #e2e8f0;
            padding: 24px 18px;
        }
        .brand {
            font-weight: 700;
            font-size: 18px;
            letter-spacing: 0.5px;
            margin-bottom: 24px;
        }
        .nav a {
            display: block;
            padding: 10px 12px;
            border-radius: 10px;
            margin-bottom: 6px;
            color: #e2e8f0;
        }
        .nav a.active,
        .nav a:hover {
            background: rgba(180, 140, 10, 0.18);
            color: #fef3c7;
        }
        .content {
            padding: 28px 36px 48px;
        }
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            gap: 12px;
        }
        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .card {
            background: var(--panel);
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(16, 24, 40, 0.06);
        }
        .grid-3 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 16px;
        }
        .muted { color: var(--muted); }
        .badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 10px;
            border-radius: 999px;
            font-size: 12px;
            background: #f0f4ff;
            color: #344054;
            text-transform: uppercase;
            letter-spacing: 0.4px;
        }
        .status-new { background: #e0f2fe; color: #075985; }
        .status-in_progress { background: #fef3c7; color: #92400e; }
        .status-closed { background: #dcfce7; color: #166534; }
        .table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .table th,
        .table td {
            text-align: left;
            padding: 10px 12px;
            border-bottom: 1px solid var(--border);
            vertical-align: top;
        }
        .table th { color: #475467; font-weight: 600; }
        .table td small { display: block; color: var(--muted); }
        .actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }
        .btn {
            border: none;
            cursor: pointer;
            padding: 8px 14px;
            border-radius: 999px;
            font-weight: 600;
            background: linear-gradient(140deg, #d9b253, #b48c0a);
            color: #fff;
            box-shadow: 0 8px 20px rgba(180, 140, 10, 0.25);
        }
        .btn-outline {
            background: #fff;
            color: #101828;
            border: 1px solid var(--border);
            box-shadow: none;
        }
        .btn-link {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 8px 12px;
            border-radius: 999px;
            border: 1px solid var(--border);
            color: #334155;
            font-size: 13px;
            font-weight: 600;
            background: #fff;
        }
        .btn-danger {
            background: #0f172a;
            color: #fff;
            box-shadow: none;
        }
        .filters {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            margin-bottom: 16px;
        }
        .input,
        select,
        textarea {
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 8px 10px;
            font-size: 14px;
            width: 100%;
            background: #fff;
        }
        .form-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 12px;
        }
        .flash {
            margin-bottom: 16px;
            padding: 10px 14px;
            border-radius: 10px;
            background: #ecfdf3;
            color: #027a48;
            border: 1px solid #abefc6;
        }
        .section-title {
            margin: 18px 0 10px;
            font-size: 18px;
        }
        @media (max-width: 900px) {
            .layout { grid-template-columns: 1fr; }
            .sidebar { position: sticky; top: 0; z-index: 2; }
        }
    </style>
</head>
<body>
<div class="layout">
    <aside class="sidebar">
        <div class="brand">Constructora AV</div>
        <nav class="nav">
            <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
            <a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">Contactos</a>
            <a href="{{ route('admin.rentals.index') }}" class="{{ request()->routeIs('admin.rentals.*') ? 'active' : '' }}">Rentas</a>
            <a href="{{ route('admin.materials.index') }}" class="{{ request()->routeIs('admin.materials.*') ? 'active' : '' }}">Materiales</a>
            <a href="{{ route('admin.evaluations.index') }}" class="{{ request()->routeIs('admin.evaluations.*') ? 'active' : '' }}">Evaluaciones</a>
            <a href="{{ route('admin.catalogs.index') }}" class="{{ request()->routeIs('admin.catalogs.*') ? 'active' : '' }}">Catalogos</a>
        </nav>
    </aside>
    <main class="content">
        <div class="topbar">
            <div>
                <strong>Panel administrativo</strong>
                <div class="muted" style="font-size: 13px;">Gestione solicitudes y evaluaciones.</div>
            </div>
            <div class="topbar-actions">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Cerrar sesion</button>
                </form>
                <div class="muted" style="font-size: 13px;">{{ auth()->user()->name ?? 'Usuario' }}</div>
            </div>
        </div>
        @if (session('success'))
            <div class="flash">{{ session('success') }}</div>
        @endif
        @if ($errors->any())
            <div class="flash" style="background:#fef3f2; color:#b42318; border-color:#fecdca;">
                {{ $errors->first() }}
            </div>
        @endif
        @yield('content')
    </main>
</div>
</body>
</html>
