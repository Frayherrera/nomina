@extends('layouts.auditoria')

@section('titulo', 'Cruce de información')

@section('contenido')
    <section class="flex flex-col gap-4">
        <div class="flex flex-wrap items-center gap-2 text-xs text-[color:var(--text-sub)]">
            <span class="mono uppercase tracking-[0.4em]">Acta</span>
            <span class="h-px w-8 bg-[color:var(--line)]"></span>
            <span class="mono uppercase tracking-[0.4em]">Confrontación</span>
        </div>
        <div class="flex flex-col gap-3">
            <h1 class="display text-3xl sm:text-4xl lg:text-5xl">Cruce Nómina · PILA · SIIGO</h1>
            <p class="max-w-2xl text-[color:var(--text-sub)]">Comparaciones por empleado e identificación. Cada cruce define conceptos incluidos, cuentas, redondeo y tolerancias.</p>
        </div>
    </section>

    <section class="grid gap-px border border-[color:var(--line)] bg-[color:var(--line)] lg:grid-cols-3">
        @php
            $cruces = [
                ['titulo' => 'Nómina vs PILA', 'items' => ['Días cotizados', 'IBC Salud/Pensión/ARL/CCF', 'EPS/AFP/ARL/CCF', 'Parafiscales', 'Novedades']],
                ['titulo' => 'Nómina vs SIIGO', 'items' => ['Gastos salariales', 'Pasivos por pagar', 'Terceros / Centro de costos', 'Débitos vs Créditos']],
                ['titulo' => 'Cruce global', 'items' => ['Total nómina vs gasto', 'Neto a pagar vs por pagar', 'Seguridad social vs pasivos', 'Prestaciones vs provisiones']],
            ];
        @endphp
        @foreach($cruces as $cruce)
            <article class="flex flex-col gap-3 bg-[color:var(--panel)] p-5">
                <h2 class="display text-2xl">{{ $cruce['titulo'] }}</h2>
                <ul class="flex flex-col gap-2 text-sm text-[color:var(--text-sub)]">
                    @foreach($cruce['items'] as $item)
                        <li class="flex items-center gap-2"><span class="h-1 w-1 bg-[color:var(--accent)]"></span>{{ $item }}</li>
                    @endforeach
                </ul>
                <span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Reglas configurables</span>
            </article>
        @endforeach
    </section>

    <section class="border border-[color:var(--line)] bg-[color:var(--panel)]">
        <header class="flex flex-wrap items-center justify-between gap-3 border-b border-[color:var(--line)] px-4 py-4 sm:px-5">
            <div>
                <p class="display text-lg">Matriz por empleado</p>
                <p class="text-sm text-[color:var(--text-sub)]">Vista resumen (demo)</p>
            </div>
            <span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Ordenado por identificación</span>
        </header>
        <div class="overflow-x-auto">
            <table class="w-full min-w-[980px] text-sm">
                <thead>
                    <tr class="text-left text-[color:var(--text-sub)]">
                        <th class="px-4 py-2.5 font-normal sm:px-5">Identificación</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Empleado</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Nómina</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">PILA</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">SIIGO</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Cruce</th>
                        <th class="px-4 py-2.5 font-normal sm:px-5">Estado</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[color:var(--line)]">
                    @php
                        $filas = [
                            ['id' => 'XXXXXXXXXX', 'nom' => 'Empleado A', 'n' => 'OK', 'p' => 'DIF', 's' => 'OK', 'c' => 'ADVERTENCIA', 'e' => 'Por revisar'],
                            ['id' => 'XXXXXXXXXX', 'nom' => 'Empleado B', 'n' => 'OK', 'p' => 'OK', 's' => 'OK', 'c' => 'CORRECTO', 'e' => 'Sin hallazgos'],
                            ['id' => 'XXXXXXXXXX', 'nom' => 'Empleado C', 'n' => 'PTE', 'p' => 'PTE', 's' => 'PTE', 'c' => 'NO EVALUABLE', 'e' => 'Falta mapeo/regla'],
                        ];
                    @endphp
                    @foreach($filas as $fila)
                        <tr class="hover:bg-white/5">
                            <td class="mono px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $fila['id'] }}</td>
                            <td class="px-4 py-3 sm:px-5">{{ $fila['nom'] }}</td>
                            <td class="px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $fila['n'] }}</td>
                            <td class="px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $fila['p'] }}</td>
                            <td class="px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $fila['s'] }}</td>
                            <td class="px-4 py-3 text-[color:var(--text-sub)] sm:px-5">{{ $fila['c'] }}</td>
                            <td class="px-4 py-3 mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)] sm:px-5">{{ $fila['e'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <div class="flex justify-end">
        <a href="{{ route('demo.hallazgos') }}" class="inline-flex items-center gap-3 border border-[color:var(--line)] px-5 py-2.5 text-sm text-[color:var(--text-sub)] transition hover:border-[color:var(--accent)] hover:text-[color:var(--text)]">
            <span>Ver</span>
            <span class="mono text-[10px] uppercase tracking-[0.3em]">Hallazgos</span>
        </a>
    </div>
@endsection
