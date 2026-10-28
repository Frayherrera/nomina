<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Nómina')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: #f8f9fa;
            color: #1f2937;
            text-rendering: optimizeLegibility;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>
</head>

<body class="min-h-screen">
    <div class="flex min-h-screen">
        <div data-sidebar-backdrop class="fixed inset-0 z-40 bg-black/40 opacity-0 transition-opacity duration-200 lg:hidden" hidden></div>

        <aside id="app-sidebar" aria-label="Navegación principal"
            class="fixed inset-y-0 left-0 z-50 flex h-screen w-[280px] flex-col border-r border-gray-200 bg-white transition-transform duration-200 ease-out max-lg:-translate-x-full">
            <div class="flex h-16 items-center gap-3 px-6">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-gradient-to-br from-gray-900 to-gray-700 text-white">
                    <span class="text-sm font-semibold">N</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-semibold leading-tight">Nómina</span>
                    <span class="text-xs text-gray-500 leading-tight">Panel de administración</span>
                </div>
                <button type="button" data-sidebar-close
                    class="ml-auto -mr-2 flex h-9 w-9 items-center justify-center rounded-lg text-gray-500 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-900 lg:hidden"
                    aria-label="Cerrar menú">
                    <i class="ti ti-x text-xl"></i>
                </button>
            </div>
            <nav class="flex-1 overflow-y-auto px-4 py-4">
                <div class="mb-6">
                    <p class="mb-2 px-2 text-xs font-medium uppercase tracking-wider text-gray-400">Principal</p>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('inicio') }}"
                                class="group flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition {{ request()->routeIs('inicio') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="ti ti-layout-dashboard text-lg {{ request()->routeIs('inicio') ? 'text-gray-900' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                                <span class="{{ request()->routeIs('inicio') ? 'font-medium' : '' }}">Resumen</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('empleados') }}"
                                class="group flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition {{ request()->routeIs('empleados') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="ti ti-users text-lg {{ request()->routeIs('empleados') ? 'text-gray-900' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                                <span class="{{ request()->routeIs('empleados') ? 'font-medium' : '' }}">Empleados</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div>
                    <p class="mb-2 px-2 text-xs font-medium uppercase tracking-wider text-gray-400">Configuración</p>
                    <ul class="space-y-1">
                        <li>
                            <a href="{{ route('parametros') }}"
                                class="group flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition {{ request()->routeIs('parametros') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="ti ti-settings text-lg {{ request()->routeIs('parametros') ? 'text-gray-900' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                                <span class="{{ request()->routeIs('parametros') ? 'font-medium' : '' }}">Parámetros</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('periodos') }}"
                                class="group flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition {{ request()->routeIs('periodos') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="ti ti-calendar text-lg {{ request()->routeIs('periodos') ? 'text-gray-900' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                                <span class="{{ request()->routeIs('periodos') ? 'font-medium' : '' }}">Periodos</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('usuarios') }}"
                                class="group flex items-center gap-3 rounded-lg px-3 py-2 text-sm transition {{ request()->routeIs('usuarios') ? 'bg-gray-100 text-gray-900' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                                <i class="ti ti-shield-lock text-lg {{ request()->routeIs('usuarios') ? 'text-gray-900' : 'text-gray-400 group-hover:text-gray-600' }}"></i>
                                <span class="{{ request()->routeIs('usuarios') ? 'font-medium' : '' }}">Usuarios y roles</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="border-t border-gray-200 p-4">
                <a href="#" class="group flex items-center gap-3 rounded-lg px-3 py-2 text-sm text-gray-600 transition hover:bg-gray-50 hover:text-gray-900">
                    <i class="ti ti-logout text-lg text-gray-400 group-hover:text-gray-600"></i>
                    <span>Cerrar sesión</span>
                </a>
            </div>
        </aside>
        <div class="flex min-h-screen w-full flex-col lg:pl-[280px]">
            <header class="sticky top-0 z-30 flex h-14 shrink-0 items-center gap-3 border-b border-gray-200 bg-white/95 px-4 backdrop-blur lg:hidden">
                <button type="button" data-sidebar-open aria-controls="app-sidebar" aria-expanded="false"
                    class="flex h-9 w-9 items-center justify-center rounded-lg text-gray-600 transition hover:bg-gray-100 hover:text-gray-900 focus:outline-none focus-visible:ring-2 focus-visible:ring-gray-900"
                    aria-label="Abrir menú">
                    <i class="ti ti-menu-2 text-xl"></i>
                </button>
                <span class="truncate text-sm font-semibold text-gray-900">@yield('titulo', 'Resumen')</span>
            </header>
            <main class="flex-1 px-4 py-6 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-7xl">
                    @yield('contenido')
                </div>
            </main>
        </div>
    </div>

    <script>
        (function () {
            var sidebar = document.getElementById('app-sidebar');
            var backdrop = document.querySelector('[data-sidebar-backdrop]');
            var openBtn = document.querySelector('[data-sidebar-open]');
            var closeBtn = document.querySelector('[data-sidebar-close]');

            function setOpen(open) {
                sidebar.classList.toggle('max-lg:-translate-x-full', !open);
                backdrop.hidden = !open;
                backdrop.classList.toggle('opacity-0', !open);
                backdrop.classList.toggle('opacity-100', open);
                if (openBtn) openBtn.setAttribute('aria-expanded', String(open));
                document.body.style.overflow = open ? 'hidden' : '';
                if (open) {
                    var first = sidebar.querySelector('a');
                    if (first) first.focus();
                }
            }

            if (openBtn) openBtn.addEventListener('click', function () { setOpen(true); });
            if (closeBtn) closeBtn.addEventListener('click', function () { setOpen(false); });
            backdrop.addEventListener('click', function () { setOpen(false); });
            document.addEventListener('keydown', function (e) {
                if (e.key === 'Escape' && !backdrop.hidden) setOpen(false);
            });
            sidebar.querySelectorAll('a').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (window.innerWidth < 1024) setOpen(false);
                });
            });
            window.addEventListener('resize', function () {
                if (window.innerWidth >= 1024 && !backdrop.hidden) setOpen(false);
            });
        })();
    </script>
</body>

</html>
