@extends('layouts.auditoria')

@section('titulo', 'Carga de archivos')

@section('contenido')
    <section class="flex flex-col gap-4">
        <div class="flex flex-wrap items-center gap-2 text-xs text-[color:var(--text-sub)]">
            <span class="mono uppercase tracking-[0.4em]">Acta</span>
            <span class="h-px w-8 bg-[color:var(--line)]"></span>
            <span class="mono uppercase tracking-[0.4em]">Recepción</span>
        </div>
        <div class="flex flex-col gap-3">
            <h1 class="display text-3xl sm:text-4xl lg:text-5xl">Carga y validación</h1>
            <p class="max-w-2xl text-[color:var(--text-sub)]">Extensión, MIME, tamaño, estructura y correspondencia al mismo período. Vista previa de columnas antes de ejecutar auditoría.</p>
        </div>
    </section>

    <section class="grid gap-px border border-[color:var(--line)] bg-[color:var(--line)] sm:grid-cols-2 xl:grid-cols-4">
        @php
            $archivos = [
                ['titulo' => 'Nómina mensual', 'ext' => '.XLSX / .XLS', 'req' => 'Obligatorio'],
                ['titulo' => 'Planilla PILA', 'ext' => '.XLSX / .CSV', 'req' => 'Obligatorio'],
                ['titulo' => 'Comprobante SIIGO', 'ext' => '.XLSX / .CSV', 'req' => 'Obligatorio'],
                ['titulo' => 'Soportes de novedades', 'ext' => '.XLSX / .CSV / .PDF', 'req' => 'Opcional'],
            ];
        @endphp
        @foreach($archivos as $archivo)
            <article class="flex flex-col justify-between bg-[color:var(--panel)]">
                <div class="flex flex-col gap-3 p-5">
                    <div class="flex items-start justify-between gap-3">
                        <h2 class="display text-xl">{{ $archivo['titulo'] }}</h2>
                        <span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">{{ $archivo['req'] }}</span>
                    </div>
                    <p class="text-sm text-[color:var(--text-sub)]">Formatos admitidos: {{ $archivo['ext'] }}</p>
                </div>
                <div class="flex items-center justify-between border-t border-[color:var(--line)] px-5 py-3">
                    <span class="text-sm text-[color:var(--text-sub)]">Adjuntar</span>
                    <span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--accent)]">Pendiente</span>
                </div>
            </article>
        @endforeach
    </section>

    <section class="grid gap-4 lg:grid-cols-2">
        <article class="border border-[color:var(--line)] bg-[color:var(--panel)]">
            <header class="flex flex-wrap items-center justify-between gap-3 border-b border-[color:var(--line)] px-5 py-4">
                <div>
                    <p class="display text-lg">Previsualización</p>
                    <p class="text-sm text-[color:var(--text-sub)]">Columnas detectadas</p>
                </div>
                <span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Sin archivo</span>
            </header>
            <div class="flex flex-col gap-2 px-5 py-4 text-sm text-[color:var(--text-sub)]">
                <p>Hoja activa, encabezados, filas leídas, filas rechazadas y advertencias.</p>
                <p>Identificación se conserva como texto. No se asumen nombres de columna.</p>
            </div>
        </article>
        <article class="border border-[color:var(--line)] bg-[color:var(--panel)]">
            <header class="border-b border-[color:var(--line)] px-5 py-4">
                <p class="display text-lg">Chequeo</p>
                <p class="text-sm text-[color:var(--text-sub)]">Consistencia entre fuentes</p>
            </header>
            <ul class="divide-y divide-[color:var(--line)] text-sm">
                <li class="flex items-center justify-between gap-3 px-5 py-3"><span class="text-[color:var(--text)]">Archivos al mismo período</span><span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Por validar</span></li>
                <li class="flex items-center justify-between gap-3 px-5 py-3"><span class="text-[color:var(--text)]">Identificación como texto</span><span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Por validar</span></li>
                <li class="flex items-center justify-between gap-3 px-5 py-3"><span class="text-[color:var(--text)]">Precisión monetaria</span><span class="mono text-[10px] uppercase tracking-[0.3em] text-[color:var(--text-sub)]">Por validar</span></li>
            </ul>
        </article>
    </section>

    <div class="flex justify-end">
        <a href="{{ route('demo.cruce') }}" class="inline-flex items-center gap-3 border border-[color:var(--line)] px-5 py-2.5 text-sm text-[color:var(--text-sub)] transition hover:border-[color:var(--accent)] hover:text-[color:var(--text)]">
            <span>Continuar</span>
            <span class="mono text-[10px] uppercase tracking-[0.3em]">Cruce</span>
        </a>
    </div>
@endsection
