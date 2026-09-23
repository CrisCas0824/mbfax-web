# SKILL.md - Procedimiento Estándar de Generación y Modificación de Módulos

## Pasos de Ejecución para el Agente:
1. **Lectura previa:** Consultar obligatoriamente `AGENTS.md` y `MEMORY.md` antes de editar o escribir cualquier línea de código.
2. **Desarrollo de Modelos (`models/`):**
   - Importar `config/database.php`.
   - Inicializar `$this->db = Database::getConnection()`.
   - Utilizar sentencias preparadas PDO con `:placeholders` para cualquier valor dinámico.
   - Sanitizar cadenas con `htmlspecialchars()` o casting de enteros `(int)`.
3. **Desarrollo de Controladores (`controllers/`):**
   - Responder JSON cuando la solicitud sea AJAX (`header('Content-Type: application/json')`).
   - Manejar redirecciones `header('Location: ...')` y mensajes flash en `$_SESSION` para peticiones estándar.
4. **Desarrollo de Vistas (`views/`):**
   - Utilizar la paleta oficial: fondo `bg-slate-50`, tarjetas `bg-white border-slate-200`, acentos y botones en `bg-rose-600` / `hover:bg-rose-700` (`#E11D48`).
   - Mantener estructura responsiva para móviles con el menú hamburguesa.
5. **Comprobación de Integridad:**
   - Ejecutar en consola `php -l` sobre cada archivo PHP creado o modificado.