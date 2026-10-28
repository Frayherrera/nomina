@extends('layouts.nomina')

@section('titulo', 'Parámetros')

@section('contenido')
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Parámetros de liquidación</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #f8f6f2;
            --card: #ffffff;
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
            max-width: 960px;
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
        .header p.lead {
            margin: 0;
            max-width: 580px;
            color: var(--muted);
        }

        /* Secciones */
        .section {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 14px;
            padding: 20px 18px 22px;
            margin-bottom: 14px;
        }
        .section .eyebrow { margin-bottom: 18px; }

        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px 18px;
        }

        .field label {
            display: block;
            font-size: 12px;
            font-weight: 500;
            margin-bottom: 6px;
        }
        .field input {
            width: 100%;
            padding: 10px 12px;
            font: 400 14px var(--sans);
            color: var(--ink);
            background: #fff;
            border: 1px solid var(--field-border);
            border-radius: 8px;
            transition: border-color .15s, box-shadow .15s;
        }
        .field input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(27, 77, 69, .15);
        }

        /* Acciones */
        .form-actions {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }
        .btn {
            padding: 10px 20px;
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

        @media (max-width: 760px) {
            .grid { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 480px) {
            .grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<main class="page">

    <header class="header">
        <p class="eyebrow">Configuración</p>
        <h1>Parámetros de liquidación</h1>
        <p class="lead">
            Valores vigentes usados en el cálculo de nómina, aportes y prestaciones.
            Ajústalos cada vez que cambie la norma o la vigencia.
        </p>
    </header>

    <form method="POST">
        @csrf

        {{-- Vigencia y bases --}}
        <section class="section">
            <p class="eyebrow">Vigencia y bases</p>
            <div class="grid">
                <div class="field">
                    <label for="vigencia">Vigencia</label>
                    <input type="number" id="vigencia" name="vigencia" value="2026">
                </div>
                <div class="field">
                    <label for="smmlv">SMMLV</label>
                    <input type="number" id="smmlv" name="smmlv" value="1423500">
                </div>
                <div class="field">
                    <label for="auxilio_transporte">Auxilio de transporte</label>
                    <input type="number" id="auxilio_transporte" name="auxilio_transporte" value="200000">
                </div>
                <div class="field">
                    <label for="uvt">UVT</label>
                    <input type="number" id="uvt" name="uvt" value="49799">
                </div>
                <div class="field">
                    <label for="tope_auxilio">Tope auxilio (SMMLV)</label>
                    <input type="number" step="any" id="tope_auxilio" name="tope_auxilio" value="2">
                </div>
                <div class="field">
                    <label for="exoneracion_parafiscales">Exoneración parafiscales (SMMLV)</label>
                    <input type="number" step="any" id="exoneracion_parafiscales" name="exoneracion_parafiscales" value="10">
                </div>
                <div class="field">
                    <label for="tolerancia">Tolerancia de diferencia (COP)</label>
                    <input type="number" id="tolerancia" name="tolerancia" value="1000">
                </div>
            </div>
        </section>

        {{-- Seguridad social --}}
        <section class="section">
            <p class="eyebrow">Seguridad social (%)</p>
            <div class="grid">
                <div class="field">
                    <label for="salud_empleado">Salud empleado</label>
                    <input type="number" step="any" id="salud_empleado" name="salud_empleado" value="4">
                </div>
                <div class="field">
                    <label for="salud_empleador">Salud empleador</label>
                    <input type="number" step="any" id="salud_empleador" name="salud_empleador" value="8.5">
                </div>
                <div class="field">
                    <label for="pension_empleado">Pensión empleado</label>
                    <input type="number" step="any" id="pension_empleado" name="pension_empleado" value="4">
                </div>
                <div class="field">
                    <label for="pension_empleador">Pensión empleador</label>
                    <input type="number" step="any" id="pension_empleador" name="pension_empleador" value="12">
                </div>
                <div class="field">
                    <label for="fondo_solidaridad">Fondo de solidaridad</label>
                    <input type="number" step="any" id="fondo_solidaridad" name="fondo_solidaridad" value="1">
                </div>
                <div class="field">
                    <label for="umbral_solidaridad">Umbral solidaridad (SMMLV)</label>
                    <input type="number" step="any" id="umbral_solidaridad" name="umbral_solidaridad" value="4">
                </div>
            </div>
        </section>

        {{-- Parafiscales --}}
        <section class="section">
            <p class="eyebrow">Parafiscales (%)</p>
            <div class="grid">
                <div class="field">
                    <label for="caja_compensacion">Caja de compensación</label>
                    <input type="number" step="any" id="caja_compensacion" name="caja_compensacion" value="4">
                </div>
                <div class="field">
                    <label for="sena">SENA</label>
                    <input type="number" step="any" id="sena" name="sena" value="2">
                </div>
                <div class="field">
                    <label for="icbf">ICBF</label>
                    <input type="number" step="any" id="icbf" name="icbf" value="3">
                </div>
            </div>
        </section>

        <div class="form-actions">
            <button type="submit" class="btn">Guardar cambios</button>
        </div>
    </form>

</main>
</body>
</html>
@endsection
