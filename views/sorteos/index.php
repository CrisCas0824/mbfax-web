<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- HEADER SECCIÓN SORTEOS MB FAX LIGHT PRO GAMER -->
<section class="bg-white border-b border-slate-200 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="px-3.5 py-1 rounded-full bg-blue-50 border border-blue-200 text-blue-800 text-xs font-bold uppercase shadow-xs">
            Sorteos Oficiales 100% Transparentes
        </span>
        <h1 class="font-brand text-3xl sm:text-4xl font-extrabold text-slate-900">
            SORTEOS DE <span class="text-blue-600">DIAMANTES & PASES ÉLITE</span>
        </h1>
        <p class="text-slate-600 text-sm max-w-xl mx-auto">
            Participa en los sorteos oficiales de MB FAX. Registra tu ID o Nick de juego sin contraseñas ni datos sensibles.
        </p>

        <!-- BUSCADOR EN TIEMPO REAL -->
        <div class="max-w-md mx-auto pt-3 relative">
            <label for="searchParticipantInput" class="sr-only">Buscar si mi ID está participando</label>
            <div class="relative">
                <input type="text" id="searchParticipantInput" placeholder="🔍 Ingresa tu ID o Nick para verificar tu registro..." 
                       class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-sm text-slate-800 focus:outline-none focus:border-rose-600 focus:bg-white transition shadow-xs">
            </div>
            <!-- CONTENEDOR DE RESULTADOS DE BÚSQUEDA AJAX -->
            <div id="searchResultsContainer" class="hidden absolute top-full left-0 right-0 mt-2 bg-white border border-slate-200 rounded-xl shadow-lg z-50 text-left overflow-hidden"></div>
        </div>

        <!-- ESTADÍSTICAS DE SORTEOS -->
        <div class="pt-8">
            <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                <div data-aos="fade-up" class="bg-white border border-slate-200 p-5 rounded-xl text-center shadow-sm hover:shadow-md transition">
                    <div class="font-brand font-black text-3xl text-rose-600 mb-1">0</div>
                    <div class="font-bold text-slate-800 text-[11px] uppercase tracking-wide">Sorteos Realizados</div>
                    <div class="text-[10px] text-slate-500 mt-1">Eventos culminados con éxito</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="100" class="bg-white border border-slate-200 p-5 rounded-xl text-center shadow-sm hover:shadow-md transition">
                    <div class="font-brand font-black text-3xl text-rose-600 mb-1">0</div>
                    <div class="font-bold text-slate-800 text-[11px] uppercase tracking-wide">Veces se regaló diamantes</div>
                    <div class="text-[10px] text-slate-500 mt-1">Acreditados de forma directa</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="200" class="bg-white border border-slate-200 p-5 rounded-xl text-center shadow-sm hover:shadow-md transition">
                    <div class="font-brand font-black text-3xl text-rose-600 mb-1">0</div>
                    <div class="font-bold text-slate-800 text-[11px] uppercase tracking-wide">Pases Regalados</div>
                    <div class="text-[10px] text-slate-500 mt-1">Beneficios premium entregados</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="300" class="bg-white border border-slate-200 p-5 rounded-xl text-center shadow-sm hover:shadow-md transition">
                    <div class="font-brand font-black text-3xl text-rose-600 mb-1">0</div>
                    <div class="font-bold text-slate-800 text-[11px] uppercase tracking-wide">Especiales Regalados</div>
                    <div class="text-[10px] text-slate-500 mt-1">Premios únicos y limitados</div>
                </div>
                <div data-aos="fade-up" data-aos-delay="400" class="bg-white border border-slate-200 p-5 rounded-xl text-center shadow-sm hover:shadow-md transition col-span-2 md:col-span-1">
                    <div class="font-brand font-black text-3xl text-rose-600 mb-1">0</div>
                    <div class="font-bold text-slate-800 text-[11px] uppercase tracking-wide">Participantes Totales</div>
                    <div class="text-[10px] text-slate-500 mt-1">Comunidad activa acumulada</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- LISTA DE SORTEOS ACTIVOS -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-14">

    <!-- MENSAJES FLASH DE NOTIFICACIÓN -->
    <?php if (!empty($mensaje)): ?>
        <div class="p-4 rounded-xl border text-sm font-semibold flex items-center justify-between <?= $tipoMensaje === 'success' ? 'bg-emerald-50 border-emerald-200 text-emerald-800' : 'bg-red-50 border-red-200 text-red-800' ?>">
            <span><?= htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8') ?></span>
        </div>
    <?php endif; ?>

    <div id="activos" class="scroll-mt-24">
        <h2 class="font-brand text-2xl font-bold text-slate-900 mb-6 flex items-center gap-2">
            <svg class="w-6 h-6 text-blue-900" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
            </svg>
            Sorteos Activos Ahora
        </h2>

        <?php if (empty($sorteosActivos)): ?>
            <div class="bg-white border border-slate-200 rounded-2xl p-8 text-center text-slate-600 shadow-xs">
                <p>No hay sorteos activos en este momento. ¡Suscríbete a nuestras redes para no perderte el próximo!</p>
            </div>
        <?php else: ?>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php foreach ($sorteosActivos as $sorteo): ?>
                    <div data-aos="fade-up" class="bg-white border border-slate-200 rounded-2xl overflow-hidden hover:border-blue-400 shadow-xs transition flex flex-col justify-between">
                        <div class="p-6 space-y-4">
                            
                            <div class="flex items-start justify-between gap-4">
                                <div>
                                    <span class="px-2.5 py-0.5 rounded text-[11px] font-bold uppercase <?= $sorteo['tipo_premio'] === 'pase' ? 'bg-purple-50 text-purple-700 border border-purple-200' : 'bg-blue-50 text-blue-800 border border-blue-200' ?>">
                                        <?= htmlspecialchars($sorteo['tipo_premio'], ENT_QUOTES, 'UTF-8') ?>
                                    </span>
                                    <h3 class="font-brand font-bold text-lg text-slate-900 mt-1.5">
                                        <?= htmlspecialchars($sorteo['titulo'], ENT_QUOTES, 'UTF-8') ?>
                                    </h3>
                                </div>
                                <div class="text-right">
                                    <span class="text-[11px] text-slate-500 block font-bold">Ganadores</span>
                                    <span class="font-brand font-extrabold text-rose-600 text-base"><?= (int)$sorteo['total_ganadores'] ?></span>
                                </div>
                            </div>

                            <p class="text-xs text-slate-600 leading-relaxed">
                                <?= htmlspecialchars($sorteo['descripcion'] ?? 'Participa por tu premio.', ENT_QUOTES, 'UTF-8') ?>
                            </p>

                                <!-- DETALLES DE PREMIO Y PROGRESO -->
                            <div class="bg-slate-50 p-3.5 rounded-xl space-y-2.5 border border-slate-200">
                                <div class="flex justify-between items-center text-xs">
                                    <span class="text-slate-500 font-bold">Premio:</span>
                                    <span class="font-bold text-blue-600 text-xs"><?= htmlspecialchars($sorteo['premio'], ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                                <?php if ($sorteo['meta_seguidores'] > 0): 
                                    $porcentaje = min(100, round(($sorteo['seguidores_actuales'] / $sorteo['meta_seguidores']) * 100));
                                ?>
                                    <div class="space-y-1">
                                        <div class="flex justify-between text-[11px] text-slate-500">
                                            <span>Meta de Seguidores:</span>
                                            <span class="font-mono text-slate-800 font-semibold"><?= number_format($sorteo['seguidores_actuales']) ?> / <?= number_format($sorteo['meta_seguidores']) ?> (<?= $porcentaje ?>%)</span>
                                        </div>
                                        <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden">
                                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 h-full rounded-full transition-all duration-300" style="width: <?= $porcentaje ?>%"></div>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <div class="flex justify-between items-center text-[11px] text-slate-500 pt-1 border-t border-slate-200">
                                    <span>Inscritos actuales:</span>
                                    <span class="font-bold text-slate-800 font-mono"><?= number_format($sorteo['total_participantes']) ?> Jugadores</span>
                                </div>
                            </div>

                        </div>

                        <!-- FORMULARIO DE INSCRIPCIÓN -->
                        <div class="p-5 bg-slate-50 border-t border-slate-200">
                            <form action="index.php?action=registrar_participante" method="POST" class="space-y-3">
                                <input type="hidden" name="sorteo_id" value="<?= (int)$sorteo['id'] ?>">
                                
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                    <!-- Nombre de Usuario -->
                                    <div>
                                        <label for="nombre_usuario_<?= (int)$sorteo['id'] ?>" class="block text-[11px] font-bold text-slate-600 uppercase mb-1">Nombre de Usuario:</label>
                                        <input type="text" id="nombre_usuario_<?= (int)$sorteo['id'] ?>" name="nombre_usuario" required placeholder="Ej: JuanGamer123" 
                                               class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-blue-500 transition shadow-xs">
                                    </div>
                                    
                                    <!-- ID Juego -->
                                    <div>
                                        <label for="id_juego_<?= (int)$sorteo['id'] ?>" class="block text-[11px] font-bold text-slate-600 uppercase mb-1">ID de Free Fire:</label>
                                        <input type="text" id="id_juego_<?= (int)$sorteo['id'] ?>" name="id_juego" required placeholder="Ej: 1600684379" 
                                               class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-blue-500 transition shadow-xs">
                                    </div>
                                </div>

                                <div class="flex flex-col sm:flex-row gap-3 items-end">
                                    <!-- Red Social -->
                                    <div class="flex-1 w-full">
                                        <label for="plataforma_<?= (int)$sorteo['id'] ?>" class="block text-[11px] font-bold text-slate-600 uppercase mb-1">¿Desde dónde participas?</label>
                                        <select id="plataforma_<?= (int)$sorteo['id'] ?>" name="plataforma" class="w-full bg-white border border-slate-300 rounded-xl px-3 py-2 text-xs text-slate-800 focus:outline-none focus:border-blue-500 transition shadow-xs">
                                            <option value="web">Web de MB FAX</option>
                                            <option value="facebook">Página de Facebook</option>
                                            <option value="youtube">Canal de YouTube</option>
                                            <option value="ambos">Ambas Redes (FB & YT)</option>
                                        </select>
                                    </div>
                                    
                                    <button type="submit" class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-brand font-bold px-6 py-2 rounded-xl text-xs uppercase tracking-wider transition shadow-xs">
                                        Participar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- SECCIÓN DE GANADORES ANTERIORES EN TARJETAS CON IMAGEN -->
    <div id="ganadores" class="scroll-mt-24 space-y-6">
        
        <!-- ENCABEZADO DE SECCIÓN -->
        <div>
            <h2 class="font-brand text-2xl font-bold text-slate-900 flex items-center gap-2.5">
                    <svg class="w-8 h-8 text-blue-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
 
                <span>Ganadores Registrados</span>
            </h2>
            <p class="text-sm text-slate-500 mt-1 max-w-2xl">
                Transparencia total en cada entrega. Registros oficiales de premios acreditados directamente al ID del jugador con sus respectivos comprobantes.
            </p>
        </div>

        <?php if (empty($ganadoresRecientes)): ?>
            <div class="bg-white border border-slate-200/80 rounded-2xl p-8 text-center text-slate-500 text-xs shadow-xs">
                <svg class="w-8 h-8 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                </svg>
                Aún no hay registros de ganadores anteriores. ¡Sé el primero en el próximo sorteo!
            </div>
        <?php else: ?>
            <!-- CUADRÍCULA DE TARJETAS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
                <?php foreach ($ganadoresRecientes as $g): 
                    // Resolución de fecha para evitar el Warning de PHP
                    $rawDate = $g['fecha_seleccion'] ?? $g['created_at'] ?? $g['fecha'] ?? null;
                    $formattedDate = $rawDate ? date('d/m/Y - H:i', strtotime($rawDate)) : 'Entrega Reciente';
                    
                    // Imagen de comprobante o banner por defecto de MB FAX
                    $imgPreview = !empty($g['comprobante_url']) ? $g['comprobante_url'] : 'imagenes/logo/FONDO FACEBOOK1.jpg';
                ?>
                    <div data-aos="fade-up" class="bg-white border border-slate-200/80 rounded-3xl overflow-hidden shadow-xs hover:shadow-md hover:border-slate-300 transition-all duration-300 flex flex-col justify-between group">
                        
                        <div>
                            <!-- 1. IMAGEN PRINCIPAL EN LA CABECERA DE LA TARJETA -->
                            <div class="relative h-44 w-full bg-slate-900 overflow-hidden">
                                <img src="<?= htmlspecialchars($imgPreview, ENT_QUOTES, 'UTF-8') ?>" 
                                    alt="Comprobante MB FAX" 
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500 ease-out">
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-950/80 via-transparent to-black/20"></div>

                                <!-- Insignia Verificado Flotante -->
                                <div class="absolute top-3 left-3">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/95 backdrop-blur-sm text-white text-[11px] font-bold shadow-sm">
                                        <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Verificado
                                    </span>
                                </div>

                                <!-- Fecha Flotante -->
                                <div class="absolute top-3 right-3">
                                    <span class="px-2.5 py-1 rounded-lg bg-black/60 backdrop-blur-md text-white/90 text-[11px] font-mono">
                                        <?= htmlspecialchars($formattedDate, ENT_QUOTES, 'UTF-8') ?>
                                    </span>
                                </div>

                                <!-- Premio Destacado sobre la Imagen -->
                                <div class="absolute bottom-3 left-3 right-3 flex items-center justify-between">
                                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-xl bg-amber-500 text-slate-950 font-brand font-black text-xs uppercase tracking-wider shadow-sm">
                                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24">
                                            <path d="M6 3h12l4 6-10 12L2 9l4-6zm1.5 2L4.5 8h3.15l1.2-3H7.5zm3.85 0l-1.2 3h3.7l-1.2-3h-1.3zm2.65 0l1.2 3h3.15l-3-3h-1.35zM4.1 9.5l7.9 9.5 7.9-9.5H4.1z"/>
                                        </svg>
                                        <?= htmlspecialchars($g['premio'] ?? 'Premio Especial', ENT_QUOTES, 'UTF-8') ?>
                                    </span>
                                </div>
                            </div>

                            <!-- 2. CUERPO DE LA TARJETA -->
                            <div class="p-5 space-y-4">
                                <div>
                                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400 block mb-0.5">Sorteo</span>
                                    <h3 class="font-brand font-bold text-slate-900 text-base line-clamp-1 group-hover:text-rose-600 transition-colors">
                                        <?= htmlspecialchars($g['sorteo_titulo'] ?? 'Sorteo Oficial MB FAX', ENT_QUOTES, 'UTF-8') ?>
                                    </h3>
                                </div>

                                <!-- Caja del Ganador (Usuario + ID + Red Social) -->
                                <div class="p-3.5 bg-slate-50 rounded-2xl border border-slate-200/80 space-y-2.5">
                                    
                                    <div class="flex items-center justify-between gap-2">
                                        <div class="flex-1 min-w-0">
                                            <span class="text-[10px] font-bold uppercase text-slate-400 block">Usuario</span>
                                            <span class="font-bold text-sm text-slate-800 line-clamp-1">
                                                <?= htmlspecialchars($g['nombre_usuario'] ?? 'Usuario Registrado', ENT_QUOTES, 'UTF-8') ?>
                                            </span>
                                        </div>
                                        
                                        <!-- Badge de Red Social -->
                                        <?php 
                                            $plataforma = $g['plataforma'] ?? 'web';
                                            $platColor = 'bg-slate-100 text-slate-600 border-slate-200';
                                            $platIcon = '<path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9"/>';
                                            
                                            if ($plataforma === 'facebook') {
                                                $platColor = 'bg-[#1877F2]/10 text-[#1877F2] border-[#1877F2]/20';
                                                $platIcon = '<path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>';
                                            } else if ($plataforma === 'youtube') {
                                                $platColor = 'bg-red-600/10 text-red-600 border-red-600/20';
                                                $platIcon = '<path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>';
                                            } else if ($plataforma === 'ambos') {
                                                $platColor = 'bg-fuchsia-600/10 text-fuchsia-600 border-fuchsia-600/20';
                                                $platIcon = '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />';
                                            }
                                        ?>
                                        <div class="px-2 py-1 rounded border <?= $platColor ?> flex items-center gap-1" title="Participó desde <?= ucfirst($plataforma) ?>">
                                            <svg class="w-3.5 h-3.5 fill-current <?= $plataforma === 'web' ? 'stroke-current fill-none' : '' ?>" viewBox="0 0 24 24">
                                                <?= $platIcon ?>
                                            </svg>
                                            <span class="text-[9px] font-bold uppercase hidden sm:block"><?= ucfirst($plataforma) ?></span>
                                        </div>
                                    </div>

                                    <div class="pt-2 border-t border-slate-200/60">
                                        <span class="text-[10px] font-bold uppercase text-slate-400 block">ID de Juego</span>
                                        <span class="font-mono font-black text-sm text-blue-600 tracking-wide">
                                            <?= htmlspecialchars($g['id_juego'] ?? $g['nick_id'] ?? 'ID Registrado', ENT_QUOTES, 'UTF-8') ?>
                                        </span>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

</section>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
