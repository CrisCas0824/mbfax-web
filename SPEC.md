# ESPECIFICACIONES MAESTRAS: PLATAFORMA WEB MB FAX (FREE FIRE COMMUNITY & GUÍAS META)

## 1. STACK TÉCNICO Y ARQUITECTURA
- **Backend:** PHP 8+ estructurado bajo el patrón estricto MVC (Model-View-Controller).
- **Base de Datos:** MySQL conectada centralizadamente mediante PDO con sentencias preparadas obligatorias (`$this->db->prepare`) en todos los modelos.
- **Frontend:** HTML5 semántico, Tailwind CSS y Vanilla JavaScript interactivo.
- **Identidad Visual Oficial (Logo MB FAX):**
  - **Color Primario (Marca):** Rojo Carmín Neón (`#E11D48` / Tailwind `rose-600`) en botones, bordes activos, llamadas a la acción e insignias.
  - **Color Base / Fondo:** Diseño Light Pro Limpio (`bg-slate-50` / `#F8FAFC`). Tarjetas en blanco puro (`bg-white`) con bordes suaves (`border-slate-200`) y sombras sutiles.
  - **Títulos y Textos:** Dark Charcoal (`#0F172A`) para contraste y lectura profesional.
  - **Acento Secundario:** Ámbar / Dorado (`#D97706` / `amber-500`) para diamantes y copas de ganadores.
  - **PROHIBIDO:** Fondos oscuros/negros apagados, colores celestes genéricos, y crear módulos o carpetas de videos.

---

## 2. NAVEGACIÓN Y HEADER RESPONSIVO
- **Logo y Marca:** Avatar local `imagenes/logo/PERFIL FACEBOOK1.png` + texto "MB FAX - Free Fire Community".
- **Botones Directos a Redes:** Acceso visible a los canales oficiales de **YouTube** y **Facebook**.
- **Menú con Sublistas Desplegables (Dropdowns en PC y acordeones en Móvil):**
  - **Sorteos:** Sorteos Activos (`#activos`) | Ganadores (`#ganadores`).
  - **Guías META:** Personajes (`#personajes`) | Armas (`#armas`) | Mascotas (`#mascotas`).
  - **Herramientas:** Generador de Nicks (`#nicks`) | Calculador de Antigüedad por ID (`#antiguedad`) | Iconos y Símbolos (`#iconos`) | Espacio Invisible (`#espacio`).
  - **Sobre Mí:** Enlace directo a la sección del creador.
- **Botón de Panel Admin:** Acceso con candado para la gestión interna.

---

## 3. MÓDULO DE SORTEOS Y GANADORES
- **Tipos de Sorteos:** Pases Élite y Recargas de Diamantes.
- **Modalidades:**
  1. Sorteo por fecha límite.
  2. Sorteo por meta de seguidores (con barra de progreso visual: seguidores actuales vs. meta requerida en Facebook/YouTube).
- **Gestión de Participantes:**
  - Registro de participantes (Nick o ID de Free Fire, plataforma y fecha).
  - El administrador puede registrar participantes manualmente o en lista masiva.
  - Buscador público en tiempo real para que los usuarios verifiquen su registro.
- **Sorteador Transparente y Ganadores:**
  - Selector de cantidad de ganadores (1, 2, 3 o más).
  - Selección aleatoria en base de datos mediante `ORDER BY RAND()`.
  - Muro público de ganadores históricos con fecha, premio y comprobante de entrega.

---

## 4. GUÍAS META COMPLETAS (CON IMÁGENES Y ORDENAMIENTO DE MEJOR A PEOR)

### A. Personajes
- **Subsección Activos:** Habilidad activa, ventajas detalladas, **cuándo se debe utilizar exactamente en partida** (rush, soporte, zona) y combos recomendados con 3 pasivas.
- **Subsección Pasivas:** Mejores habilidades pasivas y sinergias óptimas.
- **Filtro Dinámico por Roles:**
  - Corredor (Rusher)
  - Tirador (Assault)
  - Francotirador (Sniper)
  - Soporte (Support)
  - Granadero (Bomber)
- **Ordenamiento:** De mejor a peor (Tier List S, A, B).

### B. Armas y Combos
- **Subsección Largo Alcance:**
  - Rifles de Asalto (AR)
  - Rifles de Tirador (Marksman Rifles)
  - Ametralladoras (LMG)
  - Rifles de Francotirador (Sniper)
- **Subsección Corto Alcance:**
  - Subfusiles (SMG)
  - Escopetas (Shotguns)
  - Pistolas secundarias
- **Subsección El Mejor Combo:**
  - Combinación recomendada (Largo Alcance + Corto Alcance + Pistola) según el modo:
    - **Solo** | **Dúo** | **Escuadra** (según el rol).
- **Estadísticas:** Daño, cadencia, rango y velocidad de recarga, ordenadas de mejor a peor con imagen.

### C. Mascotas
- Clasificación de la mejor a la peor mascota según el meta competitivo.
- Descripción de habilidad táctica y en qué situaciones otorga ventaja (paredes gloo, recarga, granadas, etc.).

---

## 5. HERRAMIENTAS VIRALES

### A. Generador de Nicks Insanos Avanzado
- Campo de texto para ingresar cualquier nombre.
- **Ajuste de Tamaño de Letras:** Opciones en tamaño pequeño (subíndice/superíndice: ˢᵃᵐᵘʳᵃᶦ), fuentes gruesas insanas y decoraciones.
- **Colección de Iconos y Símbolos:** Rayos (`⚡`), coronas (`👑`), cruces (`†`), paraguas (`☂️`), alas (`꧁꧂`), letras orientales (`亗`) Y MAS con botón de copiar al toque.
- **Espacio en Blanco Invisible:** Botón rápido para copiar el carácter Unicode invisible `U+3164` (compatible con Free Fire).

### B. Calculador de Antigüedad por ID (Ficha Técnica estilo Free Fire Jornal)
- Buscador numérico por ID.
- **Tarjeta de Identidad:** Avatar del jugador, Nick estilizado con símbolos, ID, Región, Nivel y Likes.
- **Recuadro Oficial de Antigüedad:** Muestra la fecha exacta de creación en formato UTC (`11 de noviembre de 2019, 16:13:45 UTC`) y la antigüedad calculada dinámicamente en: **Años, Meses y Días**.
- **Rangos Actuales y Máximos:** Tarjetas divididas de Battle Royale (Heroico Élite / puntos) y Duelo de Escuadras (Maestro / estrellas).
- **Skins y Objetos Equipados:** Catálogo en cuadrícula con Avatar, Fondo/Banner, Pin, Ropa/Camisetas (Guerrero Inca, etc.), Pantalón y Mochila.

---

## 6. SECCIÓN "SOBRE MÍ" (STREAMER MB FAX)
- **Cabecera Oficial:** Portada `imagenes/logo/FONDO FACEBOOK1.jpg` y avatar `imagenes/logo/PERFIL FACEBOOK1.png`.
- **Meta del Creador:** Mensaje cercano y motivacional sobre el camino a ser influencer oficial de Garena y el compromiso de premiar a la comunidad con sorteos reales y transparentes.
- **Enlaces Oficiales:** Botones de seguimiento a Facebook (@MBFAX) y YouTube.
- **Cuentas del Streamer (con botón interactivo "Copiar ID"):**
  - **Región Sudamérica (Principal):** Imagen `imagenes/imagen de persona/sur.png` e ID `1574697371`.
  - **Región Estados Unidos (Secundaria):** Imagen `imagenes/imagen de persona/ee.uu.png` e ID `2987114672`.
  - **Clan Oficial MB FAX:** Imagen `imagenes/imagen de persona/clan.png` e ID de Clan extraído de `id de mi persona.txt`.