# AGENTS.md

## Stack
- **Backend:** Laravel (PHP) — see `composer.json`
- **Frontend build:** Vite 7 + `laravel-vite-plugin` + Tailwind CSS v4 (`@tailwindcss/vite`)
- **Views:** Blade in `resources/views/`
- **Assets:** `resources/js/app.js`, `resources/js/bootstrap.js`, CSS loaded via Vite (`resources/css/app.css` referenced in `vite.config.js`)

## Commands
- **Windows/PowerShell:** use `npm.cmd` — plain `npm` fails (`npm.ps1` blocked by execution policy).
- **Install:** `composer install` + `npm.cmd install` (`node_modules` may be missing; install breaks silently otherwise)
- **Dev:** `npm.cmd run dev` (Vite HMR)
- **Build:** `npm.cmd run build`

### Views changes require a rebuild
Blade views depend on Tailwind classes; a stale `public/build` CSS means missing styles (e.g. sidebar `pl-[280px]` missing → sidebar overlaps content). After styling changes, run `npm.cmd run build` (or keep `npm.cmd run dev` running) and verify the new class exists in `public/build/assets/*.css`.

## Routes & views (current)
- **Routes:** `routes/web.php`
  - `/` → `inicio` (name `inicio`)
  - `/empleados` → `empleados`
  - `/parametros` → `parametros`
  - `/periodos` → `periodos`
  - `/usuarios` → `usuarios`
  - Also `demo/*` group (separate from the main 5 views)
- **Layout:** `resources/views/layouts/nomina.blade.php` — fixed left sidebar (72px), Inter font, Tabler Icons CDN, grouped nav (General / Configuración), sticky header showing `@yield('titulo')`
- **Main views:** `resources/views/{inicio,empleados,parametros,periodos,usuarios}.blade.php` extend `layouts.nomina`. Currently minimal/blank cards.
- **Note:** For the 5 main routes above, there are no controllers/models in use (closures/view returns). The `demo/*` routes use `Route::view`.

## Conventions
- **UI/design work:** Always use the `frontend-design` skill when asked to design or redesign UI/views.
- **Layouts:** Prefer extending `layouts.nomina` for the main admin views. Keep sidebar structure consistent (sections + icons).
- **Styling:** Use Tailwind CSS v4 classes. Follow existing spacing/border patterns in `nomina.blade.php`.
- **Icons:** Tabler Icons via CDN (already included in the layout).
- **Content:** For placeholder views, keep them minimal and consistent with the card pattern used in the layout. 

## Config references
- Vite: `vite.config.js` (inputs `['resources/css/app.css', 'resources/js/app.js']`, `refresh: true`)
- Package scripts: `package.json`
- PHP deps: `composer.json`/`composer.lock`
