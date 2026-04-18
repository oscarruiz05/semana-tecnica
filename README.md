# STI 2026 — Sistema de Gestión Semana Técnica Internacional

Sistema web para la gestión y difusión de la **Semana Técnica Internacional de Ingeniería de Petróleos (STI)**. Incluye un sitio público para los asistentes y un panel administrativo completo para el equipo organizador.

---

## Stack tecnológico

| Capa | Tecnología |
|------|-----------|
| Backend | Laravel 13 (PHP 8.3+) |
| Panel admin | Filament 5 |
| Frontend | Blade + TailwindCSS 4 + Vite 8 |
| Base de datos | PostgreSQL (configurable a SQLite) |
| PDFs | DomPDF (`barryvdh/laravel-dompdf`) |
| Calendario | Guava Calendar 3 (`guava/calendar`) |
| Testing | Pest 4 |

---

## Requisitos

- PHP 8.3+
- Composer
- Node.js 18+ y npm
- PostgreSQL (o SQLite para desarrollo rápido)
- Extensión PHP `intl` (para conversión de números a palabras en PDFs)

---

## Instalación

### 1. Clonar el repositorio

```bash
git clone <url-del-repositorio>
cd semana-tecnica
```

### 2. Instalación automática

```bash
composer setup
```

Este comando ejecuta en orden:
1. `composer install`
2. Copia `.env.example` → `.env`
3. `php artisan key:generate`
4. `php artisan migrate`
5. `npm install`
6. `npm run build`

### 3. Configurar el entorno

Editar `.env` con los datos de la base de datos:

```env
APP_NAME="STI 2026"
APP_URL=http://localhost:8000

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=semana_tecnica
DB_USERNAME=tu_usuario
DB_PASSWORD=tu_password
```

> Para desarrollo con SQLite cambiar `DB_CONNECTION=sqlite` y crear el archivo:
> ```bash
> touch database/database.sqlite
> ```

### 4. Crear enlace de almacenamiento

```bash
php artisan storage:link
```

### 5. Crear el usuario administrador

```bash
php artisan make:filament-user
```

---

## Desarrollo

Levantar todos los servicios en paralelo (servidor, queue y Vite):

```bash
composer dev
```

O por separado:

```bash
php artisan serve                    # Servidor en http://localhost:8000
npm run dev                          # Vite en modo watch
php artisan queue:listen --tries=1   # Procesador de colas
```

---

## Comandos útiles

```bash
# Migraciones
php artisan migrate                  # Ejecutar migraciones pendientes
php artisan migrate:fresh --seed     # Reiniciar base de datos con seeders
php artisan migrate:status           # Ver estado de migraciones

# Caché
php artisan optimize:clear           # Limpiar toda la caché
php artisan config:clear
php artisan view:clear
php artisan cache:clear

# Assets
npm run build                        # Compilar para producción
npm run dev                          # Modo desarrollo con HMR
php artisan filament:assets          # Publicar assets de Filament y plugins

# Filament
php artisan make:filament-user       # Crear usuario administrador
php artisan filament:upgrade         # Actualizar Filament

# Testing
composer test
```

---

## Estructura del proyecto

```
app/
├── Filament/
│   ├── Pages/
│   │   ├── Settings.php             # Ajustes globales del evento
│   │   └── CalendarSchedule.php     # Página del calendario (embebida en Cronograma)
│   ├── Resources/
│   │   ├── Donations/               # Grupo: Donaciones
│   │   │   ├── DonationResource.php
│   │   │   └── SponsorPackageResource.php
│   │   ├── Plans/                   # Grupo: Inscripciones
│   │   │   └── PlanResource.php
│   │   ├── Program/                 # Grupo: Programa
│   │   │   └── ScheduleItemResource.php
│   │   └── Speakers/                # Grupo: Programa
│   │       └── SpeakerResource.php
│   └── Widgets/
│       └── ScheduleCalendarWidget.php
├── Http/Controllers/
│   ├── DonationPdfController.php    # Generación de PDFs de donaciones
│   └── WelcomeController.php        # Sitio público
└── Models/
    ├── Donation.php
    ├── Plan.php
    ├── ScheduleItem.php
    ├── Setting.php
    ├── Speaker.php
    ├── SponsorPackage.php
    └── User.php

resources/views/
├── modules/home/                    # Secciones del sitio público
│   ├── hero.blade.php
│   ├── about.blade.php
│   ├── speakers.blade.php
│   ├── agenda.blade.php
│   ├── pricing.blade.php
│   ├── registration.blade.php
│   ├── sponsors.blade.php
│   └── ...
└── pdf/
    ├── certificado-donacion.blade.php
    ├── documento-soporte.blade.php
    └── preview.blade.php
```

---

## Módulos del panel administrativo

El panel está disponible en `/administrador`.

### Donaciones

| Módulo | Ruta | Descripción |
|--------|------|-------------|
| Paquetes | `/administrador/donaciones/paquetes` | Paquetes sponsor con nombre, monto y color de badge |
| Donaciones | `/administrador/donaciones/registro` | Registro de empresas donantes con generación de PDFs |

**Flujo de donaciones:**
1. Configurar paquetes en *Paquetes de Donación*
2. Crear donación — el No. Documento se genera automáticamente y el valor se autocompleta al seleccionar el paquete
3. Desde la tabla, botón **"Ver PDFs"** abre preview con:
   - **Certificado de Donación** — documento formal para la empresa
   - **Documento Soporte** — equivalente a factura con retención

### Programa

| Módulo | Ruta | Descripción |
|--------|------|-------------|
| Speakers | `/administrador/programa/speakers` | Ponentes con foto, profesión y datos de la charla |
| Cronograma | `/administrador/programa/cronograma` | Agenda del evento con vista lista y calendario |

El **Cronograma** tiene dos tabs:
- **Lista** — tabla filtrable por día y tipo de evento
- **Calendario** — vista interactiva FullCalendar (mes / semana / día / lista)

Tipos de evento: `Apertura` · `Charla` · `Taller` · `Receso` · `Almuerzo` · `Clausura` · `Otro`

### Inscripciones

| Módulo | Ruta | Descripción |
|--------|------|-------------|
| Planes | `/administrador/planes` | Planes de acceso al evento con precio en COP |

### Sistema

| Módulo | Ruta | Descripción |
|--------|------|-------------|
| Ajustes | `/administrador/settings` | Configuración global del evento y la organización |

Ajustes incluye cinco pestañas:
- **Evento** — nombre, edición, fechas, ciudad
- **Organización** — NIT, municipio, cámara de comercio
- **Representante Legal** — nombre, cédula (para firmas en PDFs)
- **Contador Público** — nombre, tarjeta profesional (para firmas en PDFs)
- **Cuenta Bancaria** — banco, número, tipo de cuenta (para PDFs de donaciones)

---

## Sitio público

Disponible en `/` — landing page con las secciones:

| Sección | Descripción |
|---------|-------------|
| Hero | Presentación principal del evento |
| About | Información sobre la STI |
| Speakers | Ponentes confirmados |
| Agenda | Cronograma del evento |
| Pricing | Planes de inscripción (dinámico desde BD) |
| Registration | Formulario de inscripción |
| Sponsors | Empresas patrocinadoras |
| Location | Lugar del evento |
| Testimonials | Testimonios de ediciones anteriores |

---

## PDFs de donaciones

Generados con DomPDF a partir de los datos de la donación y la configuración global.

| Documento | Ruta | Notas |
|-----------|------|-------|
| Certificado de Donación | `/donaciones/{id}/pdf/certificado` | Lleva firmas del representante legal y contador |
| Documento Soporte | `/donaciones/{id}/pdf/soporte` | Incluye retención y datos del agente retenedor |
| Vista previa | `/donaciones/{id}/preview` | Ambos PDFs lado a lado con botones de descarga |

> Estas rutas requieren autenticación.

---

## Base de datos

| Tabla | Descripción |
|-------|-------------|
| `users` | Usuarios del panel administrativo |
| `settings` | Configuración global del evento (registro único, ID=1) |
| `plans` | Planes de inscripción al evento |
| `sponsor_packages` | Paquetes de patrocinio con monto y color |
| `donations` | Donaciones registradas con FK a `sponsor_packages` |
| `speakers` | Ponentes con imagen, profesión y datos de charla |
| `schedule_items` | Eventos del cronograma con FK opcional a `speakers` |

---

## Testing

```bash
composer test
# o directamente:
php artisan test
php artisan test --filter NombreDelTest
php artisan test --coverage
```

---

## Despliegue en producción

```bash
composer install --no-dev --optimize-autoloader
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan migrate --force
php artisan storage:link
php artisan filament:assets
```
