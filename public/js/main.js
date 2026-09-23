document.addEventListener('DOMContentLoaded', () => {
    // 1. MENU HAMBURGUESA MOVIL
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const hamburgerIcon = document.getElementById('hamburgerIcon');
    const closeIcon = document.getElementById('closeIcon');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            const isHidden = mobileMenu.classList.toggle('hidden');
            if (hamburgerIcon && closeIcon) {
                hamburgerIcon.classList.toggle('hidden', !isHidden);
                closeIcon.classList.toggle('hidden', isHidden);
            }
        });
    }

    // 2. BUSCADOR DE PARTICIPANTES EN TIEMPO REAL (AJAX)
    const searchInput = document.getElementById('searchParticipantInput');
    const searchResultsContainer = document.getElementById('searchResultsContainer');

    if (searchInput && searchResultsContainer) {
        let debounceTimer;
        searchInput.addEventListener('input', (e) => {
            clearTimeout(debounceTimer);
            const query = e.target.value.trim();

            if (query.length < 2) {
                searchResultsContainer.innerHTML = '';
                searchResultsContainer.classList.add('hidden');
                return;
            }

            debounceTimer = setTimeout(() => {
                fetch(`index.php?action=buscar_participante&q=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        searchResultsContainer.classList.remove('hidden');
                        if (!data.success || data.resultados.length === 0) {
                            searchResultsContainer.innerHTML = `
                                <div class="p-3.5 text-center text-slate-500 text-xs">
                                    No se encontraron registros para "<span class="text-slate-900 font-semibold">${escapeHtml(query)}</span>".
                                </div>`;
                            return;
                        }

                        let html = `<div class="p-2.5 text-[11px] font-bold text-slate-500 uppercase border-b border-slate-200/80 bg-slate-50">Resultados MB FAX (${data.total})</div>`;
                        html += `<ul class="divide-y divide-slate-200/60 max-h-56 overflow-y-auto">`;
                        data.resultados.forEach(item => {
                            html += `
                                <li class="p-3 hover:bg-slate-50 flex items-center justify-between transition">
                                    <div>
                                        <span class="font-bold text-slate-900 text-xs block">${escapeHtml(item.nick_id)}</span>
                                        <span class="text-[11px] text-slate-500">${escapeHtml(item.sorteo_titulo)} (${escapeHtml(item.premio)})</span>
                                    </div>
                                    <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase ${item.sorteo_estado === 'activo' ? 'bg-emerald-50 text-emerald-700 border border-emerald-200/60' : 'bg-slate-100 text-slate-600'}">
                                        ${item.sorteo_estado}
                                    </span>
                                </li>`;
                        });
                        html += `</ul>`;
                        searchResultsContainer.innerHTML = html;
                    })
                    .catch(err => {
                        console.error("Error al buscar participante:", err);
                    });
            }, 300);
        });
    }

    // 3. GENERADOR DE NICKS Y ESPACIO INVISIBLE
    const nickInput = document.getElementById('nickInput');
    const nickResultsContainer = document.getElementById('nickResultsContainer');

    if (nickInput && nickResultsContainer) {
        nickInput.addEventListener('input', () => {
            const val = nickInput.value;
            if (!val.trim()) {
                nickResultsContainer.innerHTML = '';
                return;
            }
            generateNickStyles(val);
        });
    }

    // 4. CALCULADOR DE ANTIGÜEDAD POR ID
    const calcForm = document.getElementById('antiguedadForm');
    const calcResult = document.getElementById('antiguedadResult');

    if (calcForm && calcResult) {
        calcForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const idInput = document.getElementById('idAntiguedadInput').value.trim();
            if (!idInput) return;

            fetch(`index.php?action=calcular_antiguedad&id=${encodeURIComponent(idInput)}`)
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        calcResult.classList.remove('hidden');
                        calcResult.innerHTML = `
                            <div class="p-4 bg-slate-50 border border-slate-200/80 rounded-xl space-y-2.5">
                                <div class="flex items-center justify-between">
                                    <span class="text-[11px] font-bold text-slate-500 uppercase">ID Evaluado: ${escapeHtml(data.id)}</span>
                                    <span class="px-2.5 py-0.5 rounded-full text-[11px] font-bold uppercase border bg-amber-50 text-amber-800 border-amber-200/60">
                                        ${escapeHtml(data.rango)}
                                    </span>
                                </div>
                                <div class="grid grid-cols-2 gap-4 pt-2 border-t border-slate-200/60">
                                    <div>
                                        <span class="text-[11px] text-slate-500 block">Año Estimado de Creación</span>
                                        <span class="text-lg font-brand font-extrabold text-sky-700">${data.anio_estimado}</span>
                                    </div>
                                    <div>
                                        <span class="text-[11px] text-slate-500 block">Temporada / Era Inicial</span>
                                        <span class="text-xs font-semibold text-slate-800">${escapeHtml(data.temporada)}</span>
                                    </div>
                                </div>
                            </div>`;
                    } else {
                        showToast(data.message, 'error');
                    }
                });
        });
    }
});

// FUNCIONALIDAD GLOBAL PARA COPIAR AL PORTAPAPELES
function copyToClipboard(text, alertMsg = "¡Copiado al portapapeles!") {
    navigator.clipboard.writeText(text).then(() => {
        showToast(alertMsg, 'success');
    }).catch(err => {
        console.error("Error copiando texto: ", err);
        showToast("Error al copiar texto.", 'error');
    });
}

// INSERCIÓN DE ESPACIO INVISIBLE (U+3164)
function copyInvisibleSpace() {
    const invisibleChar = "\u3164";
    copyToClipboard(invisibleChar, "¡Espacio invisible copiado! Pégalo en tu nick de Free Fire.");
}

// GENERADOR DE ESTILOS DE NICKS
function generateNickStyles(originalText) {
    const nickResultsContainer = document.getElementById('nickResultsContainer');
    if (!nickResultsContainer) return;

    const gothicMap = {
        'a': '𝔞', 'b': '𝔟', 'c': '𝔠', 'd': '𝔡', 'e': '𝔢', 'f': '𝔣', 'g': '𝔤', 'h': '𝔴', 'i': '𝔦', 'j': '𝔟', 'k': '𝔨', 'l': '𝔩', 'm': '𝔪', 'n': '𝔫', 'o': '𝔬', 'p': '𝔭', 'q': '𝔮', 'r': '𝔯', 's': '𝔰', 't': '𝔱', 'u': '𝔲', 'v': '𝔳', 'w': '𝔴', 'x': '𝔵', 'y': '𝔶', 'z': '𝔷',
        'A': '𝔄', 'B': '𝔅', 'C': 'ℭ', 'D': '𝔇', 'E': '𝔈', 'F': '𝔉', 'G': '𝔁', 'H': 'ℌ', 'I': 'ℑ', 'J': '𝔍', 'K': '𝔆', 'L': '𝔇', 'M': '𝔐', 'N': '𝔞', 'O': '𝔒', 'P': '𝔓', 'Q': '𝔔', 'R': 'ℜ', 'S': '𝔖', 'T': 'mathcal', 'U': ' murderous', 'V': '𝔙', 'W': '𝔚', 'X': '𝔛', 'Y': '𝔜', 'Z': 'ℨ'
    };

    function toGothic(text) {
        return text.split('').map(c => gothicMap[c] || c).join('');
    }

    const variations = [
        `† ${originalText} †`,
        `꧁${originalText}꧂`,
        `亗 ${originalText} 亗`,
        `✿ ${originalText} ✿`,
        `★ ${originalText} ★`,
        `✪ ${originalText} ✪`,
        `✦ ${originalText} ✦`,
        `✧ ${originalText} ✧`,
        `${originalText} ᴮᴼˢˢ`,
        `ᴾᴿᴼ ${originalText}`,
        `ᴸᴱᴳᴱᴺᴰ ${originalText}`,
        `ᴳᴼᴰ ${originalText}`,
        `☯︎ ${originalText} ☯︎`,
        `☣︎ ${originalText} ☣︎`,
        `⚓︎ ${originalText} ⚓︎`,
        `☄︎ ${originalText} ☄︎`,
        `✵ ${originalText} ✵`,
        `✶ ${originalText} ✶`,
        `✹ ${originalText} ✹`,
        `❄︎ ${originalText} ❄︎`
    ];

    let html = '';
    variations.forEach(styled => {
        html += `
            <div class="flex items-center justify-between p-2.5 bg-slate-50 border border-slate-200/80 rounded-xl hover:border-sky-400 transition group">
                <span class="font-medium text-slate-800 text-xs tracking-wide">${escapeHtml(styled)}</span>
                <button onclick="copyToClipboard('${escapeJs(styled)}')" class="px-2.5 py-1 bg-sky-50 text-sky-700 group-hover:bg-sky-600 group-hover:text-white rounded-lg font-bold text-[11px] transition border border-sky-200/60">
                    Copiar
                </button>
            </div>`;
    });

    nickResultsContainer.innerHTML = html;
}

// FUNCION AUXILIAR PARA ESCAPAR HTML
function escapeHtml(str) {
    return String(str)
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

function escapeJs(str) {
    return str.replace(/'/g, "\\'").replace(/"/g, '\\"');
}

// TOAST NOTIFICATIONS MINIMALISTAS
function showToast(message, type = 'info') {
    const container = document.getElementById('toastContainer');
    if (!container) return;

    const toast = document.createElement('div');
    const colorClass = type === 'success'
        ? 'bg-slate-900 text-white border-slate-700 shadow-xs'
        : (type === 'error' ? 'bg-red-700 text-white border-red-600 shadow-xs' : 'bg-sky-800 text-white border-sky-700 shadow-xs');

    toast.className = `px-3.5 py-2.5 rounded-xl border text-xs font-semibold flex items-center gap-2 transform transition duration-200 translate-y-2 opacity-0 ${colorClass}`;
    toast.innerHTML = `<span>${escapeHtml(message)}</span>`;

    container.appendChild(toast);

    setTimeout(() => {
        toast.classList.remove('translate-y-2', 'opacity-0');
    }, 10);

    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-2');
        setTimeout(() => toast.remove(), 200);
    }, 3500);
}
