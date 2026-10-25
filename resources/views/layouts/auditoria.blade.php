<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Auditoría de Nómina') · NOMINA_AUDITORIA</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Sans+Condensed:wght@600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            color-scheme: dark;
            --bg: #0b1026;
            --panel: #10162a;
            --panel-2: #151b33;
            --line: rgba(148, 163, 184, 0.18);
            --text: #e7e9ee;
            --text-sub: #9aa0b4;
            --accent: #22d3ee;
            --accent-2: #a3e635;
        }

        body {
            font-family: 'IBM Plex Sans', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: radial-gradient(1200px 800px at 20% -10%, rgba(34, 211, 238, 0.08), transparent),
                        radial-gradient(1000px 700px at 80% -20%, rgba(163, 230, 53, 0.05), transparent),
                        var(--bg);
            color: var(--text);
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .display {
            font-family: 'IBM Plex Sans Condensed', 'IBM Plex Sans', system-ui, sans-serif;
            letter-spacing: -0.03em;
            text-transform: uppercase;
        }

        .mono {
            font-family: 'IBM Plex Mono', ui-monospace, SFMono-Regular, Menlo, monospace;
        }

        .grid-bg {
            position: relative;
        }

        .grid-bg::before {
            content: "";
            position: fixed;
            inset: 0;
            pointer-events: none;
            background-image: linear-gradient(to right, rgba(148, 163, 184, 0.08) 1px, transparent 1px),
                              linear-gradient(to bottom, rgba(148, 163, 184, 0.08) 1px, transparent 1px);
            background-size: 48px 48px;
            opacity: 0.12;
            mix-blend-mode: screen;
        }

        .acta-rail {
            writing-mode: vertical-rl;
            transform: rotate(180deg);
        }

        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
                scroll-behavior: auto !important;
            }
        }
    </style>
</head>
<body class="grid-bg min-h-screen">
    <header class="relative z-20 border-b border-[color:var(--line)] bg-[color:var(--bg)]/80 backdrop-blur">
        <div class="mx-auto flex max-w-7xl flex-col gap-3 px-4 py-3 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="flex h-9 w-9 items-center justify-center border border-[color:var(--line)]">
                        <span class="mono text-[10px] uppercase tracking-[0.5em] text-[color:var(--text-sub)]">NA</span>
                    </div>
                    <div>
                        <p class="display text-sm leading-none">NOMINA_AUDITORIA</p>
                        <p class="mono text-[10px] uppercase tracking-[0.4em] text-[color:var(--text-sub)]">Acta de auditoría · Colombia</p>
                    </div>
                </div>
                <div class="hidden items-center gap-2 text-xs text-[color:var(--text-sub)] md:flex">
                    <span class="mono uppercase tracking-[0.3em]">Folio</span>
                    <span class="border border-[color:var(--line)] px-2 py-1">DEMO-001</span>
                    <span class="mono uppercase tracking-[0.3em]">Periodo</span>
                    <span class="border border-[color:var(--line)] px-2 py-1">YYYY-MM</span>
                </div>
            </div>
            <nav class="flex flex-wrap items-center gap-1 text-sm">
                <a href="{{ route('demo.inicio') }}" class="flex items-center gap-2 px-3 py-1.5 transition {{ request()->routeIs('demo.inicio') ? 'text-[color:var(--accent)]' : 'text-[color:var(--text-sub)] hover:text-[color:var(--text)]' }}">
                    <span class="mono text-[10px]">01</span>
                    <span>Inicio</span>
                </a>
                <a href="{{ route('demo.carga') }}" class="flex items-center gap-2 px-3 py-1.5 transition {{ request()->routeIs('demo.carga') ? 'text-[color:var(--accent)]' : 'text-[color:var(--text-sub)] hover:text-[color:var(--text)]' }}">
                    <span class="mono text-[10px]">02</span>
                    <span>Carga</span>
                </a>
                <a href="{{ route('demo.cruce') }}" class="flex items-center gap-2 px-3 py-1.5 transition {{ request()->routeIs('demo.cruce') ? 'text-[color:var(--accent)]' : 'text-[color:var(--text-sub)] hover:text-[color:var(--text)]' }}">
                    <span class="mono text-[10px]">03</span>
                    <span>Cruce</span>
                </a>
                <a href="{{ route('demo.hallazgos') }}" class="flex items-center gap-2 px-3 py-1.5 transition {{ request()->routeIs('demo.hallazgos') ? 'text-[color:var(--accent)]' : 'text-[color:var(--text-sub)] hover:text-[color:var(--text)]' }}">
                    <span class="mono text-[10px]">04</span>
                    <span>Hallazgos</span>
                </a>
                <a href="{{ route('demo.informe') }}" class="flex items-center gap-2 px-3 py-1.5 transition {{ request()->routeIs('demo.informe') ? 'text-[color:var(--accent)]' : 'text-[color:var(--text-sub)] hover:text-[color:var(--text)]' }}">
                    <span class="mono text-[10px]">05</span>
                    <span>Informe</span>
                </a>
            </nav>
        </div>
    </header>

    <div class="relative mx-auto grid max-w-7xl grid-cols-1 gap-6 px-4 py-8 sm:px-6 lg:grid-cols-[auto,1fr] lg:px-8">
        <aside class="hidden lg:flex">
            <div class="acta-rail flex items-center gap-3 border-l border-[color:var(--line)] pl-4 text-[color:var(--text-sub)]">
                <span class="mono text-[10px] uppercase tracking-[0.5em]">Acta · Revisión cruzada</span>
                <span class="h-px w-16 bg-[color:var(--line)]"></span>
                <span class="mono text-[10px] uppercase tracking-[0.5em]">Nómina · PILA · SIIGO</span>
            </div>
        </aside>
        <main class="flex flex-col gap-10">
            @yield('contenido')
        </main>
    </div>

    <footer class="relative border-t border-[color:var(--line)]">
        <div class="mx-auto flex max-w-7xl flex-col gap-2 px-4 py-6 text-sm text-[color:var(--text-sub)] sm:flex-row sm:items-center sm:justify-between sm:px-6 lg:px-8">
            <p class="mono text-[10px] uppercase tracking-[0.4em]">Solo vistas · Sin controladores · Sin modelos</p>
            <p>Trazable · Explicable · Sin autorización automática de pago</p>
        </div>
    </footer>
</body>
</html>
