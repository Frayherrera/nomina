@extends('layouts.nomina')

@section('titulo', 'Periodos')

@section('contenido')
<style>
        :root {
            --bg: #f8f6f2;
            --card: #ffffff;
            --border: #e8e4dc;
            --ink: #1b1f23;
            --muted: #5f6b76;
            --primary: #1b4d45;
            --primary-hover: #153d37;
            --warn: #a8610a;
            --warn-bg: #fdecc8;
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
            background: var(--primary);
            color: #fff;
            transition: background .15s;
        }
        .btn:hover { background: var(--primary-hover); }
        .btn:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }

        /* Lista de períodos */
        .period-list {
            list-style: none;
            margin: 0;
            padding: 0;
            display: grid;
            gap: 12px;
        }

        .period-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 24px;
            padding: 20px 18px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            color: inherit;
            text-decoration: none;
            transition: border-color .15s, box-shadow .15s;
        }
        .period-item:hover {
            border-color: #d3cdc0;
            box-shadow: 0 1px 4px rgba(27, 31, 35, .06);
        }
        .period-item:focus-visible { outline: 2px solid var(--primary); outline-offset: 2px; }

        .period-title {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .period-title h2 {
            font-family: var(--serif);
            font-weight: 600;
            font-size: 16px;
            margin: 0;
        }
        .badge {
            font-size: 11px;
            font-weight: 500;
            padding: 2px 10px;
            border-radius: 999px;
            background: var(--warn-bg);
            color: var(--warn);
            border: 1px solid #f3d595;
        }
        .period-meta {
            margin: 4px 0 0;
            font-size: 12px;
            color: var(--muted);
        }

        .period-totals {
            display: flex;
            align-items: center;
            gap: 20px;
            flex-shrink: 0;
        }
        .total { text-align: right; }
        .total .eyebrow { font-size: 10px; margin-bottom: 2px; }
        .total strong { font-weight: 500; font-size: 14px; }
        .chevron { color: var(--muted); }

        @media (max-width: 640px) {
            .header { flex-direction: column; align-items: flex-start; }
            .period-item { flex-direction: column; align-items: flex-start; }
            .period-totals { width: 100%; justify-content: space-between; }
        }
    </style>

<main class="page">

    <header class="header">
        <div>
            <p class="eyebrow">Ciclo mensual</p>
            <h1>Períodos de nómina</h1>
            <p class="lead">
                Cada período concentra la liquidación, los soportes cargados,
                los hallazgos y el concepto del contador.
            </p>
        </div>
        <a href="#" class="btn">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M12 5v14M5 12h14"/></svg>
            Nuevo período
        </a>
    </header>

    <ul class="period-list">
        <li>
            <a href="#" class="period-item">
                <div>
                    <div class="period-title">
                        <h2>Octubre 2026</h2>
                        <span class="badge">Auditado</span>
                    </div>
                    <p class="period-meta">
                        01 de oct de 2026 — 31 de oct de 2026 · 1 empleados · 3 hallazgos
                    </p>
                </div>

                <div class="period-totals">
                    <div class="total">
                        <p class="eyebrow">Neto</p>
                        <strong>$ 2.500.000</strong>
                    </div>
                    <div class="total">
                        <p class="eyebrow">Costo total</p>
                        <strong>$ 3.635.883</strong>
                    </div>
                    <svg class="chevron" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="m9 18 6-6-6-6"/></svg>
                </div>
            </a>
        </li>
    </ul>

</main>
@endsection
