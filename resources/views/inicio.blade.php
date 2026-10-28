@extends('layouts.nomina')

@section('titulo', 'Resumen')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resumen de auditoría</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f8f6f2;
            --card: #ffffff;
            --card-soft: #fcfbf9;
            --border: #e8e4dc;
            --ink: #1b1f23;
            --muted: #5f6b76;
            --primary: #1b4d45;
            --primary-hover: #153d37;
            --warn: #a8610a;
            --warn-bg: #fdecc8;
            --danger: #c0262d;
            --slate: #4b6477;
            --radius: 14px;
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

        /* Encabezado */
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
            max-width: 640px;
            color: var(--muted);
            font-size: 15px;
        }

        /* Botones */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 18px;
            border-radius: 8px;
            font: 600 13px var(--sans);
            text-decoration: none;
            border: 1px solid transparent;
            cursor: pointer;
            transition: background .15s, border-color .15s;
        }
        .btn-primary { background: var(--primary); color: #fff; }
        .btn-primary:hover { background: var(--primary-hover); }
        .btn-outline { background: #fff; color: var(--ink); border-color: var(--border); font-weight: 500; }
        .btn-outline:hover { border-color: #cfc9bd; }
        .btn:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }
        .btn-sm { padding: 8px 14px; font-size: 12px; }

        /* Tarjetas */
        .card {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            box-shadow: 0 1px 2px rgba(27, 31, 35, .04);
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 24px;
        }
        .stat { padding: 20px; }
        .stat .value {
            font-family: var(--serif);
            font-size: 26px;
            font-weight: 600;
            margin: 8px 0 2px;
            color: var(--primary);
        }
        .stat .value.warn { color: var(--warn); }
        .stat .value.slate { color: var(--slate); }
        .stat small { color: var(--muted); font-size: 12px; }

        /* Fila principal */
        .main-row {
            display: grid;
            grid-template-columns: 1.85fr 1fr;
            gap: 16px;
            margin-bottom: 24px;
        }

        .period { padding: 24px; }
        .period-head {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }
        .period h2 {
            font-family: var(--serif);
            font-weight: 600;
            font-size: 20px;
            margin: 6px 0 22px;
        }
        .badge {
            font-size: 11px;
            font-weight: 500;
            padding: 3px 12px;
            border-radius: 999px;
            background: var(--warn-bg);
            color: var(--warn);
            border: 1px solid #f3d595;
        }

        .metrics {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px 24px;
            margin-bottom: 26px;
        }
        .metrics dt {
            font-size: 11px;
            letter-spacing: .1em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 4px;
        }
        .metrics dd { margin: 0; font-weight: 500; font-size: 15px; }

        .actions { display: flex; gap: 10px; }

        .alerts { padding: 24px; }
        .alerts ul { list-style: none; margin: 14px 0 20px; padding: 0; }
        .alerts li {
            display: flex;
            justify-content: space-between;
            padding: 9px 0;
            border-bottom: 1px solid #efece6;
            font-size: 14px;
        }
        .alerts li:last-child { border-bottom: 0; }
        .alerts li span:last-child { font-weight: 500; }
        .sev-critica { color: var(--danger); }
        .sev-alta { color: var(--warn); }
        .sev-media { color: var(--slate); }
        .sev-baja { color: var(--muted); }
        .alerts .note { margin: 0; color: var(--muted); font-size: 12px; }

        /* Pasos */
        .steps {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
        }
        .step {
            padding: 18px 20px;
            background: var(--card-soft);
        }
        .step svg { color: var(--primary); display: block; margin-bottom: 12px; }
        .step h3 { margin: 0 0 4px; font-size: 14px; font-weight: 500; }
        .step p { margin: 0; font-size: 12px; color: var(--muted); }

        @media (max-width: 900px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
            .main-row, .steps { grid-template-columns: 1fr; }
        }
        @media (max-width: 560px) {
            .header { flex-direction: column; align-items: flex-start; }
            .stats { grid-template-columns: 1fr; }
            .metrics { grid-template-columns: repeat(2, 1fr); }
        }
    </style>
</head>
<body>
@php
    // Formato de pesos colombianos: $ 2.700.000
    $cop = fn ($valor) => '$ ' . number_format((float) $valor, 0, ',', '.');
@endphp

<main class="page">

    {{-- Encabezado --}}
    <header class="header">
        <div>
            <p class="eyebrow">Control mensual</p>
            <h1>Resumen de auditoría</h1>
            <p class="lead">
                Liquida la nómina del período, cárcala junto con la PILA y la causación,
                y revisa las diferencias antes de autorizar el pago.
            </p>
        </div>
        <a href="{{ route('periodos') }}" class="btn btn-primary">Ir a períodos</a>
    </header>

    {{-- Indicadores --}}
    <section class="stats" aria-label="Indicadores">
        <article class="card stat">
            <p class="eyebrow">Empleados activos</p>
            <div class="value"></div>
            <small>Base del maestro</small>
        </article>

        <article class="card stat">
            <p class="eyebrow">Hallazgos abiertos</p>
            <div class="value warn"></div>
            <small>Diferencias sin resolver</small>
        </article>

        <article class="card stat">
            <p class="eyebrow">Hallazgos críticos</p>
            <div class="value slate"></div>
            <small>Bloquean la aprobación</small>
        </article>

        <article class="card stat">
            <p class="eyebrow">Neto del último período</p>
            <div class="value"></div>
            <small></small>
        </article>
    </section>

    {{-- Último período + alertas --}}
    <section class="main-row">
        <article class="card period">
            <div class="period-head">
                <div>
                    <p class="eyebrow">Último período</p>
                    <h2></h2>
                </div>
                <span class="badge"></span>
            </div>

            <dl class="metrics">
                <div>
                    <dt>Devengado</dt>
                    <dd></dd>
                </div>
                <div>
                    <dt>Deducciones</dt>
                    <dd></dd>
                </div>
                <div>
                    <dt>Neto a pagar</dt>
                    <dd></dd>
                </div>
                <div>
                    <dt>Aportes y parafiscales</dt>
                    <dd></dd>
                </div>
                <div>
                    <dt>Prestaciones</dt>
                    <dd></dd>
                </div>
                <div>
                    <dt>Costo total</dt>
                    <dd></dd>
                </div>
            </dl>

            <div class="actions">
                <a href="" class="btn btn-primary btn-sm">
                    Abrir período
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17 17 7M8 7h9v9"/></svg>
                </a>
                <a href="" class="btn btn-outline btn-sm">Ver hallazgos</a>
            </div>
        </article>

        <aside class="card alerts">
            <p class="eyebrow">Alertas</p>
            <ul>
                <li><span>Críticas</span></li>
                <li><span>Altas</span></li>
                <li><span>Medias</span></li>
                <li><span>Bajas</span></li>
            </ul>
            <p class="note">
                Las alertas críticas deben corregirse antes de que el contador emita el concepto.
            </p>
        </aside>
    </section>

    {{-- Flujo de trabajo --}}
    <section class="steps" aria-label="Flujo de trabajo">
        <article class="card step">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M22 21v-2a4 4 0 0 0-3-3.87M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <h3>1 · Maestro</h3>
            <p>Mantén actualizados salario, riesgo ARL y afiliaciones de cada trabajador.</p>
        </article>

        <article class="card step">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10Z"/><path d="m9 12 2 2 4-4"/></svg>
            <h3>2 · Liquidación</h3>
            <p>El sistema calcula devengos, deducciones, aportes y prestaciones del período.</p>
        </article>

        <article class="card step">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m21.7 18-8-14a2 2 0 0 0-3.4 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.7-3Z"/><path d="M12 9v4M12 17h.01"/></svg>
            <h3>3 · Auditoría</h3>
            <p>Se cruzan nómina, PILA y SIIGO y cada diferencia trae su corrección.</p>
        </article>
    </section>

</main>
</body>
</html>
@endsection
