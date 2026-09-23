# MEMORY.md - Decisiones Tomadas y Correcciones Críticas

## 1. Base de Datos y Modelos
- Base de datos: `mbfax` (tablas: `sorteos`, `participantes`, `ganadores`, `administradores`).
- Conexión: `Database::getConnection()` en `config/database.php` usando el patrón Singleton PDO.
- Corrección crítica en modelos: Jamás escribir `$this->db::prepare`. Siempre debe utilizarse la llamada de método de instancia `$this->db->prepare($sql)`.
- El modelo `Ganador.php` realiza la selección aleatoria imparcial con `ORDER BY RAND() LIMIT :cantidad`.

## 2. Controlador Admin
- `controllers/AdminController.php` debe ser la clase controladora del panel administrativo (manejando sesión, login, registro, creación de sorteos, carga masiva de participantes y ejecución del sorteador). No debe contener la clase `Database`.

## 3. Especificaciones Clave de Vistas
- **Sorteos:** Soporta sorteos normales por fecha y sorteos por meta de seguidores con barra de progreso, buscador en tiempo real de participantes por AJAX y tabla de ganadores históricos.
- **Guías META:** 
  - Personajes: Habilidades activas (cuándo usarlas y combos con pasivas) y pasivas, con filtro interactivo por roles (Corredor, Tirador, Francotirador, Soporte, Granadero) ordenados de mejor a peor con fotos.
  - Armas: Tres subsecciones (Largo alcance, Corto alcance y El Mejor Combo Largo+Corto+Pistola según rol en Solo, Dúo y Escuadra) con estadísticas de daño/cadencia/rango.
  - Mascotas: Clasificación de mejor a peor según utilidad táctica.
- **Herramientas:**
  - Generador de nicks con tamaños de letras (pequeñas/subíndice/superíndice), símbolos gamer y botón de espacio invisible Unicode `U+3164`.
  - Calculador de Antigüedad por ID estilo Free Fire Jornal: Avatar, nick con símbolos, nivel, likes, fecha exacta UTC, cálculo dinámico en años/meses/días, rangos (BR y DE) y catálogo en cuadrícula de skins equipadas.
- **Sobre Mí:** Integración de imágenes locales (`sur.png`, `ee.uu.png`, `clan.png`), meta de ser influencer y botones para copiar los IDs (Sur: `1600684379`, EE.UU.: `11124413315`, Clan: `2067063396`).