@extends('layouts.auditoria')

@section('titulo', 'Hallazgos')

@section('contenido')
    <section class="flex flex-col gap-4">
        <div class="flex flex-wrap items-center gap-2 text-xs text-[color:var(--text-sub)]">
            <span class="mono uppercase tracking-[0.4em]">Acta</span>
            <span class="h-px w-8 bg-[color:var(--line)]"></span>
            <span class="mono uppercase tracking-[0.4em]">Evidencia</span>
        </div>
        <div class="flex flex-col gap-3">
            <h1 class="display text-3xl sm:text-4xl lg:text-5xl">Hallazgos y trazabilidad</h1>
            <p class="max-w-2xl text-[color:var(--text-sub)]">Cada hallazgo muestra: valor origen, valor comparado, diferencia, regla, versión, fuente, ejecución y responsable.</p>
        </div>
    </section>

    <section class="grid gap-px border border-[color:var(--line)] bg-[color:var(--line)] sm:grid-cols-2 lg:grid-cols-5">
        @php
            $res = [
                ['t' => 'Correcto', 'v' => '08'],
                ['t' => 'Advertencia', 'v' => '03'],
                ['t' => 'Error', 'v' => '01'],
                ['t' => 'No evaluable', 'v' => '02'],
                ['t' => 'Pendiente', 'v' => '04'],
            ];
        @endphp
        @foreach($res as $r)
            <article class="flex flex-col gap-2 bg-[color:var(--panel)] p-5">
                <p class="mono text-[10px] uppercase tracking-[0.4em] text-[color:var(--text-sub)]">{{ $r['t'] }}</p>
                <p class="display text-3xl">{{ $r['v'] }}</p>
            </article>
        @endforeach
    </section>

    <section class="border border-[color:var(--line)] bg-[color:var(--panel)]">
        <header class="flex flex-wrap items-center justify-between gap-3 border-b border-[color:var(--line)] px-4 py-4 sm:px-5">
            <div>
                <p class="display text-lg">Detalle rastreable</p>
                <p class="text-sm text-[color:var(--text-sub)]">Por empleado y concepto</p>
            </div>
            <span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Regla · Versión · Ejecución</span>
        </header>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[1120px] text-sm">
                <thead>
                    <tr class="text-left text-[color:var(--text-sub)]">
                        <th class="px-4 py-2.5 font-normal sm:px-5">ID</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Empleado</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Fuente</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Concepto</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Origen</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Comparado</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Diferencia</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Regla</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Clasificación</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[color:var(--line)]">
                    @php
                        $hallazgos = [
                            ['id' => 'XXXXXXXXXX', 'nom' => 'Empleado A', 'f' => 'Nómina-PILA', 'c' => 'Días cotizados', 'o' => '30', 'comp' => '29', 'd' => '-1', 'r' => 'PILA.DIAS_VS_NOMINA v1.0', 'cl' => 'Error'],
                            ['id' => 'XXXXXXXXXX', 'nom' => 'Empleado A', 'f' => 'Nómina-PILA', 'c' => 'IBC Salud', 'o' => '$ X.XXX.XXX', 'comp' => '$ X.XXX.XXX', 'd' => '$ (XX.XXX)', 'r' => 'PILA.IBC_SALUD v1.0', 'cl' => 'Advertencia'],
                            ['id' => 'XXXXXXXXXX', 'nom' => 'Empleado C', 'f' => 'Nómina-SIIGO', 'c' => 'Aporte EPS por pagar', 'o' => 'ND', 'comp' => 'Mapeado', 'd' => 'ND', 'r' => 'SIIGO.MAPEO_CUENTAS v1.0', 'cl' => 'No evaluable'],
                        ];
                    @endphp
                    @foreach($hallazgos as $h)
                        <tr class="hover:bg-white/5">
                            <td class="mono px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $h['id'] }}</td>
                            <td class="px-4 py-3 sm:px-5">{{ $h['nom'] }}</td>
                            <td class="px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $h['f'] }}</td>
                            <td class="px-4 py-3 sm:px-5">{{ $h['c'] }}</td>
                            <td class="mono px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $h['o'] }}</td>
                            <td class="mono px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $h['comp'] }}</td>
                            <td class="mono px-4 py-3 sm:px-5">{{ $h['d'] }}</td>
                            <td class="mono px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $h['r'] }}</td>
                            <td class="px-4 py-3 mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)] sm:px-5">{{ $h['cl'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="flex flex-wrap items-center justify-between gap-3 border-t border-[color:var(--line)] px-4 py-3 text-sm text-[color:var(--text-sub)] sm:px-5">
            <p>Corrección, justificación y responsable se registran por hallazgo. No se ocultan diferencias.</p>
            <p class="mono text-[10px] uppercase tracking-[0.3em]">Datos ficticios · Demo</p>
        </div>
    </section>

    <div class="flex justify-end">
        <a href="{{ route('demo.informe') }}" class="inline-flex items-center gap-3 border border-[color:var(--line)] px-5 py-2.5 text-sm text-[color:var(--text-sub)] transition hover:border-[color:var(--accent)] hover:text-[color:var(--text)]">
            <span>Generar</span>
            <span class="mono text-[10px] uppercase tracking-[0.3em]">Informe</span>
        </a>
    </div>
@endsection
