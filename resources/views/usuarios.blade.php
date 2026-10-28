@extends('layouts.nomina')

@section('titulo', 'Usuarios y roles')

@section('contenido')
<style>
        :root {
            --bg: #f8f6f2;
            --card: #ffffff;
            --head: #f6f4ef;
            --border: #e8e4dc;
            --field-border: #d9d5cc;
            --ink: #1b1f23;
            --muted: #5f6b76;
            --primary: #1b4d45;
            --primary-hover: #153d37;
            --serif: "Playfair Display", Georgia, serif;
            --sans: "Inter", system-ui, -apple-system, "Segoe UI", sans-serif;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--bg);
            color: var(--ink);
            font-family: var(--sans);
            font-size: 14px;
            line-height: 1.5;
        }

        .page {
            max-width: 1000px;
            margin: 0 auto;
            padding: 36px 24px 64px;
        }

        .eyebrow {
            font-size: 11px;
            letter-spacing: .14em;
            text-transform: uppercase;
            color: var(--muted);
            margin: 0;
        }

        .header { margin-bottom: 28px; }
        .header h1 {
            font-family: var(--serif);
            font-weight: 600;
            font-size: 28px;
            margin: 8px 0 6px;
            letter-spacing: -.01em;
        }
        .header p.lead { margin: 0; color: var(--muted); }

        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
        }

        /* Tarjetas de roles */
        .roles {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px;
            margin-bottom: 20px;
        }
        .role { padding: 18px; }
        .role h2 { margin: 0 0 4px; font-size: 14px; font-weight: 500; }
        .role p { margin: 0; font-size: 12px; color: var(--muted); }

        /* Tabla */
        .table-wrap {
            overflow: hidden;
            overflow-x: auto;
            margin-bottom: 20px;
        }
        table { width: 100%; border-collapse: collapse; min-width: 720px; }
        thead th {
            background: var(--head);
            color: var(--muted);
            font-weight: 400;
            font-size: 13px;
            text-align: left;
            padding: 12px 8px;
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
        }
        tbody td {
            padding: 10px 8px;
            border-bottom: 1px solid var(--border);
            vertical-align: middle;
        }
        tbody tr:last-child td { border-bottom: 0; }
        thead th:first-child, tbody td:first-child { padding-left: 14px; }
        .user-name { font-weight: 500; }
        .muted { color: var(--muted); }

        /* Selects e inputs */
        select, input[type="email"] {
            font: 400 14px var(--sans);
            color: var(--ink);
            background: #fff;
            border: 1px solid var(--field-border);
            border-radius: 8px;
            padding: 9px 12px;
            transition: border-color .15s, box-shadow .15s;
        }
        select { cursor: pointer; }
        select:focus, input[type="email"]:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(27, 77, 69, .15);
        }
        td select { min-width: 175px; }

        /* Invitar */
        .invite { padding: 20px 18px 22px; }
        .invite .eyebrow { margin-bottom: 16px; }
        .invite-row {
            display: flex;
            align-items: flex-end;
            gap: 10px;
        }
        .invite-row label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 6px;
        }
        .invite-row .email { flex: 1; }
        .invite-row .email input { width: 100%; }
        .invite-row .role-field select { width: 196px; }

        .btn {
            padding: 10px 18px;
            border: 0;
            border-radius: 8px;
            background: var(--primary);
            color: #fff;
            font: 600 13px var(--sans);
            cursor: pointer;
            transition: background .15s;
        }
        .btn:hover { background: var(--primary-hover); }
        .btn:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }

        @media (max-width: 800px) {
            .roles { grid-template-columns: 1fr; }
            .invite-row { flex-direction: column; align-items: stretch; }
            .invite-row .role-field select { width: 100%; }
        }
    </style>

<main class="page">

    <header class="header">
        <p class="eyebrow">Control de acceso</p>
        <h1>Usuarios y roles</h1>
        <p class="lead">Define quién elabora la nómina, quién la revisa y quién autoriza el pago.</p>
    </header>

    {{-- Descripción de roles --}}
    <section class="roles" aria-label="Roles del proceso">
        <article class="card role">
            <h2>Auxiliar contable</h2>
            <p>Elabora la nómina, carga soportes y registra novedades.</p>
        </article>
        <article class="card role">
            <h2>Contador</h2>
            <p>Revisa, ejecuta la auditoría y emite el concepto.</p>
        </article>
        <article class="card role">
            <h2>Gerencia</h2>
            <p>Autoriza el pago y administra parámetros y usuarios.</p>
        </article>
    </section>

    {{-- Usuarios --}}
    <div class="card table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Rol plataforma</th>
                    <th>Rol en el proceso</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="user-name">Anguie Thomas</td>
                    <td class="muted">anguiethomas76@gmail.com</td>
                    <td class="muted">Administrador</td>
                    <td>
                        <select name="rol_proceso[]" aria-label="Rol en el proceso de Anguie Thomas">
                            <option>Auxiliar contable</option>
                            <option>Contador</option>
                            <option selected>Gerencia</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="user-name">luifermejia1104</td>
                    <td class="muted">luifermejia1104@gmail.com</td>
                    <td class="muted">Administrador</td>
                    <td>
                        <select name="rol_proceso[]" aria-label="Rol en el proceso de luifermejia1104">
                            <option>Auxiliar contable</option>
                            <option>Contador</option>
                            <option selected>Gerencia</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="user-name">fraydavid170802</td>
                    <td class="muted">fraydavid170802@gmail.com</td>
                    <td class="muted">Administrador</td>
                    <td>
                        <select name="rol_proceso[]" aria-label="Rol en el proceso de fraydavid170802">
                            <option>Auxiliar contable</option>
                            <option>Contador</option>
                            <option selected>Gerencia</option>
                        </select>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- Invitar usuario --}}
    <form method="POST" class="card invite">
        @csrf
        <p class="eyebrow">Invitar usuario</p>
        <div class="invite-row">
            <div class="email">
                <label for="correo">Correo electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="contador@empresa.com">
            </div>
            <div class="role-field">
                <label for="rol">Rol en el proceso</label>
                <select id="rol" name="rol">
                    <option>Auxiliar contable</option>
                    <option>Contador</option>
                    <option>Gerencia</option>
                </select>
            </div>
            <button type="submit" class="btn">Invitar</button>
        </div>
    </form>

</main>
@endsection
