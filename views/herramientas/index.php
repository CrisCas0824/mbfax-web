<?php require_once __DIR__ . '/../layouts/header.php'; ?>

<!-- HEADER SECCIÓN HERRAMIENTAS LIGHT PRO -->
<section class="bg-white border-b border-slate-200 py-10">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-3">
        <span class="px-3.5 py-1 rounded-full bg-rose-50 border border-rose-200 text-rose-700 text-xs font-bold uppercase shadow-xs">
            Herramientas Virales Gratuitas
        </span>
        <h1 class="font-brand text-3xl sm:text-4xl font-extrabold text-slate-900">
            HERRAMIENTAS & <span class="text-rose-600">FICHA DE ANTIGÜEDAD POR ID</span>
        </h1>
        <p class="text-slate-600 text-sm max-w-2xl mx-auto leading-relaxed">
            Genera nicks especiales con fuentes insanas, copia el espacio invisible Unicode U+3164, consulta la biblioteca de símbolos gamer y genera la ficha oficial de antigüedad estilo Free Fire Jornal.
        </p>
    </div>
</section>

<!-- SECCIÓN HERRAMIENTAS PRINCIPALES -->
<section class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-16">

    <!-- 1. ESPACIO INVISIBLE (U+3164) PERMANENTE -->
    <div id="espacio" class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 space-y-4 shadow-xs scroll-mt-24">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <span class="px-2.5 py-0.5 rounded text-[11px] font-black uppercase bg-slate-900 text-white">Carácter Unicode U+3164</span>
                <h2 class="font-brand font-bold text-xl text-slate-900 mt-1">Espacio en Blanco Invisible</h2>
                <p class="text-xs text-slate-500">Usa este carácter para separar tu apodo o poner tu nick totalmente invisible en Free Fire.</p>
            </div>
            <button onclick="copyInvisibleSpace()" class="w-full sm:w-auto px-5 py-3 bg-rose-600 hover:bg-rose-700 text-white font-brand font-bold text-xs rounded-xl transition shadow-xs flex items-center justify-center gap-2 uppercase tracking-wider">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m2 4H10m0 0l3-3m-3 3l3 3"/></svg>
                Copiar Espacio Invisible
            </button>
        </div>

        <div class="bg-slate-50 p-4 rounded-xl border border-slate-200 flex items-center justify-between">
            <div class="flex items-center gap-3">
                <span class="w-3 h-3 rounded-full bg-emerald-500"></span>
                <span class="text-xs font-mono font-semibold text-slate-700">Carácter copiable: [<span class="bg-white px-2 py-0.5 border border-slate-300 rounded font-bold text-slate-900">&#x3164;</span>]</span>
            </div>
            <span class="text-[11px] text-slate-400">Compatible con Android, iOS y PC</span>
        </div>
    </div>

    <!-- 2. BIBLIOTECA DE SÍMBOLOS GAMER -->
    <div id="simbolos" class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs scroll-mt-24">
        <div class="border-b border-slate-100 pb-4">
            <span class="px-2.5 py-0.5 rounded text-[11px] font-black uppercase bg-rose-600 text-white">Catálogo Interactivo</span>
            <span class="px-2.5 py-0.5 rounded text-[11px] font-black uppercase bg-rose-600 text-white float-right">Proximante mas simbolos</span>
            <h2 class="font-brand font-bold text-xl text-slate-900 mt-1">Biblioteca de Símbolos Gamer</h2>
            <p class="text-xs text-slate-500">Haz clic sobre cualquier símbolo para copiarlo al instante al portapapeles.</p>
            
        </div>

        <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-10 gap-2.5">
            <?php 
            $simbolosCatalog = [
                '†', '꧁꧂', '亗', '✿', '★', '✪', '✦', '✧', 'ᴮᴼˢˢ', 'ᴾᴿᴼ', 'ᴸᴱᴳᴱᴺᴰ', 'ᴳᴼᴰ',
                '☯︎', '☣︎', '⚓︎', '☄︎', '✦', '✧', '✵', '✶', '✹', '❄︎'
            ];
            foreach ($simbolosCatalog as $simb): 
            ?>
                <button onclick="copyToClipboard('<?= $simb ?>', '¡Símbolo <?= $simb ?> copiado!')" 
                        class="p-3 bg-slate-50 hover:bg-rose-50 border border-slate-200 hover:border-rose-400 text-slate-900 hover:text-rose-600 rounded-xl font-bold text-sm transition shadow-xs text-center">
                    <?= $simb ?>
                </button>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- 3. GENERADOR DE NICKS INSANOS CON SELECTOR DE TAMAÑO -->
    <div id="nicks" class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 space-y-6 shadow-xs scroll-mt-24">
        <div class="border-b border-slate-100 pb-4">
            <span class="px-2.5 py-0.5 rounded text-[11px] font-black uppercase bg-purple-500 text-white">Generador de Apodos</span>
            <span class="px-2.5 py-0.5 rounded text-[11px] font-black uppercase bg-purple-600 text-white float-right">Proximante mas estilos</span>
            <h2 class="font-brand font-bold text-2xl text-slate-900 mt-1">Generador de Nicks Insanos</h2>
            <p class="text-xs text-slate-500">Alterna entre tamaños de letras, versalitas y formatos de clan.</p>
        </div>

        <!-- INPUT Y BOTONES DE TAMAÑO/FORMATO -->
        <div class="space-y-4">
            <div>
                <label for="nickInput" class="block text-xs font-bold text-slate-700 uppercase mb-1.5">Tu Nombre o Apodo:</label>
                <input type="text" id="nickInput" value="MB FAX" placeholder="Ej: Samurai, ProPlayer, Shadow..." 
                       oninput="generateNickVariations()"
                       class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm text-slate-900 focus:outline-none focus:border-rose-600 focus:bg-white transition shadow-xs">
            </div>

            <!-- BOTONES DE FILTRO DE TAMAÑO / ESTILO -->
            <div class="flex flex-wrap gap-2" id="formatButtons">
                <button type="button" onclick="setNickFormat('all')" class="format-btn active px-3.5 py-2 rounded-xl text-xs font-bold bg-rose-600 text-white shadow-xs" data-format="all">Todos los Estilos</button>
                <button type="button" onclick="setNickFormat('subscript')" class="format-btn px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600 transition" data-format="subscript">Letras Pequeñas (ˢᵃᵐᵘʳᵃᶦ)</button>
                <button type="button" onclick="setNickFormat('smallcaps')" class="format-btn px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600 transition" data-format="smallcaps">Versalitas (sᴀᴍᴜʀᴀɪ)</button>
                <button type="button" onclick="setNickFormat('spaced')" class="format-btn px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600 transition" data-format="spaced">Espaciado Limpio (S A M U R A I)</button>
                <button type="button" onclick="setNickFormat('clan')" class="format-btn px-3.5 py-2 rounded-xl text-xs font-bold bg-slate-100 text-slate-700 hover:bg-rose-50 hover:text-rose-600 transition" data-format="clan">Estilo Clan (亗 MB · FAX 亗)</button>
            </div>
        </div>

        <!-- RESULTADOS GENERADOS -->
        <div class="space-y-3 pt-2">
            <h3 class="font-brand font-bold text-xs text-slate-500 uppercase">Estilos Generados:</h3>
            <div id="nickResultsContainer" class="grid grid-cols-1 md:grid-cols-2 gap-3 max-h-96 overflow-y-auto pr-1">
                <!-- Se puebla dinámicamente -->
            </div>
        </div>
    </div>

    <!-- 4. CALCULADOR DE ANTIGÜEDAD POR ID (FICHA FREE FIRE JORNAL) -->
    <div id="antiguedad" class="bg-white border border-slate-200 rounded-2xl p-6 sm:p-8 space-y-8 shadow-xs scroll-mt-24 relative overflow-hidden">
        
        <!-- OVERLAY PRÓXIMAMENTE -->
        <div class="absolute inset-0 z-50 bg-slate-200/60 backdrop-blur-[1px] flex items-center justify-center m-0">
            <div class="bg-white/90 border border-slate-300 p-6 rounded-2xl shadow-xl text-center max-w-xs mx-auto">
                <div class="w-12 h-12 bg-slate-100 text-slate-600 rounded-full flex items-center justify-center mx-auto mb-3">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path></svg>
                </div>
                <h3 class="font-brand font-black text-xl text-slate-900 mb-1">Próximamente</h3>
                <p class="text-xs text-slate-600">Conexión con la API de Free Fire en desarrollo.</p>
            </div>
        </div>
        <div class="border-b border-slate-100 pb-4">
            <span class="px-2.5 py-0.5 rounded text-[11px] font-black uppercase bg-rose-600 text-white">Consulta de Perfil</span>
            <h2 class="font-brand font-bold text-2xl text-slate-900 mt-1">Antigüedad por ID (Ficha Free Fire Jornal)</h2>
            <p class="text-xs text-slate-500">Consulta la fecha exacta de creación UTC, tiempo en Años/Meses/Días, rangos y catálogo visual de skins equipadas.</p>
        </div>

        <!-- BUSCADOR POR ID -->
        <form id="antiguedadForm" onsubmit="consultarAntiguedad(event)" class="space-y-4 max-w-xl">
            <div>
                <label for="idInput" class="block text-xs font-bold text-slate-700 uppercase mb-1.5">ID Numérico de Free Fire:</label>
                <div class="flex gap-2">
                    <input type="number" id="idInput" required placeholder="Ej: 1600684379 o 11124413315" 
                           class="flex-1 bg-slate-50 border border-slate-300 rounded-xl px-4 py-3 text-sm text-slate-900 focus:outline-none focus:border-rose-600 focus:bg-white transition shadow-xs">
                    <button type="submit" class="px-6 py-3 bg-rose-600 hover:bg-rose-700 text-white font-brand font-bold text-xs uppercase tracking-wider rounded-xl transition shadow-xs flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                        Consultar
                    </button>
                </div>
            </div>
        </form>

        <!-- CONTENEDOR DE LA FICHA FREE FIRE JORNAL -->
        <div id="fichaJornalContainer" class="hidden space-y-8 pt-2">
            
            <!-- TARJETA CABECERA DE JUGADOR (ESTILO JORNAL) -->
            <div class="bg-slate-950 text-white rounded-2xl p-6 sm:p-8 relative overflow-hidden shadow-lg border border-slate-800">
                <div class="absolute -right-10 -bottom-10 opacity-10 font-brand font-black text-9xl text-white select-none">FF</div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6">
                    <div class="flex items-center gap-5">
                        <img id="fichaAvatar" src="imagenes/logo/PERFIL FACEBOOK1.png" alt="Avatar Jugador" class="w-20 h-20 rounded-2xl border-2 border-rose-500 object-cover shadow-md">
                        <div class="space-y-1">
                            <div class="flex items-center gap-2 flex-wrap">
                                <h3 id="fichaNick" class="font-brand text-2xl font-black text-white">MB·FAX_PRO亗</h3>
                                <span id="fichaRegion" class="px-2.5 py-0.5 rounded bg-rose-600 text-white text-[10px] font-black uppercase">SAC (Sudamérica)</span>
                            </div>
                            <p class="text-xs text-slate-300 font-mono">ID de Jugador: <span id="fichaID" class="text-amber-400 font-bold">1600684379</span></p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-slate-900/90 p-4 rounded-xl border border-slate-800">
                        <div class="text-center px-4 border-r border-slate-800">
                            <span class="text-[10px] text-slate-400 font-bold block uppercase">Nivel</span>
                            <span id="fichaNivel" class="font-brand text-xl font-black text-amber-400">75</span>
                        </div>
                        <div class="text-center px-4">
                            <span class="text-[10px] text-slate-400 font-bold block uppercase">Likes</span>
                            <span id="fichaLikes" class="font-brand text-xl font-black text-rose-400">14,300</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RECUADRO OFICIAL DE ANTIGÜEDAD EXACTA -->
            <div class="bg-rose-50 border-2 border-rose-200 rounded-2xl p-6 sm:p-8 text-center space-y-4 shadow-xs">
                <span class="px-3 py-1 rounded-full bg-rose-600 text-white text-xs font-black uppercase tracking-wider">
                    Ficha Oficial de Antigüedad Free Fire Jornal
                </span>
                
                <div class="space-y-2">
                    <span class="text-xs text-slate-500 font-bold block uppercase">Tiempo Transcurrido Calculado:</span>
                    <h4 id="fichaAntiguedadCalculada" class="font-brand text-3xl sm:text-4xl font-extrabold text-rose-600">
                        6 Años, 10 Meses y 11 Días
                    </h4>
                </div>

                <div class="bg-white p-3.5 rounded-xl border border-rose-200 max-w-md mx-auto text-xs text-slate-800 font-mono">
                    📅 Fecha Exacta de Creación: <br>
                    <strong id="fichaFechaUTC" class="text-slate-900 font-bold">11 de noviembre de 2019, 16:13:45 UTC</strong>
                </div>
            </div>

            <!-- TARJETAS DE CLASIFICATORIA BR & DE -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-slate-50 border border-slate-200 p-6 rounded-2xl space-y-2">
                    <span class="text-xs font-bold text-slate-500 uppercase block">Battle Royale (BR-Clasificatoria)</span>
                    <h4 id="fichaRangoBR" class="font-brand text-lg font-black text-amber-600">Heroico Élite (6,420 Puntos)</h4>
                    <p class="text-xs text-slate-600">Rango máximo alcanzado en la temporada actual.</p>
                </div>
                <div class="bg-slate-50 border border-slate-200 p-6 rounded-2xl space-y-2">
                    <span class="text-xs font-bold text-slate-500 uppercase block">Duelo de Escuadras (DE-Clasificatoria)</span>
                    <h4 id="fichaRangoDE" class="font-brand text-lg font-black text-rose-600">Maestro (98 Estrellas)</h4>
                    <p class="text-xs text-slate-600">Dominio en partidas 4v4 de alta intensidad.</p>
                </div>
            </div>

            <!-- CATÁLOGO VISUAL DE SKINS EQUIPADAS CON IMÁGENES REALES -->
            <div class="space-y-4">
                <h4 class="font-brand font-bold text-lg text-slate-900 border-b border-slate-200 pb-2">
                    👕 Catálogo Visual de Skins Equipadas
                </h4>
                <div id="fichaSkinsGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Se puebla dinámicamente -->
                </div>
            </div>

        </div>

    </div>

</section>

<!-- TOAST CONTAINER -->
<div id="toastNotification" class="fixed bottom-5 right-5 z-50 hidden transition-all duration-300">
    <div class="bg-slate-900 text-white px-4 py-3 rounded-xl shadow-lg border border-slate-800 text-xs font-bold flex items-center gap-2.5">
        <span class="w-2 h-2 rounded-full bg-emerald-400"></span>
        <span id="toastMessage">¡Copiado con éxito!</span>
    </div>
</div>

<script>
// MAPEOS Y FUNCIONES PARA EL GENERADOR DE NICKS
const subscriptMap = {
    'a': 'ᵃ', 'b': 'ᵇ', 'c': 'ᶜ', 'd': 'ᵈ', 'e': 'ᵉ', 'f': 'ᶠ', 'g': 'ᵍ', 'h': 'ʰ', 'i': 'ᶦ',
    'j': 'ʲ', 'k': 'ᵏ', 'l': 'ˡ', 'm': 'ᵐ', 'n': 'ⁿ', 'o': 'ᵒ', 'p': 'ᵖ', 'q': 'ᑫ', 'r': 'ʳ',
    's': 'ˢ', 't': 'ᵗ', 'u': 'ᵘ', 'v': 'ᵛ', 'w': 'ʷ', 'x': 'ˣ', 'y': 'ʸ', 'z': 'ᶻ',
    'A': 'ᴬ', 'B': 'ᴮ', 'C': 'ᶜ', 'D': 'ᴰ', 'E': 'ᴱ', 'F': 'ᶠ', 'G': 'ᴳ', 'H': 'ᴴ', 'I': 'ᴵ',
    'J': 'ᴶ', 'K': 'ᴷ', 'L': 'ᴸ', 'M': 'ᴹ', 'N': 'ᴺ', 'O': 'ᴼ', 'P': 'ᴾ', 'Q': 'ᑫ', 'R': 'ᴿ',
    'S': 'ˢ', 'T': 'ᵀ', 'U': 'ᵁ', 'V': 'ᵛ', 'W': 'ᵂ', 'X': 'ˣ', 'Y': '', 'Z': 'ᶻ'
};

const smallCapsMap = {
    'a': 'ᴀ', 'b': 'ʙ', 'c': 'ᴄ', 'd': 'ᴅ', 'e': 'ᴇ', 'f': 'ғ', 'g': 'ɢ', 'h': 'ʜ', 'i': 'ɪ',
    'j': 'ᴊ', 'k': 'ᴋ', 'l': 'ʟ', 'm': 'ᴍ', 'n': 'ɴ', 'o': 'ᴏ', 'p': 'ᴘ', 'q': 'ǫ', 'r': 'ʀ',
    's': 's', 't': 'ᴛ', 'u': 'ᴜ', 'v': 'ᴠ', 'w': 'ᴡ', 'x': 'x', 'y': 'ʏ', 'z': 'ᴢ'
};

let currentFormat = 'all';

function toSubscript(text) {
    return text.split('').map(char => subscriptMap[char] || char).join('');
}

function toSmallCaps(text) {
    return text.toLowerCase().split('').map(char => smallCapsMap[char] || char).join('');
}

function setNickFormat(format) {
    currentFormat = format;
    document.querySelectorAll('.format-btn').forEach(btn => {
        if (btn.getAttribute('data-format') === format) {
            btn.classList.add('bg-rose-600', 'text-white', 'shadow-xs');
            btn.classList.remove('bg-slate-100', 'text-slate-700');
        } else {
            btn.classList.remove('bg-rose-600', 'text-white', 'shadow-xs');
            btn.classList.add('bg-slate-100', 'text-slate-700');
        }
    });
    generateNickVariations();
}

function generateNickVariations() {
    const input = document.getElementById('nickInput').value.trim() || 'MB FAX';
    const container = document.getElementById('nickResultsContainer');
    container.innerHTML = '';

    const sub = toSubscript(input);
    const caps = toSmallCaps(input);
    const spaced = input.toUpperCase().split('').join(' ');

    const variations = [
        { format: 'subscript', text: `† ${sub} †` },
        { format: 'subscript', text: `꧁${sub}꧂` },
        { format: 'subscript', text: `✿ ${sub} ✿` },
        { format: 'subscript', text: `★ ${sub} ★` },
        { format: 'subscript', text: `✪ ${sub} ✪` },
        
        { format: 'smallcaps', text: `✦ ${caps} ✦` },
        { format: 'smallcaps', text: `✧ ${caps} ✧` },
        { format: 'smallcaps', text: `${caps} ᴮᴼˢˢ` },
        { format: 'smallcaps', text: `ᴾᴿᴼ ${caps}` },
        { format: 'smallcaps', text: `ᴸᴱᴳᴱᴺᴰ ${caps}` },
        { format: 'smallcaps', text: `ᴳᴼᴰ ${caps}` },
        
        { format: 'spaced', text: `亗 ${spaced} 亗` },
        { format: 'spaced', text: `☯︎ ${spaced} ☯︎` },
        { format: 'spaced', text: `☣︎ ${spaced} ☣︎` },
        { format: 'spaced', text: `⚓︎ ${spaced} ⚓︎` },
        { format: 'spaced', text: `☄︎ ${spaced} ☄︎` },
        
        { format: 'clan', text: `✵ MB · ${input.toUpperCase()} ✵` },
        { format: 'clan', text: `✶ MB·${sub} ✶` },
        { format: 'clan', text: `✹ MB · ${caps} ✹` },
        { format: 'clan', text: `❄︎ MB·${spaced} ❄︎` }
    ];

    variations.forEach(item => {
        if (currentFormat === 'all' || currentFormat === item.format) {
            const div = document.createElement('div');
            div.className = 'bg-slate-50 border border-slate-200 p-3.5 rounded-xl flex items-center justify-between gap-3 hover:border-rose-300 transition';
            div.innerHTML = `
                <span class="font-mono font-bold text-slate-900 text-sm truncate">${item.text}</span>
                <button onclick="copyToClipboard('${item.text}', '¡Nick copiado al portapapeles!')" class="px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white rounded-lg text-xs font-bold transition shadow-xs whitespace-nowrap">
                    📋 Copiar
                </button>
            `;
            container.appendChild(div);
        }
    });
}

function copyInvisibleSpace() {
    const invisibleChar = '\u3164';
    navigator.clipboard.writeText(invisibleChar).then(() => {
        showToast('¡Espacio Invisible Unicode (U+3164) copiado!');
    }).catch(err => {
        console.error('Error al copiar:', err);
    });
}

function copyToClipboard(text, msg) {
    navigator.clipboard.writeText(text).then(() => {
        showToast(msg);
    });
}

function showToast(msg) {
    const toast = document.getElementById('toastNotification');
    const toastMsg = document.getElementById('toastMessage');
    toastMsg.textContent = msg;
    toast.classList.remove('hidden');
    setTimeout(() => {
        toast.classList.add('hidden');
    }, 2500);
}

function consultarAntiguedad(e) {
    e.preventDefault();
    const id = document.getElementById('idInput').value.trim();
    if (!id) return;

    fetch(`index.php?action=calcular_antiguedad&id=${id}`)
        .then(res => res.json())
        .then(data => {
            if (!data.success) {
                alert(data.message);
                return;
            }

            document.getElementById('fichaNick').textContent = data.nick;
            document.getElementById('fichaRegion').textContent = data.region;
            document.getElementById('fichaID').textContent = data.id;
            document.getElementById('fichaNivel').textContent = data.nivel;
            document.getElementById('fichaLikes').textContent = data.likes;
            if (data.avatar) {
                document.getElementById('fichaAvatar').src = data.avatar;
            }
            document.getElementById('fichaAntiguedadCalculada').textContent = data.antiguedad_texto;
            document.getElementById('fichaFechaUTC').textContent = data.fecha_utc;
            document.getElementById('fichaRangoBR').textContent = data.rango_br;
            document.getElementById('fichaRangoDE').textContent = data.rango_de;

            const grid = document.getElementById('fichaSkinsGrid');
            grid.innerHTML = '';
            data.skins.forEach(skin => {
                const card = document.createElement('div');
                card.className = 'bg-white border border-slate-200 rounded-2xl overflow-hidden shadow-xs space-y-3 p-4 flex flex-col justify-between hover:border-rose-300 transition';
                card.innerHTML = `
                    <div class="space-y-2">
                        <div class="flex justify-between items-center text-[11px]">
                            <span class="text-slate-500 font-bold uppercase">${skin.categoria}</span>
                            <span class="px-2 py-0.5 rounded font-black ${skin.badge_color}">${skin.rareza}</span>
                        </div>
                        <h5 class="font-brand font-bold text-sm text-slate-900">${skin.nombre}</h5>
                    </div>
                    <div class="h-36 bg-slate-100 rounded-xl overflow-hidden border border-slate-200">
                        <img src="${skin.imagen}" alt="${skin.nombre}" class="w-full h-full object-cover">
                    </div>
                `;
                grid.appendChild(card);
            });

            document.getElementById('fichaJornalContainer').classList.remove('hidden');
            document.getElementById('fichaJornalContainer').scrollIntoView({ behavior: 'smooth' });
        });
}

// Inicializar al cargar
document.addEventListener('DOMContentLoaded', generateNickVariations);
</script>

<?php require_once __DIR__ . '/../layouts/footer.php'; ?>
