@extends('layouts.auditoria')

@section('titulo', 'Inicio')

@section('contenido')
    <section class="grid gap-8 lg:grid-cols-[1.15fr_0.85fr] lg:items-start">
        <div class="flex flex-col gap-6">
            <div class="flex flex-wrap items-center gap-2 text-xs text-[color:var(--text-sub)]">
                <span class="mono uppercase tracking-[0.4em]">Expediente</span>
                <span class="h-px w-10 bg-[color:var(--line)]"></span>
                <span class="mono uppercase tracking-[0.4em]">Revisión mensual</span>
            </div>
            <div class="flex flex-col gap-4">
                <h1 class="display text-4xl sm:text-5xl lg:text-6xl">Auditoría cruzada de nómina, PILA y SIIGO</h1>
                <p class="max-w-2xl text-lg text-[color:var(--text-sub)]">Se confrontan devengados, bases de cotización, aportes y causación contable. Cada diferencia debe poder rastrearse hasta el registro fuente, la regla aplicada y su versión.</p>
            </div>
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('demo.carga') }}" class="group inline-flex items-center gap-3 border border-[color:var(--accent)] px-5 py-2.5 text-sm transition hover:bg-[color:var(--accent)] hover:text-[#0b1026]">
                    <span class="mono text-[10px] uppercase tracking-[0.4em]">Iniciar</span>
                    <span>Expediente</span>
                </a>
                <a href="{{ route('demo.hallazgos') }}" class="inline-flex items-center gap-3 border border-[color:var(--line)] px-5 py-2.5 text-sm text-[color:var(--text-sub)] transition hover:border-[color:var(--accent)] hover:text-[color:var(--text)]">
                    <span class="mono text-[10px] uppercase tracking-[0.4em]">Ver</span>
                    <span>Hallazgos demo</span>
                </a>
            </div>
        </div>
        <div class="grid gap-px border border-[color:var(--line)] bg-[color:var(--line)] sm:grid-cols-2">
            <article class="flex flex-col gap-2 bg-[color:var(--panel)] p-5">
                <p class="mono text-[10px] uppercase tracking-[0.4em] text-[color:var(--text-sub)]">Fuentes</p>
                <p class="display text-4xl">03</p>
                <p class="text-sm text-[color:var(--text-sub)]">Nómina · PILA · SIIGO</p>
            </article>
            <article class="flex flex-col gap-2 bg-[color:var(--panel)] p-5">
                <p class="mono text-[10px] uppercase tracking-[0.4em] text-[color:var(--text-sub)]">Trazabilidad</p>
                <p class="display text-4xl">ORIGEN</p>
                <p class="text-sm text-[color:var(--text-sub)]">Regla · Versión · Ejecución</p>
            </article>
            <article class="flex flex-col gap-3 bg-[color:var(--panel)] p-5 sm:col-span-2">
                <p class="mono text-[10px] uppercase tracking-[0.4em] text-[color:var(--text-sub)]">Principio</p>
                <p class="text-sm text-[color:var(--text-sub)]">Las validaciones automáticas no autorizan el pago. Solo el Contador emite concepto y Gerencia autoriza. La decisión humana es obligatoria.</p>
            </article>
        </div>
    </section>

    <section class="flex flex-col gap-6">
        <div class="flex items-center gap-3">
            <span class="mono text-[10px] uppercase tracking-[0.5em] text-[color:var(--text-sub)]">Ruta</span>
            <span class="h-px flex-1 bg-[color:var(--line)]"></span>
            <span class="mono text-[10px] uppercase tracking-[0.5em] text-[color:var(--text-sub)]">Proceso</span>
        </div>
        <div class="grid gap-px border border-[color:var(--line)] bg-[color:var(--line)] sm:grid-cols-2 lg:grid-cols-5">
            @php
                $pasos = [
                    ['num' => '02', 'titulo' => 'Carga', 'desc' => 'Validar formato, período y estructura'],
                    ['num' => '03', 'titulo' => 'Cruce', 'desc' => 'Confrontar entre fuentes'],
                    ['num' => '04', 'titulo' => 'Hallazgos', 'desc' => 'Clasificar y evidenciar'],
                    ['num' => '05', 'titulo' => 'Revisión', 'desc' => 'Correcciones y justificaciones'],
                    ['num' => '06', 'titulo' => 'Informe', 'desc' => 'Concepto y autorización'],
                ];
            @endphp
            @foreach($pasos as $paso)
                <article class="flex flex-col gap-2 bg-[color:var(--panel)] p-5">
                    <span class="mono text-xs text-[color:var(--text-sub)]">{{ $paso['num'] }}</span>
                    <h2 class class="display text-2xl">{{ $paso['titulo'] }}</h2>
                    <p class="text-sm text-[color:var(--text-sub)]">{{ $paso['desc'] }}</p>
                </article>
            @endforeach
        </div>
    </section>
@endsection
