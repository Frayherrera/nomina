<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('titulo', 'Nómina')</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        <aside class="fixed inset-y-0 left-0 z-40 flex h-screen w-[280px] flex-col border-r border-gray-200 bg-white">
            <div class="flex h-16 items-center gap-3 px-6">
                <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-gradient-to-br from-gray-900 to-gray-700 text-white">
                    <span class="text-sm font-semibold">N</span>
                </div>
                <div class="flex flex-col">
                    <span class="text-sm font-semibold leading-tight">Nómina</span>
                    <span class="text-xs text-gray-500 leading-tight">Panel de administración</span>
                </div>
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
        <div class="flex min-h-screen w-full flex-col pl-[280px]">
           
            <main class="flex-1 px-8 py-8">
                <div class="mx-auto max-w-7xl">
                    @yield('contenido')
                </div>
            </main>
        </div>
    </div>
</body>

</html>
