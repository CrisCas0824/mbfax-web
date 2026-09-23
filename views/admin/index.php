<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- HEADER ADMIN MB FAX LIGHT PRO GAMER -->
<section class="bg-white border-b border-slate-200 py-7">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col md:flex-row items-center justify-between gap-3">
        <div>
            <h1 class="font-brand text-xl font-bold text-slate-900 flex items-center gap-2">
                ⚙️ Panel Admin MB FAX
            </h1>
            <p class="text-xs text-slate-500">Gestión de sorteos, participantes masivos y selección aleatoria transparente</p>
        </div>

        <?php if ($isLoggedIn): ?>
            <div class="flex items-center gap-3">
                <span class="text-xs text-slate-600">Conectado como: <strong class="text-rose-600 font-bold"><?= htmlspecialchars($_SESSION['admin_nombre'] ?? 'Admin', ENT_QUOTES, 'UTF-8') ?></strong></span>
                <a href="index.php?action=admin_logout" class="px-3 py-1 bg-red-50 hover:bg-red-100 text-red-700 border border-red-200 rounded-lg text-xs font-bold transition">
                    Cerrar Sesión
                </a>
            </div>
        <?php endif; ?>
    </div>
</section>

<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-10">

    <!-- MENSAJES FLASH -->
    <?php if (!empty($mensaje)): ?>
        <div class="p-3.5 rounded-xl border text-xs font-semibold flex items-center justify-between <?= $tipoMensaje === 'success' ? 'bg-emerald-50 border-emerald-200 text-emerald-800' : 'bg-red-50 border-red-200 text-red-800' ?>">
            <span><?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?></span>
        </div>
    <?php endif; ?>

    <?php if (!$isLoggedIn): ?>
        <?php if (!empty($isBlocked) && $isBlocked): ?>
            <!-- CONTENEDOR DISPOSITIVO BLOQUEADO -->
            <div class="max-w-md mx-auto bg-white border border-red-200 p-7 rounded-2xl shadow-xs space-y-5">
                <div class="text-center space-y-2">
                    <div class="w-16 h-16 bg-red-100 text-red-600 rounded-full flex items-center justify-center mx-auto mb-2">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                    </div>
                    <h2 class="font-brand font-bold text-xl text-red-700">Dispositivo Bloqueado</h2>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Por seguridad, este dispositivo ha sido bloqueado tras múltiples intentos fallidos. Si eres el administrador, solicita un código de desbloqueo a tu correo oficial.
                    </p>
                </div>

                <!-- Paso 1: Enviar Código -->
                <form action="index.php?action=admin_send_unlock" method="POST" class="pt-2">
                    <button type="submit" class="w-full py-3 bg-red-600 hover:bg-red-700 text-white font-brand font-bold rounded-xl text-xs uppercase tracking-wider transition shadow-xs flex items-center justify-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                        Enviar Código a mi Correo
                    </button>
                </form>

                <div class="relative border-t border-slate-200 mt-6 mb-4">
                    <span class="absolute left-1/2 -translate-x-1/2 -translate-y-1/2 bg-white px-3 text-[10px] font-bold text-slate-400 uppercase">O si ya tienes el código</span>
                </div>

                <!-- Paso 2: Verificar Código -->
                <form action="index.php?action=admin_verify_unlock" method="POST" class="space-y-3.5">
                    <div>
                        <input type="text" name="unlock_code" required placeholder="Ingresa el código de 6 dígitos" pattern="[0-9]{6}" maxlength="6"
                               class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-center text-lg font-mono font-bold tracking-[0.5em] text-slate-800 focus:outline-none focus:border-red-600 focus:bg-white transition shadow-xs">
                    </div>
                    <button type="submit" class="w-full py-2.5 bg-slate-800 hover:bg-slate-900 text-white font-brand font-bold rounded-xl text-xs uppercase tracking-wider transition shadow-xs">
                        Verificar y Desbloquear
                    </button>
                </form>
            </div>
        <?php else: ?>
            
            <!-- CONTENEDOR LOGIN/REGISTRO ADMIN -->
            <div class="max-w-md mx-auto bg-white border border-slate-200 p-7 rounded-2xl shadow-xs space-y-5">
                
                <?php if (!empty($hasAdmin)): ?>
                    <!-- ENCABEZADO DE LOGIN -->
                    <div class="border-b border-slate-200 pb-2.5 mb-4 text-center">
                        <span class="font-brand font-bold text-xs text-rose-700">
                            🔑 Panel de Acceso
                        </span>
                    </div>

                    <!-- FORMULARIO DE LOGIN -->
                    <div id="form-login" class="space-y-4">
                        <div class="text-center space-y-1">
                            <h2 class="font-brand font-bold text-base text-slate-900">Iniciar Sesión Admin</h2>
                            <p class="text-xs text-slate-500">Ingresa tus credenciales para administrar el hub MB FAX.</p>
                        </div>

                        <form action="index.php?action=admin_login" method="POST" class="space-y-3.5">
                            <div>
                                <label for="login_username" class="block text-xs font-bold text-slate-700 uppercase mb-1">Usuario Admin:</label>
                                <input type="text" id="login_username" name="username" required placeholder="admin" 
                                       class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white transition shadow-xs">
                            </div>

                            <div>
                                <label for="login_password" class="block text-xs font-bold text-slate-700 uppercase mb-1">Contraseña:</label>
                                <input type="password" id="login_password" name="password" required placeholder="••••••••" 
                                       class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white transition shadow-xs">
                            </div>

                            <button type="submit" class="w-full py-2.5 bg-rose-600 hover:bg-rose-700 text-white font-brand font-bold rounded-xl text-xs uppercase tracking-wider transition shadow-xs">
                                Acceder al Panel
                            </button>
                        </form>
                        <p class="text-center text-xs text-rose-600 pt-1 font-bold">
                            🔒 Panel reservado solo para el administrador MB FAX.
                        </p>
                    </div>
                <?php else: ?>
                    <!-- ENCABEZADO DE REGISTRO -->
                    <div class="border-b border-slate-200 pb-2.5 mb-4 text-center">
                        <span class="font-brand font-bold text-xs text-emerald-700">
                            📝 Configuración Inicial
                        </span>
                    </div>

                    <!-- FORMULARIO DE REGISTRO -->
                    <div id="form-register" class="space-y-4">
                        <div class="text-center space-y-1">
                            <h2 class="font-brand font-bold text-base text-slate-900">Registro de Administrador</h2>
                            <p class="text-xs text-slate-500">No hay administradores. Registra tu cuenta principal ahora.</p>
                        </div>

                        <form action="index.php?action=admin_register" method="POST" class="space-y-3.5">
                            <div>
                                <label for="reg_nombre" class="block text-xs font-bold text-slate-700 uppercase mb-1">Nombre Completo o Nick:</label>
                                <input type="text" id="reg_nombre" name="nombre" placeholder="Ej: Streamer MB FAX" 
                                       class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600 focus:bg-white transition shadow-xs">
                            </div>

                            <div>
                                <label for="reg_username" class="block text-xs font-bold text-slate-700 uppercase mb-1">Usuario Admin:</label>
                                <input type="text" id="reg_username" name="username" required placeholder="Ej: admin_mbfax" 
                                       class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600 focus:bg-white transition shadow-xs">
                            </div>

                            <div>
                                <label for="reg_password" class="block text-xs font-bold text-slate-700 uppercase mb-1">Contraseña:</label>
                                <input type="password" id="reg_password" name="password" required placeholder="••••••••" 
                                       class="w-full bg-slate-50 border border-slate-300 rounded-xl px-3.5 py-2 text-xs text-slate-800 focus:outline-none focus:border-emerald-600 focus:bg-white transition shadow-xs">
                            </div>

                            <button type="submit" class="w-full py-2.5 bg-emerald-600 hover:bg-emerald-700 text-white font-brand font-bold rounded-xl text-xs uppercase tracking-wider transition shadow-xs">
                                Crear Cuenta Admin Principal
                            </button>
                        </form>
                    </div>
                <?php endif; ?>
            </div>    <?php else: ?>

        <!-- DASHBOARD ADMIN MB FAX -->
        <!-- ESTADÍSTICAS GLOBALES -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-6">
            <div class="bg-white border border-slate-200 p-4 rounded-2xl shadow-xs text-center">
                <span class="text-slate-400 font-bold text-[10px] uppercase block mb-1">Visitas Históricas</span>
                <span class="font-brand font-black text-2xl text-blue-600"><?= number_format($visitasTotales ?? 0) ?></span>
            </div>
            <div class="bg-white border border-slate-200 p-4 rounded-2xl shadow-xs text-center">
                <span class="text-slate-400 font-bold text-[10px] uppercase block mb-1">Visitas Hoy</span>
                <span class="font-brand font-black text-2xl text-emerald-600"><?= number_format($visitasHoy ?? 0) ?></span>
            </div>
            <div class="bg-white border border-slate-200 p-4 rounded-2xl shadow-xs text-center">
                <span class="text-slate-400 font-bold text-[10px] uppercase block mb-1">Total Sorteos</span>
                <span class="font-brand font-black text-2xl text-rose-600"><?= count($sorteos) ?></span>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            
            <!-- 1. CREAR NUEVO SORTEO -->
            <div class="bg-white border border-slate-200 p-6 rounded-2xl space-y-4 shadow-xs">
                <h3 class="font-brand font-bold text-base text-slate-900 border-b border-slate-200 pb-2.5">
                    ➕ Crear Nuevo Sorteo MB FAX
                </h3>

                <form action="index.php?action=admin_crear_sorteo" method="POST" class="space-y-3 text-xs">
                    <div>
                        <label for="titulo" class="block font-bold text-slate-700 mb-1">Título del Sorteo:</label>
                        <input type="text" id="titulo" name="titulo" required placeholder="Ej: Sorteo 1,060 Diamantes MB FAX" 
                               class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="premio" class="block font-bold text-slate-700 mb-1">Premio:</label>
                            <input type="text" id="premio" name="premio" required placeholder="Ej: Pase Booyah Premium" 
                                   class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                        </div>
                        <div>
                            <label for="tipo_premio" class="block font-bold text-slate-700 mb-1">Tipo de Premio:</label>
                            <select id="tipo_premio" name="tipo_premio" class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                                <option value="diamantes">Diamantes</option>
                                <option value="pase">Pase Élite / Booyah</option>
                                <option value="especial">Especial</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-3">
                        <div>
                            <label for="red_social_objetivo" class="block font-bold text-slate-700 mb-1">Plataforma Objetivo:</label>
                            <select id="red_social_objetivo" name="red_social_objetivo" class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                                <option value="ambos">Ambos (FB & YT)</option>
                                <option value="facebook">Facebook</option>
                                <option value="youtube">YouTube</option>
                            </select>
                        </div>
                        <div>
                            <label for="tipo_requisito" class="block font-bold text-slate-700 mb-1">Tipo de Requisito:</label>
                            <select id="tipo_requisito" name="tipo_requisito" onchange="toggleRequisitos()" class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                                <option value="seguidores">Llegar a Meta (Subs/Seguidores)</option>
                                <option value="likes">Llegar a Meta de Likes en Video</option>
                                <option value="comentarios">Comentar un Video/Post</option>
                            </select>
                        </div>
                    </div>

                    <div id="contenedor_url_objetivo" class="hidden">
                        <label for="url_objetivo" class="block font-bold text-slate-700 mb-1">URL de la Publicación / Video:</label>
                        <input type="url" id="url_objetivo" name="url_objetivo" placeholder="Ej: https://youtube.com/watch?v=..." 
                               class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                    </div>

                    <div class="grid grid-cols-3 gap-3">
                        <div>
                            <label for="total_ganadores" class="block font-bold text-slate-700 mb-1">N° Ganadores:</label>
                            <input type="number" id="total_ganadores" name="total_ganadores" value="1" min="1" 
                                   class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                        </div>
                        <div>
                            <label id="label_meta_requisito" for="meta_requisito" class="block font-bold text-slate-700 mb-1">Meta a Alcanzar:</label>
                            <input type="number" id="meta_requisito" name="meta_requisito" value="0" 
                                   class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                        </div>
                        <div>
                            <label id="label_progreso_requisito" for="progreso_requisito" class="block font-bold text-slate-700 mb-1">Progreso Actual:</label>
                            <input type="number" id="progreso_requisito" name="progreso_requisito" value="0" 
                                   class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                        </div>
                    </div>

                    <div>
                        <label for="descripcion" class="block font-bold text-slate-700 mb-1">Descripción corta:</label>
                        <textarea id="descripcion" name="descripcion" rows="2" placeholder="Detalles del sorteo..." 
                                  class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white"></textarea>
                    </div>

                    <button type="submit" class="w-full py-2 bg-rose-600 hover:bg-rose-700 text-white font-brand font-bold rounded-lg text-xs uppercase tracking-wider transition shadow-xs">
                        Guardar y Activar Sorteo
                    </button>
                </form>
            </div>

            <!-- 2. CARGA MASIVA DE PARTICIPANTES -->
            <div class="bg-white border border-slate-200 p-6 rounded-2xl space-y-4 shadow-xs">
                <h3 class="font-brand font-bold text-base text-slate-900 border-b border-slate-200 pb-2.5">
                    📥 Carga Masiva de IDs / Nicks
                </h3>

                <form action="index.php?action=admin_carga_masiva" method="POST" class="space-y-3 text-xs">
                    <div>
                        <label for="sorteo_id_masivo" class="block font-bold text-slate-700 mb-1">Selecciona el Sorteo:</label>
                        <select id="sorteo_id_masivo" name="sorteo_id" required class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white">
                            <option value="">-- Selecciona un sorteo --</option>
                            <?php foreach ($sorteos as $s): ?>
                                <option value="<?= (int)$s['id'] ?>"><?= htmlspecialchars($s['titulo'], ENT_QUOTES, 'UTF-8') ?> (ID: <?= $s['id'] ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <label for="lista_nicks" class="block font-bold text-slate-700 mb-1">Pega la Lista (Formato: ID, Usuario, Plataforma):</label>
                        <textarea id="lista_nicks" name="lista_nicks" rows="4" required placeholder="1600684379, JuanGamer123, facebook&#10;11124413315, MariaFF, ambos&#10;2067063396, PedroPro, youtube" 
                                  class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 font-mono focus:outline-none focus:border-rose-600 focus:bg-white"></textarea>
                    </div>

                    <button type="submit" class="w-full py-2 bg-amber-600 hover:bg-amber-700 text-white font-brand font-bold rounded-lg text-xs uppercase tracking-wider transition shadow-xs">
                        Insertar Participantes en MySQL
                    </button>
                </form>
            </div>

        </div>

        <!-- 3. SELECCIÓN ALEATORIA TRANSPARENTE DE GANADORES -->
        <div class="bg-white border border-slate-200 p-6 rounded-2xl space-y-4 shadow-xs">
            <h3 class="font-brand font-bold text-base text-slate-900 border-b border-slate-200 pb-2.5 flex items-center gap-2">
                🎲 Ejecutar Sorteo Aleatorio Transparente
            </h3>

            <form action="index.php?action=admin_sortear" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4 text-xs items-end">
                <div>
                    <label for="sorteo_id_sortear" class="block font-bold text-slate-700 mb-1">Sorteo a Finalizar:</label>
                    <select id="sorteo_id_sortear" name="sorteo_id" required class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-red-600 focus:bg-white">
                        <option value="">-- Selecciona sorteo activo --</option>
                        <?php foreach ($sorteos as $s): if ($s['estado'] === 'activo'): ?>
                            <option value="<?= (int)$s['id'] ?>"><?= htmlspecialchars($s['titulo'], ENT_QUOTES, 'UTF-8') ?> (<?= $s['total_participantes'] ?> inscritos)</option>
                        <?php endif; endforeach; ?>
                    </select>
                </div>

                <div>
                    <label for="cantidad_ganadores" class="block font-bold text-slate-700 mb-1">Cantidad de Ganadores a Elegir:</label>
                    <input type="number" id="cantidad_ganadores" name="cantidad_ganadores" value="1" min="1" required 
                           class="w-full bg-slate-50 border border-slate-300 rounded-lg px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-red-600 focus:bg-white">
                </div>

                <div>
                    <button type="submit" onclick="return confirm('¿Estás seguro de ejecutar la selección aleatoria de ganadores?')" class="w-full py-2 bg-red-600 hover:bg-red-700 text-white font-brand font-bold rounded-lg text-xs uppercase tracking-wider transition shadow-xs">
                        💥 Realizar Sorteo Transparente
                    </button>
                </div>
            </form>
        </div>

    <?php endif; ?>

</section>

<script>
function toggleRequisitos() {
    const tipo = document.getElementById('tipo_requisito').value;
    const urlContainer = document.getElementById('contenedor_url_objetivo');
    const labelMeta = document.getElementById('label_meta_requisito');
    const labelProgreso = document.getElementById('label_progreso_requisito');

    if (tipo === 'seguidores') {
        urlContainer.classList.add('hidden');
        labelMeta.innerText = 'Meta Seguidores:';
        labelProgreso.innerText = 'Seguidores Act.:';
    } else if (tipo === 'likes') {
        urlContainer.classList.remove('hidden');
        labelMeta.innerText = 'Meta de Likes:';
        labelProgreso.innerText = 'Likes Actuales:';
    } else if (tipo === 'comentarios') {
        urlContainer.classList.remove('hidden');
        labelMeta.innerText = 'Meta Comentarios:';
        labelProgreso.innerText = 'Comentarios Act.:';
    }
}
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
