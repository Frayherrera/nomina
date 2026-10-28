@extends('layouts.nomina')

@section('titulo', 'Empleados')

@section('contenido')
<style>
        :root {
            --bg: #f8f6f2;
            --card: #ffffff;
            --head: #f6f4ef;
            --border: #e8e4dc;
            --ink: #1b1f23;
            --muted: #5f6b76;
            --primary: #1b4d45;
            --primary-hover: #153d37;
            --warn: #a8610a;
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
            max-width: 1040px;
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

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
            gap: 24px;
            margin-bottom: 28px;
        }
        .header h1 {
            font-family: var(--serif);
            font-weight: 600;
            font-size: 28px;
            margin: 8px 0 6px;
            letter-spacing: -.01em;
        }
        .header p.lead {
            margin: 0;
            max-width: 560px;
            color: var(--muted);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 10px 18px;
            border-radius: 8px;
            font: 600 13px var(--sans);
            text-decoration: none;
            border: 0;
            cursor: pointer;
            background: var(--primary);
            color: #fff;
            transition: background .15s;
        }
        .btn:hover { background: var(--primary-hover); }
        .btn:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }

        /* Tabla */
        .table-wrap {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            overflow: hidden;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 720px;
        }
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
        thead th:first-child, tbody td:first-child { padding-left: 16px; }
        thead th:last-child, tbody td:last-child { padding-right: 16px; }
        tbody td {
            padding: 12px 8px;
            vertical-align: middle;
            border-bottom: 1px solid var(--border);
        }
        tbody tr:last-child td { border-bottom: 0; }

        .right { text-align: right; }

        .worker-name { display: block; font-weight: 500; text-transform: uppercase; }
        .worker-doc { display: block; font-size: 12px; color: var(--muted); }
        .empty { color: var(--muted); }

        .risk { color: var(--warn); font-weight: 500; }
        .status { color: var(--primary); font-size: 12px; font-weight: 500; }

        .actions { display: flex; justify-content: flex-end; gap: 6px; }
        .icon-btn {
            display: inline-grid;
            place-items: center;
            width: 30px;
            height: 30px;
            border: 0;
            border-radius: 6px;
            background: transparent;
            color: var(--ink);
            cursor: pointer;
            transition: background .15s;
        }
        .icon-btn:hover { background: var(--head); }
        .icon-btn.delete { color: var(--muted); }
        .icon-btn:focus-visible { outline: 2px solid var(--primary); }

        @media (max-width: 640px) {
            .header { flex-direction: column; align-items: flex-start; }
        }
    </style>

<main class="page">

    <header class="header">
        <div>
            <p class="eyebrow">Base de datos</p>
            <h1>Empleados</h1>
            <p class="lead">
                El maestro es la base de la liquidación: salario, nivel de riesgo y
                afiliaciones se usan en cada cálculo y cruce.
            </p>
        </div>
        <a href="#" class="btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
            Nuevo empleado
        </a>
    </header>

    <div class="table-wrap">
        <table>
            <thead>
                <tr>
                    <th>Trabajador</th>
                    <th>Cargo · C. costos</th>
                    <th class="right">Salario básico</th>
                    <th>Riesgo</th>
                    <th>Estado</th>
                    <th class="right">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <span class="worker-name">Prueba auditoria</span>
                        <span class="worker-doc">CC 1099999888</span>
                    </td>
                    <td class="empty">—</td>
                    <td class="right">$ 2.500.000</td>
                    <td class="risk">I</td>
                    <td class="status">Activo</td>
                    <td>
                        <div class="actions">
                            <button type="button" class="icon-btn" aria-label="Editar empleado">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M17 3a2.83 2.83 0 0 1 4 4L7.5 20.5 2 22l1.5-5.5Z"/><path d="m15 5 4 4"/></svg>
                            </button>
                            <button type="button" class="icon-btn delete" aria-label="Eliminar empleado">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M3 6h18M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2m3 0v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"/><path d="M10 11v6M14 11v6"/></svg>
                            </button>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</main>
@endsection
