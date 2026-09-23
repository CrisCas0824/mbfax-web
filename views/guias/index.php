<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- HEADER SECCIÓN GUÍAS MB FAX LIGHT PRO GAMER -->
<section class="bg-white border-b border-slate-200 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="px-3.5 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-xs font-bold uppercase shadow-xs">
            Meta Parche Competitivo
        </span>
        <h1 class="font-brand text-3xl sm:text-4xl font-extrabold text-slate-900">
            GUÍAS META: <span class="text-rose-600">PERSONAJES, ARMAS & MASCOTAS</span>
        </h1>
        <p class="text-slate-600 text-sm max-w-2xl mx-auto leading-relaxed">
            Aprende a combinar las habilidades activas y pasivas más rotas, seleccionar el armamento dominante y equipar la mascota perfecta para subir a Gran Maestro.
        </p>
    </div>
</section>

<!-- SECCIÓN INTERACTIVA DE GUÍAS -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16 relative">
    
    <!-- OVERLAY PRÓXIMAMENTE -->
    <div class="absolute inset-0 z-50 bg-slate-50/80 backdrop-blur-[2px] flex items-center justify-center rounded-3xl m-2 md:m-4">
        <div class="bg-white border border-slate-200 p-8 rounded-2xl shadow-xl text-center max-w-sm mx-auto transform -translate-y-10">
            <div class="w-16 h-16 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center mx-auto mb-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
            </div>
            <h3 class="font-brand font-black text-2xl text-slate-900 mb-2">Próximamente</h3>
            <p class="text-sm text-slate-500">Estamos preparando las mejores guías meta y tier lists actualizados de la temporada. ¡Vuelve pronto!</p>
        </div>
    </div>

    <!-- 1. SECCIÓN PERSONAJES META -->
    <div id="personajes" class="space-y-8 scroll-mt-24">
        
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4 border-b border-slate-200 pb-4">
            <div>
                <h2 class="font-brand text-2xl font-bold text-slate-900 flex items-center gap-2">
                    👤 Tier List de Personajes Meta
                </h2>
                <p class="text-xs text-slate-500">Filtrado por rol estratégico y clasificados de mejor a peor</p>
            </div>

            <!-- FILTRO DINÁMICO POR ROLES (JS) -->
            <div class="flex flex-wrap gap-1.5" id="roleFilters">
                <button onclick="filterRole('all')" class="role-btn active px-3 py-1.5 rounded-lg text-xs font-bold transition bg-rose-600 text-white shadow-xs" data-role="all">Todos</button>
                <button onclick="filterRole('Corredor')" class="role-btn px-3 py-1.5 rounded-lg text-xs font-bold transition bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600" data-role="Corredor">⚡ Corredor (Rusher)</button>
                <button onclick="filterRole('Tirador')" class="role-btn px-3 py-1.5 rounded-lg text-xs font-bold transition bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600" data-role="Tirador">🎯 Tirador (Assault)</button>
                <button onclick="filterRole('Francotirador')" class="role-btn px-3 py-1.5 rounded-lg text-xs font-bold transition bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600" data-role="Francotirador">🔭 Francotirador</button>
                <button onclick="filterRole('Soporte')" class="role-btn px-3 py-1.5 rounded-lg text-xs font-bold transition bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600" data-role="Soporte">🛡️ Soporte</button>
                <button onclick="filterRole('Granadero')" class="role-btn px-3 py-1.5 rounded-lg text-xs font-bold transition bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600" data-role="Granadero">💣 Granadero</button>
            </div>
        </div>

        <!-- SUBSECCIÓN: HABILIDADES ACTIVAS -->
        <div class="space-y-4">
            <h3 class="font-brand font-bold text-lg text-slate-800 flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded bg-amber-100 text-amber-800 text-xs">ACTIVAS</span>
                Personajes de Habilidad Activa (Cuándo usar en partida)
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6" id="activeCharactersGrid">
                <?php foreach ($personajesActivos as $p): ?>
                    <div class="character-card bg-white border border-slate-200 rounded-2xl overflow-hidden hover:border-rose-400 shadow-xs transition flex flex-col justify-between group" data-role="<?= htmlspecialchars($p['rol'], ENT_QUOTES, 'UTF-8') ?>">
                        <div>
                            <div class="relative h-48 bg-slate-100 overflow-hidden">
                                <img src="<?= htmlspecialchars($p['imagen'], ENT_QUOTES, 'UTF-8') ?>" alt="<?= htmlspecialchars($p['nombre'], ENT_QUOTES, 'UTF-8') ?>" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                                <div class="absolute inset-0 bg-gradient-to-t from-white via-transparent to-transparent opacity-80"></div>
                                
                                <div class="absolute top-3 left-3 flex gap-2">
                                    <span class="px-2.5 py-0.5 rounded text-[11px] font-black uppercase bg-rose-600 text-white shadow-xs">
                                        Tier <?= htmlspecialchars($p['tier'], ENT_QUOTES, 'UTF-8') ?>
                                    </span>
                                    <span class="px-2.5 py-0.5 rounded text-[11px] font-bold uppercase bg-white text-slate-900 border border-slate-200 shadow-xs">
                                        <?= htmlspecialchars($p['rol'], ENT_QUOTES, 'UTF-8') ?>
                                    </span>
                                </div>
                            </div>

                            <div class="p-5 space-y-3">
                                <div class="flex items-center justify-between">
                                    <h4 class="font-brand font-bold text-lg text-slate-900"><?= htmlspecialchars($p['nombre'], ENT_QUOTES, 'UTF-8') ?></h4>
                                    <span class="text-[11px] font-mono text-slate-500">Cooldown: <?= htmlspecialchars($p['cooldown'], ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                                <span class="text-xs font-bold text-rose-600 block">Habilidad: <?= htmlspecialchars($p['habilidad'], ENT_QUOTES, 'UTF-8') ?></span>
                                <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars($p['descripcion'], ENT_QUOTES, 'UTF-8') ?></p>

                                <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 text-xs space-y-1">
                                    <span class="font-bold text-slate-900 block flex items-center gap-1">⏰ Cuándo usarlo en partida:</span>
                                    <p class="text-[11px] text-slate-600 leading-relaxed"><?= htmlspecialchars($p['momento_uso'], ENT_QUOTES, 'UTF-8') ?></p>
                                </div>
                            </div>
                        </div>

                        <div class="p-5 pt-0">
                            <span class="text-[11px] text-slate-400 font-bold block mb-1.5">Combo Recomendado (3 Pasivas):</span>
                            <div class="flex flex-wrap gap-1.5">
                                <?php foreach ($p['combos'] as $c): ?>
                                    <span class="px-2 py-0.5 rounded bg-rose-50 text-rose-700 border border-rose-200 text-[11px] font-semibold">
                                        + <?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8') ?>
                                    </span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- SUBSECCIÓN: HABILIDADES PASIVAS -->
        <div class="space-y-4 pt-4 border-t border-slate-100">
            <h3 class="font-brand font-bold text-lg text-slate-800 flex items-center gap-2">
                <span class="px-2.5 py-0.5 rounded bg-slate-200 text-slate-800 text-xs">PASIVAS</span>
                Mejores Habilidades Pasivas y Sinergias
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <?php foreach ($personajesPasivos as $p): ?>
                    <div class="bg-white border border-slate-200 rounded-xl p-4 space-y-2 hover:border-slate-300 shadow-xs">
                        <div class="flex justify-between items-center">
                            <h4 class="font-brand font-bold text-sm text-slate-900"><?= htmlspecialchars($p['nombre'], ENT_QUOTES, 'UTF-8') ?></h4>
                            <span class="px-2 py-0.5 rounded text-[10px] font-black bg-slate-900 text-white">Tier <?= htmlspecialchars($p['tier'], ENT_QUOTES, 'UTF-8') ?></span>
                        </div>
                        <span class="text-[11px] text-rose-600 font-bold block"><?= htmlspecialchars($p['habilidad'], ENT_QUOTES, 'UTF-8') ?></span>
                        <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars($p['descripcion'], ENT_QUOTES, 'UTF-8') ?></p>
                        <div class="text-[11px] text-slate-500 bg-slate-50 p-2 rounded-lg border border-slate-200/60">
                            <strong>Sinergia:</strong> <?= htmlspecialchars($p['sinergia'], ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- 2. SECCIÓN ARMAS Y COMBOS -->
    <div id="armas" class="space-y-8 scroll-mt-24">
        
        <div class="border-b border-slate-200 pb-3">
            <h2 class="font-brand text-2xl font-bold text-slate-900 flex items-center gap-2">
                🔫 Guía Dominante de Armas & Estadísticas
            </h2>
            <p class="text-xs text-slate-500">Clasificación por alcance y combinaciones perfectas por modo de juego</p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            <!-- LARGO ALCANCE -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-4 shadow-xs">
                <h3 class="font-brand font-bold text-lg text-slate-900 flex items-center justify-between border-b border-slate-100 pb-2">
                    <span>🎯 Armas de Largo Alcance (AR, Sniper, Marksman)</span>
                    <span class="text-xs text-rose-600 font-semibold">Tier S / SS</span>
                </h3>
                <div class="space-y-4">
                    <?php foreach ($armasLargoAlcance as $a): ?>
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-2">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-brand font-bold text-slate-900 text-sm"><?= htmlspecialchars($a['nombre'], ENT_QUOTES, 'UTF-8') ?></h4>
                                    <span class="text-[11px] text-slate-500"><?= htmlspecialchars($a['tipo'], ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                                <span class="px-2.5 py-0.5 rounded text-xs font-black bg-rose-600 text-white">Tier <?= htmlspecialchars($a['tier'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <p class="text-xs text-slate-600"><?= htmlspecialchars($a['descripcion'], ENT_QUOTES, 'UTF-8') ?></p>
                            
                            <!-- BARRAS DE ESTADÍSTICAS -->
                            <div class="grid grid-cols-2 gap-2 text-[11px] pt-1">
                                <div>
                                    <div class="flex justify-between text-slate-600 mb-0.5"><span>Daño</span><span class="font-bold"><?= $a['dano'] ?></span></div>
                                    <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden"><div class="bg-rose-600 h-full" style="width: <?= $a['dano'] ?>%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-slate-600 mb-0.5"><span>Rango</span><span class="font-bold"><?= $a['rango'] ?></span></div>
                                    <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden"><div class="bg-amber-500 h-full" style="width: <?= $a['rango'] ?>%"></div></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- CORTO ALCANCE -->
            <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-4 shadow-xs">
                <h3 class="font-brand font-bold text-lg text-slate-900 flex items-center justify-between border-b border-slate-100 pb-2">
                    <span>⚡ Armas de Corto Alcance (SMG, Escopeta)</span>
                    <span class="text-xs text-rose-600 font-semibold">Rush Dominante</span>
                </h3>
                <div class="space-y-4">
                    <?php foreach ($armasCortoAlcance as $a): ?>
                        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 space-y-2">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h4 class="font-brand font-bold text-slate-900 text-sm"><?= htmlspecialchars($a['nombre'], ENT_QUOTES, 'UTF-8') ?></h4>
                                    <span class="text-[11px] text-slate-500"><?= htmlspecialchars($a['tipo'], ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                                <span class="px-2.5 py-0.5 rounded text-xs font-black bg-slate-900 text-white">Tier <?= htmlspecialchars($a['tier'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                            <p class="text-xs text-slate-600"><?= htmlspecialchars($a['descripcion'], ENT_QUOTES, 'UTF-8') ?></p>
                            
                            <!-- BARRAS DE ESTADÍSTICAS -->
                            <div class="grid grid-cols-2 gap-2 text-[11px] pt-1">
                                <div>
                                    <div class="flex justify-between text-slate-600 mb-0.5"><span>Daño</span><span class="font-bold"><?= $a['dano'] ?></span></div>
                                    <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden"><div class="bg-rose-600 h-full" style="width: <?= $a['dano'] ?>%"></div></div>
                                </div>
                                <div>
                                    <div class="flex justify-between text-slate-600 mb-0.5"><span>Cadencia</span><span class="font-bold"><?= $a['cadencia'] ?></span></div>
                                    <div class="w-full bg-slate-200 h-1.5 rounded-full overflow-hidden"><div class="bg-emerald-500 h-full" style="width: <?= $a['cadencia'] ?>%"></div></div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

        </div>

        <!-- SUBSECCIÓN: EL MEJOR COMBO POR MODO -->
        <div class="bg-white border border-slate-200 rounded-2xl p-6 space-y-4 shadow-xs">
            <h3 class="font-brand font-bold text-xl text-slate-900 border-b border-slate-100 pb-3">
                🏆 El Mejor Combo de Armas (Largo + Corto + Pistola) por Modo
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ($combosRecomendados as $combo): ?>
                    <div class="bg-slate-50 border border-slate-200 p-5 rounded-xl space-y-3 flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between items-center">
                                <span class="px-3 py-1 rounded-full bg-rose-600 text-white font-extrabold text-xs">Modo <?= htmlspecialchars($combo['modo'], ENT_QUOTES, 'UTF-8') ?></span>
                                <span class="text-xs text-slate-500 font-semibold"><?= htmlspecialchars($combo['rol'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>

                            <div class="mt-4 space-y-1.5 text-xs">
                                <div class="flex justify-between p-2 bg-white rounded-lg border border-slate-200">
                                    <span class="text-slate-500">Largo Alcance:</span>
                                    <strong class="text-slate-900"><?= htmlspecialchars($combo['largo'], ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="flex justify-between p-2 bg-white rounded-lg border border-slate-200">
                                    <span class="text-slate-500">Corto Alcance:</span>
                                    <strong class="text-rose-600"><?= htmlspecialchars($combo['corto'], ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                                <div class="flex justify-between p-2 bg-white rounded-lg border border-slate-200">
                                    <span class="text-slate-500">Pistola Secundaria:</span>
                                    <strong class="text-amber-600"><?= htmlspecialchars($combo['pistola'], ENT_QUOTES, 'UTF-8') ?></strong>
                                </div>
                            </div>
                        </div>

                        <div class="text-[11px] text-slate-600 pt-2 border-t border-slate-200">
                            <strong>Ventaja Táctica:</strong> <?= htmlspecialchars($combo['ventaja'], ENT_QUOTES, 'UTF-8') ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

    </div>

    <!-- 3. SECCIÓN MASCOTAS META -->
    <div id="mascotas" class="space-y-6 scroll-mt-24">
        
        <div class="border-b border-slate-200 pb-3">
            <h2 class="font-brand text-2xl font-bold text-slate-900 flex items-center gap-2">
                🐾 Mascotas Clasificadas de Mejor a Peor
            </h2>
            <p class="text-xs text-slate-500">Habilidades tácticas que cambian el rumbo del combate</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php foreach ($mascotas as $m): ?>
                <div class="bg-white border border-slate-200 rounded-2xl p-5 space-y-3 hover:border-rose-400 shadow-xs transition flex flex-col justify-between">
                    <div class="space-y-2">
                        <div class="flex items-center justify-between">
                            <h3 class="font-brand font-bold text-lg text-slate-900"><?= htmlspecialchars($m['nombre'], ENT_QUOTES, 'UTF-8') ?></h3>
                            <span class="px-2.5 py-0.5 rounded text-xs font-black bg-amber-500 text-white">Tier <?= htmlspecialchars($m['tier'], ENT_QUOTES, 'UTF-8') ?></span>
                        </div>
                        <span class="text-xs font-bold text-rose-600 block"><?= htmlspecialchars($m['habilidad'], ENT_QUOTES, 'UTF-8') ?></span>
                        <p class="text-xs text-slate-600 leading-relaxed"><?= htmlspecialchars($m['efecto'], ENT_QUOTES, 'UTF-8') ?></p>
                    </div>

                    <div class="bg-slate-50 p-3 rounded-xl border border-slate-200 text-[11px] text-slate-600">
                        <strong class="text-slate-900 block mb-0.5">Ventaja en Partida:</strong>
                        <?= htmlspecialchars($m['situacion'], ENT_QUOTES, 'UTF-8') ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

</section>

<script>
function filterRole(role) {
    const buttons = document.querySelectorAll('.role-btn');
    const cards = document.querySelectorAll('.character-card');

    buttons.forEach(btn => {
        if (btn.getAttribute('data-role') === role) {
            btn.classList.add('bg-rose-600', 'text-white', 'shadow-xs');
            btn.classList.remove('bg-slate-100', 'text-slate-700');
        } else {
            btn.classList.remove('bg-rose-600', 'text-white', 'shadow-xs');
            btn.classList.add('bg-slate-100', 'text-slate-700');
        }
    });

    cards.forEach(card => {
        if (role === 'all' || card.getAttribute('data-role') === role) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
