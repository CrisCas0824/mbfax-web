# AGENTS.md - Reglas y Convenciones del Proyecto MB FAX

## 1. Stack Técnico
- Backend: PHP 8+ nativo estructurado bajo el patrón estricto MVC (Model-View-Controller).
- Base de Datos: MySQL (`mbfax`) conectado vía PDO con consultas preparadas obligatorias (`$this->db->prepare`). Prohibido concatenar variables en consultas SQL.
- Frontend: HTML5 semántico, Tailwind CSS y Vanilla JavaScript interactivo.
- Compatibilidad: Servidor Apache local (XAMPP) y servidor PHP embebido (`php -S localhost:8000`).

## 2. Identidad Visual Obligatoria (Logo Oficial MB FAX)
- Color Primario (Acentos, botones principales, insignias y bordes activos): Rojo Carmín Neón `#E11D48` (Tailwind `rose-600` / `red-600`).
- Color Base / Fondo: Diseño Light Pro limpio (`bg-slate-50` / `#F8FAFC`). Tarjetas blancas puras (`bg-white`) con bordes tenues (`border-slate-200`) y sombras suaves (`shadow-xs` / `shadow-sm`).
- Textos y Títulos: Dark Charcoal `#0F172A` / `#1E293B` para alto contraste y legibilidad.
- Acentos Secundarios: Ámbar / Dorado `#D97706` / `#F59E0B` exclusivamente para copas de ganadores y diamantes.
- PROHIBICIÓN: Queda estrictamente prohibido usar fondos negros/oscuros apagados o paletas genéricas azules/celestes.

## 3. Restricciones de Arquitectura
- PROHIBIDO crear módulos, controladores, rutas o carpetas de videos. No existen recursos locales de video.
- Los recursos visuales estáticos obligatorios están en `imagenes/logo/` (perfil y portada) y en `imagenes/imagen de persona/` (`sur.png`, `ee.uu.png`, `clan.png`).
- Cada archivo PHP modificado o creado debe ser validado con `php -l` para verificar su sintaxis antes de dar la tarea por concluida.