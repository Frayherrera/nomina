@extends('layouts.auditoria')

@section('titulo', 'Informe final')

@section('contenido')
    <section class="flex flex-col gap-4">
        <div class="flex flex-wrap items-center gap-2 text-xs text-[color:var(--text-sub)]">
            <span class="mono uppercase tracking-[0.4em]">Acta</span>
            <span class="h-px w-8 bg-[color:var(--line)]"></span>
            <span class="mono uppercase tracking-[0.4em]">Concepto y autorización</span>
        </div>
        <div class="flex flex-col gap-3">
            <h1 class="display text-3xl sm:text-4xl lg:text-5xl">Informe · Lista de chequeo</h1>
            <p class="max-w-2xl text-[color:var(--text-sub)]">Diferencia hallazgos automáticos del concepto humano. Requiere evidencia para marcar correcciones o aprobación.</p>
        </div>
    </section>

    <section class="grid gap-4 lg:grid-cols-[1.05fr_0.95fr]">
        <article class="border border-[color:var(--line)] bg-[color:var(--panel)]">
            <header class="border-b border-[color:var(--line)] px-4 py-4 sm:px-5">
                <p class="display text-lg">Lista de chequeo</p>
                <p class="text-sm text-[color:var(--text-sub)]">Procedimiento del contador</p>
            </header>
            <ul class="divide-y divide-[color:var(--line)] text-sm">
                @php
                    $check = [
                        'Nómina recibida', 'PILA recibida', 'Causación SIIGO recibida', 'Días cotizados revisados',
                        'IBC revisado', 'EPS revisada', 'AFP revisada', 'ARL revisada', 'Parafiscales revisados',
                        'Neto a pagar revisado', 'Prestaciones revisadas', 'Contabilidad revisada', 'Diferencias corregidas', 'Aprobación emitida'
                    ];
                @endphp
                @foreach($check as $item)
                    <li class="flex items-center justify-between gap-3 px-4 py-3 sm:px-5">
                        <span class="text-[color:var(--text)]">{{ $item }}</span>
                        <span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Pendiente</span>
                    </li>
                @endforeach
            </ul>
        </article>
        <article class="flex flex-col border border-[color:var(--line)] bg-[color:var(--panel)]">
            <header class="border-b border-[color:var(--line)] px-4 py-4 sm:px-5">
                <p class="display text-lg">Autorización</p>
                <p class="text-sm text-[color:var(--text-sub)]">Contador · Gerencia</p>
            </header>
            <div class="flex flex-1 flex-col gap-3 px-4 py-4 sm:px-5">
                <div class="border border-[color:var(--line)] p-4">
                    <p class="display text-base">Contador · Concepto</p>
                    <p class="mt-1 text-sm text-[color:var(--text-sub)]">Aprobado / No aprobado · Observaciones obligatorias si hay diferencias not corregidas.</p>
                    <span class="mt-3 inline-flex border border-[color:var(--line)] px-2 py-1 mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Sin registrar</span>
                </div>
                <div class="border border-[color:var(--line)] p-4">
                    <p class="display text-base">Gerencia · Autorización de pago</p>
                    <p class="mt-1 text-sm text-[color:var(--text-sub)]">Autorización explícita. No se autoriza automáticamente por validaciones.</p>
                    <span class="mt-3 inline-flex border border-[color:var(--line)] px-2 py-1 mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Sin registrar</span>
                </div>
                <div class="mt-auto flex flex-wrap items-center gap-2">
                    <span class="inline-flex items-center gap-2 border border-[color:var(--line)] px-4 py-2 text-sm text-[color:var(--text-sub)]">Exportar PDF</span>
                    <span class="inline-flex items-center gap-2 border border-[color:var(--line)] px-4 py-2 text-sm text-[color:var(--text-sub)]">Exportar Excel</span>
                </div>
            </div>
        </article>
    </section>

    <section class="border border-[color:var(--line)] bg-[color:var(--panel)]">
        <header class="border-b border-[color:var(--line)] px-4 py-4 sm:px-5">
            <p class="display text-lg">Trazabilidad y limitaciones</p>
            <p class="text-sm text-[color:var(--text-sub)]">Pie del informe</p>
        </header>
        <div class="grid gap-4 px-4 py-4 text-sm text-[color:var(--text-sub)] sm:px-5 md:grid-cols-3">
            <p>Archivos cargados, resumen, diferencias por empleado/concepto, valores/origen/regla, observaciones, lista de chequeo, concepto y autorización.</p>
            <p>Separa hallazgos automáticos del concepto humano. Guarda ejecución, regla, versión y fuente.</p>
            <p>Reglas pendientes de definición, datos faltantes y validaciones no evaluables quedan explícitas.</p>
        </div>
    </section>
@endsection
