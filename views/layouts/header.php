<!DOCTYPE html>
<html lang="es" class="light scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($pageTitle ?? 'MB FAX - Free Fire Community & Sorteos', ENT_QUOTES, 'UTF-8') ?></title>
    
    <!-- SEO Básico -->
    <meta name="description" content="Plataforma oficial MB FAX Web. Sorteos de Diamantes Gratis, Nombres para Free Fire, Espacio Invisible y Ver tu Antigüedad en Free Fire.">
    <meta name="keywords" content="nombres para free fire, espacio invisible, mb fax web, mb fax web free fire, ver mi antiguedad free fire, diamantes gratis, diamantes gratis free fire, sorteos free fire, mb fax">
    <meta name="author" content="MB FAX">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://mbfax.vercel.app/">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle ?? 'MB FAX - Free Fire Community & Sorteos', ENT_QUOTES, 'UTF-8') ?>">
    <meta property="og:description" content="Plataforma oficial MB FAX. Sorteos de Diamantes, Pases Élite, Guías Meta y Herramientas para la comunidad de Free Fire.">
    <meta property="og:image" content="https://mbfax.vercel.app/imagenes/logo/descarga.png">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://mbfax.vercel.app/">
    <meta property="twitter:title" content="<?= htmlspecialchars($pageTitle ?? 'MB FAX - Free Fire Community & Sorteos', ENT_QUOTES, 'UTF-8') ?>">
    <meta property="twitter:description" content="Plataforma oficial MB FAX. Sorteos de Diamantes, Pases Élite, Guías Meta y Herramientas para la comunidad de Free Fire.">
    <meta property="twitter:image" content="https://mbfax.vercel.app/imagenes/logo/descarga.png">
    
    <!-- Canonical URL -->
    <link rel="canonical" href="https://mbfax.vercel.app/">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="imagenes/logo/descarga.png">
    
    <!-- Google Fonts: Plus Jakarta Sans & Inter -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- AOS CSS para animaciones al hacer scroll -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        faxRed: {
                            50: '#FFF1F2',
                            100: '#FFE4E6',
                            200: '#FECDD3',
                            500: '#F43F5E',
                            600: '#E11D48',
                            700: '#BE123C',
                            800: '#9F1239',
                            900: '#881337'
                        }
                    },
                    fontFamily: {
                        jakarta: ['Plus Jakarta Sans', 'sans-serif'],
                        sans: ['Inter', 'sans-serif']
                    }
                }
            }
        }
    </script>
    
    <style>
        body {
            background-color: #F8FAFC;
            color: #0F172A;
            font-family: 'Inter', sans-serif;
        }
        .font-brand {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col justify-between selection:bg-rose-600 selection:text-white bg-slate-50 antialiased">

    <!-- NAV HEADER MB FAX ESPORTS PRO BLANCO -->
    <header class="sticky top-0 z-50 bg-white/95 backdrop-blur-md border-b border-slate-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                <!-- CONTENEDOR IZQUIERDO: HAMBURGUESA + LOGO -->
                <div class="flex items-center gap-1 sm:gap-3">
                    <!-- BOTÓN TOGGLE MENU MOVIL (HAMBURGUESA/X) -->
                    <button type="button" id="btnMenuMovilToggle" aria-label="Alternar menú" class="md:hidden p-2 rounded-xl text-slate-600 hover:text-rose-600 hover:bg-rose-50 focus:outline-none transition-colors">
                        <svg id="iconHamburger" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/></svg>
                        <svg id="iconClose" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                    </button>

                    <!-- LOGO & BRAND MB FAX -->
                    <a href="index.php" class="flex items-center gap-2 sm:gap-3 group">
                        <div class="relative">
                            <img src="imagenes/logo/descarga.png" alt="MB FAX Avatar" class="w-[60px] h-[60px] object-cover group-hover:scale-125 transition-transform duration-200">
                        </div>

                        <div>
                            <div class="flex items-center gap-1.5 object-cover group-hover:scale-125 transition-transform duration-200">
                                <span class="font-brand font-extrabold text-xl text-slate-900 tracking-tight">MB <span class="text-rose-600">FAX</span></span>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- DESKTOP NAVIGATION (CON ENLACES REDIRIGIBLES Y HOVER AUTOMÁTICO) -->
                <nav class="hidden md:flex items-center space-x-1 lg:space-x-2">
                    <a href="index.php" class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:text-rose-600 hover:bg-rose-50 transition">Inicio</a>
                    
                    <!-- 1. Menú Sorteos: Clic redirige a index.php?action=sorteos / Hover abre submenú -->
                    <div class="relative group">
                        <a href="index.php?action=sorteos" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 group-hover:text-rose-600 group-hover:bg-rose-50 transition">
                            <span>Sorteos</span>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-rose-600 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="absolute left-0 top-full pt-1.5 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-2 space-y-1">
                                <a href="index.php?action=sorteos#activos" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" />
                                    </svg>
                                    <span>Sorteos Activos</span>
                                </a>
                                <a href="index.php?action=sorteos#ganadores" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                    <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                    <span>Ganadores Registrados</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- 2. Menú Guías: Clic redirige a index.php?action=guias / Hover abre submenú -->
                    <div class="relative group">
                        <a href="index.php?action=guias" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 group-hover:text-rose-600 group-hover:bg-rose-50 transition">
                            <span>Guías</span>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-rose-600 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="absolute left-0 top-full pt-1.5 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-2 space-y-1">
                                
                                <!-- PERSONAJES: Clic redirige a guias#personajes / Hover abre lateral -->
                                <div class="relative group/sub w-full">
                                    <a href="index.php?action=guias#personajes" class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                            </svg>
                                            <div class="text-left">
                                                <div class="font-bold text-slate-900 group-hover/item:text-rose-600">Personajes</div>
                                                <div class="text-[11px] text-slate-500">Activas, Pasivas & Combos</div>
                                            </div>
                                        </div>
                                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover/sub:text-rose-600 transition-transform group-hover/sub:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>

                                    <!-- Sub-menú lateral de Personajes -->
                                    <div class="absolute left-full top-0 ml-1 w-48 opacity-0 invisible group-hover/sub:opacity-100 group-hover/sub:visible transition-all duration-200 z-50">
                                        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-2 space-y-1">
                                            <a href="index.php?action=guias#activas" class="block px-3.5 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition">
                                                Habilidades Activas
                                            </a>
                                            <a href="index.php?action=guias#pasivas" class="block px-3.5 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition">
                                                Habilidades Pasivas
                                            </a>
                                            <a href="index.php?action=guias#combos" class="block px-3.5 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition">
                                                Mejores Combos
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- ARMAMENTO: Clic redirige a guias#armas / Hover abre lateral -->
                                <div class="relative group/sub w-full">
                                    <a href="index.php?action=guias#armas" class="w-full flex items-center justify-between px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                        <div class="flex items-center gap-3">
                                            <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" />
                                            </svg>
                                            <div class="text-left">
                                                <div class="font-bold text-slate-900 group-hover/item:text-rose-600">Armamento</div>
                                                <div class="text-[11px] text-slate-500">Largo, Corto & Combos</div>
                                            </div>
                                        </div>
                                        <svg class="w-3.5 h-3.5 text-slate-400 group-hover/sub:text-rose-600 transition-transform group-hover/sub:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>

                                    <!-- Sub-menú lateral de Armamento -->
                                    <div class="absolute left-full top-0 ml-1 w-48 opacity-0 invisible group-hover/sub:opacity-100 group-hover/sub:visible transition-all duration-200 z-50">
                                        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-2 space-y-1">
                                            <a href="index.php?action=guias#armas-largas" class="block px-3.5 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition">
                                                Armas de Larga Distancia
                                            </a>
                                            <a href="index.php?action=guias#armas-cortas" class="block px-3.5 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition">
                                                Armas de Corta Distancia
                                            </a>
                                            <a href="index.php?action=guias#combos-armas" class="block px-3.5 py-2 rounded-xl text-xs font-bold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition">
                                                Combos de Armas
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- MASCOTAS TÁCTICAS: Clic redirige a guias#mascotas -->
                                <a href="index.php?action=guias#mascotas" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                    <svg class="w-5 h-5 fill-current text-rose-500 shrink-0" viewBox="0 0 24 24">
                                        <path d="M12 10.5c-2.3 0-4.2 1.9-4.2 4.2 0 1.9 1.4 3.6 3.2 4.1.6.2 1.4.2 2 0 1.8-.5 3.2-2.2 3.2-4.1 0-2.3-1.9-4.2-4.2-4.2z" />
                                        <ellipse cx="6.5" cy="9" rx="1.6" ry="2.2" transform="rotate(-20 6.5 9)" />
                                        <ellipse cx="10" cy="5.8" rx="1.6" ry="2.2" transform="rotate(-8 10 5.8)" />
                                        <ellipse cx="14" cy="5.8" rx="1.6" ry="2.2" transform="rotate(8 14 5.8)" />
                                        <ellipse cx="17.5" cy="9" rx="1.6" ry="2.2" transform="rotate(20 17.5 9)" />
                                    </svg>
                                    <div>
                                        <div class="font-bold text-slate-900 group-hover/item:text-rose-600">Mascotas Tácticas</div>
                                        <div class="text-[11px] text-slate-500">Ventaja estratégica en partida</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- 3. Menú Herramientas: Clic redirige a index.php?action=herramientas / Hover abre submenú -->
                    <div class="relative group">
                        <a href="index.php?action=herramientas" class="inline-flex items-center gap-1.5 px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 group-hover:text-rose-600 group-hover:bg-rose-50 transition">
                            <span>Herramientas</span>
                            <svg class="w-4 h-4 text-slate-400 group-hover:text-rose-600 transition-transform duration-200 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </a>
                        <div class="absolute left-0 top-full pt-1.5 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="bg-white rounded-2xl shadow-xl border border-slate-200 p-2 space-y-1">
                                <a href="index.php?action=herramientas#espacio" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                    </svg>
                                    <div>
                                        <div class="font-bold text-slate-900 group-hover/item:text-rose-600">Espacio Invisible</div>
                                        <div class="text-[11px] text-slate-500">Carácter Unicode U+3164</div>
                                    </div>
                                </a>
                                <a href="index.php?action=herramientas#simbolos" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                                    </svg>
                                    <div>
                                        <div class="font-bold text-slate-900 group-hover/item:text-rose-600">Biblioteca de Símbolos</div>
                                        <div class="text-[11px] text-slate-500">Cruces, rayos, coronas y alas</div>
                                    </div>
                                </a>
                                <a href="index.php?action=herramientas#nicks" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                    <div>
                                        <div class="font-bold text-slate-900 group-hover/item:text-rose-600">Generador de Nicks</div>
                                        <div class="text-[11px] text-slate-500">Estilos insanos y tamaños</div>
                                    </div>
                                </a>
                                <a href="index.php?action=herramientas#antiguedad" class="flex items-center gap-3 px-3.5 py-2.5 rounded-xl text-xs font-semibold text-slate-600 hover:text-rose-600 hover:bg-rose-50 transition group/item">
                                    <svg class="w-4 h-4 text-rose-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <div>
                                        <div class="font-bold text-slate-900 group-hover/item:text-rose-600">Antigüedad por ID</div>
                                        <div class="text-[11px] text-slate-500">Ficha estilo Free Fire Jornal</div>
                                    </div>
                                </a>
                                
                                
                            </div>
                        </div>
                    </div>

                    <a href="index.php?action=sobre_mi" class="px-3.5 py-2 rounded-xl text-sm font-semibold text-slate-700 hover:text-rose-600 hover:bg-rose-50 transition">Sobre Mí</a>
                </nav>

                <!-- SOCIAL ACTION BUTTONS & MOBILE TOGGLE -->
                <div class="flex items-center gap-2.5">
                    <!-- Facebook Official Btn (Azul Facebook #1877F2) -->
                    <a href="https://www.facebook.com/MBFAX" target="_blank" rel="noopener noreferrer" class="hidden sm:inline-flex items-center gap-2 bg-[#1877F2] hover:bg-[#166fe5] text-white px-3.5 py-2 rounded-xl text-xs font-bold transition shadow-sm">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                        Facebook
                    </a>

                    <!-- YouTube Official Btn (Rojo Institucional) -->
                    <a href="https://www.youtube.com/@MBFAX" target="_blank" rel="noopener noreferrer" class="hidden sm:inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-3.5 py-2 rounded-xl text-xs font-bold transition shadow-sm">
                        <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        YouTube
                    </a>

                    <!-- Admin Link (Perfil de Persona) -->
                    <a href="index.php?action=admin" title="Panel Admin" class="p-2.5 rounded-xl bg-slate-50 border border-slate-200 text-slate-500 hover:text-rose-600 hover:border-rose-200 hover:bg-rose-50 transition">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

    </header>

    <!-- CONTENEDOR PRINCIPAL DEL MENÚ MÓVIL (Mantiene id="mobileMenu" y display="none") -->
    <div id="mobileMenu" style="display: none;" class="md:hidden fixed top-20 inset-x-0 bottom-0 z-40">
        
        <!-- Backdrop Oscuro -->
        <div id="mobileMenuBackdrop" class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm cursor-pointer"></div>

        <!-- Menú Lateral (Drawer) -->
        <div class="absolute top-0 left-0 bottom-0 w-[80%] max-w-sm bg-white shadow-2xl flex flex-col overflow-y-auto">
            
            <!-- Contenido del Menú (Acordeones y Listas limpios) -->
            <div class="flex flex-col text-slate-800 text-base w-full pt-2">
                
                <!-- Inicio Link Normal -->
                <a href="index.php" class="menu-link block px-5 py-4 border-b border-slate-200 font-semibold hover:bg-slate-50 transition-colors text-slate-800 hover:text-rose-600">
                    Inicio
                </a>
                
                <!-- Sorteos Acordeón con redirección en el título -->
                <details class="group border-b border-slate-200 w-full">
                    <summary class="flex items-center justify-between px-5 py-4 cursor-pointer hover:bg-slate-50 list-none [&::-webkit-details-marker]:hidden font-semibold">
                        <a href="index.php?action=sorteos" class="menu-link flex-1 text-slate-800 hover:text-rose-600 transition-colors">
                            Sorteos
                        </a>
                        <div class="p-1 text-slate-400 group-open:text-rose-600 group-open:rotate-180 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </summary>
                    <div class="bg-slate-50 px-5 pb-4 pt-1 space-y-3 font-normal text-sm">
                        <a href="index.php?action=sorteos#activos" class="menu-link flex items-center gap-3 text-slate-600 hover:text-rose-600 pl-2 py-1.5 transition-colors">
                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v13m0-13V6a2 2 0 112 2h-2zm0 0V5.5A2.5 2.5 0 109.5 8H12zm-7 4h14M5 12v7a2 2 0 002 2h10a2 2 0 002-2v-7" /></svg>
                            <span>Sorteos Activos</span>
                        </a>
                        <a href="index.php?action=sorteos#ganadores" class="menu-link flex items-center gap-3 text-slate-600 hover:text-rose-600 pl-2 py-1.5 transition-colors">
                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                            <span>Ganadores Registrados</span>
                        </a>
                    </div>
                </details>

                <!-- Guías Acordeón con redirección en Guías, Personajes y Armamento -->
                <details class="group border-b border-slate-200 w-full">
                    <summary class="flex items-center justify-between px-5 py-4 cursor-pointer hover:bg-slate-50 list-none [&::-webkit-details-marker]:hidden font-semibold">
                        <a href="index.php?action=guias" class="menu-link flex-1 text-slate-800 hover:text-rose-600 transition-colors">
                            Guías
                        </a>
                        <div class="p-1 text-slate-400 group-open:text-rose-600 group-open:rotate-180 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </summary>
                    <div class="bg-slate-50 px-5 pb-3 flex flex-col w-full space-y-1">
                        
                        <!-- Personajes: Enlace directo en el nombre + flecha desplegable -->
                        <details class="group/sub w-full border-b border-slate-200/60 pb-1">
                            <summary class="flex items-center justify-between py-3 cursor-pointer hover:text-rose-600 list-none [&::-webkit-details-marker]:hidden">
                                <a href="index.php?action=guias#personajes" class="menu-link flex items-center gap-3 flex-1 text-slate-700 hover:text-rose-600">
                                    <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    <span class="text-base font-semibold">Personajes</span>
                                </a>
                                <div class="p-1 text-slate-400 group-open/sub:text-rose-600 group-open/sub:rotate-180 transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                            </summary>
                            <div class="pl-7 pb-2 space-y-2.5 font-normal text-sm text-slate-600 flex flex-col">
                                <a href="index.php?action=guias#activas" class="menu-link hover:text-rose-600 transition-colors">Habilidades Activas</a>
                                <a href="index.php?action=guias#pasivas" class="menu-link hover:text-rose-600 transition-colors">Habilidades Pasivas</a>
                                <a href="index.php?action=guias#combos" class="menu-link hover:text-rose-600 transition-colors">Mejores Combos</a>
                            </div>
                        </details>

                        <!-- Armamento: Enlace directo en el nombre + flecha desplegable -->
                        <details class="group/sub w-full border-b border-slate-200/60 pb-1">
                            <summary class="flex items-center justify-between py-3 cursor-pointer hover:text-rose-600 list-none [&::-webkit-details-marker]:hidden">
                                <a href="index.php?action=guias#armas" class="menu-link flex items-center gap-3 flex-1 text-slate-700 hover:text-rose-600">
                                    <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>
                                    <span class="text-base font-semibold">Armamento</span>
                                </a>
                                <div class="p-1 text-slate-400 group-open/sub:text-rose-600 group-open/sub:rotate-180 transition-all duration-200">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                                </div>
                            </summary>
                            <div class="pl-7 pb-2 space-y-2.5 font-normal text-sm text-slate-600 flex flex-col">
                                <a href="index.php?action=guias#armas-largas" class="menu-link hover:text-rose-600 transition-colors">Larga Distancia</a>
                                <a href="index.php?action=guias#armas-cortas" class="menu-link hover:text-rose-600 transition-colors">Corta Distancia</a>
                                <a href="index.php?action=guias#combos-armas" class="menu-link hover:text-rose-600 transition-colors">Combos de Armas</a>
                            </div>
                        </details>

                        <!-- Mascotas Tácticas -->
                        <a href="index.php?action=guias#mascotas" class="menu-link flex items-center gap-3 py-3 text-base font-semibold text-slate-700 hover:text-rose-600 transition-colors">
                            <svg class="w-4 h-4 text-rose-500 shrink-0 fill-current" viewBox="0 0 24 24">
                                <path d="M12 10.5c-2.3 0-4.2 1.9-4.2 4.2 0 1.9 1.4 3.6 3.2 4.1.6.2 1.4.2 2 0 1.8-.5 3.2-2.2 3.2-4.1 0-2.3-1.9-4.2-4.2-4.2z" />
                                <ellipse cx="6.5" cy="9" rx="1.6" ry="2.2" transform="rotate(-20 6.5 9)" />
                                <ellipse cx="10" cy="5.8" rx="1.6" ry="2.2" transform="rotate(-8 10 5.8)" />
                                <ellipse cx="14" cy="5.8" rx="1.6" ry="2.2" transform="rotate(8 14 5.8)" />
                                <ellipse cx="17.5" cy="9" rx="1.6" ry="2.2" transform="rotate(20 17.5 9)" />
                            </svg>
                            <span>Mascotas Tácticas</span>
                        </a>

                    </div>
                </details>

                <!-- Herramientas Acordeon -->
                <details class="group border-b border-slate-200 w-full">
                    <summary class="flex items-center justify-between px-5 py-4 cursor-pointer hover:bg-slate-50 list-none [&::-webkit-details-marker]:hidden font-semibold">
                        <a href="index.php?action=herramientas" class="menu-link flex-1 text-slate-800 hover:text-rose-600 transition-colors">
                            Herramientas
                        </a>
                        <div class="p-1 text-slate-400 group-open:text-rose-600 group-open:rotate-180 transition-all duration-200">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" /></svg>
                        </div>
                    </summary>
                    <div class="bg-slate-50 px-5 pb-4 pt-1 space-y-4 font-normal text-sm">
                        <!-- 4. Espacio Invisible -->
                        <a href="index.php?action=herramientas#espacio" class="menu-link flex items-center gap-3 text-slate-600 hover:text-rose-600 pl-2">
                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                            </svg>
                            <span>Espacio Invisible (U+3164)</span>
                        </a>
                        <!-- 3. Biblioteca de Símbolos -->
                        <a href="index.php?action=herramientas#simbolos" class="menu-link flex items-center gap-3 text-slate-600 hover:text-rose-600 pl-2">
                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z" />
                            </svg>
                            <span>Biblioteca de Símbolos</span>
                        </a>
                        <!-- 1. Generador de Nicks -->
                        <a href="index.php?action=herramientas#nicks" class="menu-link flex items-center gap-3 text-slate-600 hover:text-rose-600 pl-2">
                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                            <span>Generador de Nicks</span>
                        </a>

                        <!-- 2. Antigüedad por ID -->
                        <a href="index.php?action=herramientas#antiguedad" class="menu-link flex items-center gap-3 text-slate-600 hover:text-rose-600 pl-2">
                            <svg class="w-4 h-4 text-rose-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span>Antigüedad por ID</span>
                        </a>

                        

                        

                    </div>
                </details>

                <!-- Sobre Mí -->
                <a href="index.php?action=sobre_mi" class="menu-link block px-5 py-4 hover:bg-slate-50 border-b border-slate-200 font-semibold text-slate-800 hover:text-rose-600">Sobre Mí & Cuentas Oficiales</a>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // --- MOBILE MENU LOGIC ---
            const btnMenuToggle = document.getElementById('btnMenuMovilToggle');
            const iconHamburger = document.getElementById('iconHamburger');
            const iconClose = document.getElementById('iconClose');
            const menuMovil = document.getElementById('mobileMenu');
            const menuLinks = document.querySelectorAll('.menu-link');
            const backdrop = document.getElementById('mobileMenuBackdrop');

            if (btnMenuToggle && menuMovil) {
                let isMenuOpen = false;
                
                const closeMenu = () => {
                    menuMovil.style.display = 'none';
                    document.body.style.overflow = 'auto';
                    iconHamburger.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                    isMenuOpen = false;
                };
                
                const openMenu = () => {
                    menuMovil.style.display = 'block';
                    document.body.style.overflow = 'hidden';
                    iconHamburger.classList.add('hidden');
                    iconClose.classList.remove('hidden');
                    isMenuOpen = true;
                };

                btnMenuToggle.addEventListener('click', () => {
                    if (isMenuOpen) closeMenu();
                    else openMenu();
                });
                
                if (backdrop) backdrop.addEventListener('click', closeMenu);
                menuLinks.forEach(link => link.addEventListener('click', closeMenu));
            }

            // --- ACTIVE LINK HIGHLIGHT LOGIC ---
            function updateActiveMenu() {
                const params = new URLSearchParams(window.location.search);
                const action = params.get('action');
                const hash = window.location.hash;
                
                let targetHref = 'index.php';
                if (action) {
                    targetHref += '?action=' + action;
                    if (hash) targetHref += hash;
                } else if (hash) {
                    targetHref += hash;
                }

                const navLinks = document.querySelectorAll('header a[href^="index.php"], #mobileMenu a[href^="index.php"]');

                // 1. Reset all links and parents
                navLinks.forEach(link => {
                    if (link.querySelector('img')) return; // Ignore logo
                    
                    link.style.color = '';
                    link.style.fontWeight = '';
                    
                    let desktopGroup = link.closest('.group, .group\\/sub');
                    while (desktopGroup) {
                        let topLink = desktopGroup.querySelector(':scope > a');
                        if (topLink) {
                            topLink.style.color = '';
                            topLink.style.fontWeight = '';
                        }
                        desktopGroup = desktopGroup.parentElement.closest('.group, .group\\/sub');
                    }
                    
                    let mobileDetails = link.closest('details');
                    while (mobileDetails) {
                        let summaryLink = mobileDetails.querySelector('summary a');
                        if (summaryLink) {
                            summaryLink.style.color = '';
                            summaryLink.style.fontWeight = '';
                        }
                        let summarySvg = mobileDetails.querySelector('summary svg');
                        if (summarySvg) summarySvg.style.color = '';
                        mobileDetails = mobileDetails.parentElement.closest('details');
                    }
                });

                // 2. Add active color (#E11D48 = rose-600)
                navLinks.forEach(link => {
                    if (link.querySelector('img')) return;

                    const href = link.getAttribute('href');
                    
                    let isMatch = false;
                    if (targetHref === href) {
                        isMatch = true;
                    } else if (action && !hash && href.startsWith('index.php?action=' + action)) {
                        if (!href.includes('#')) isMatch = true;
                    } else if (!action && !hash && href === 'index.php') {
                        isMatch = true;
                    }

                    if (isMatch) {
                        link.style.color = '#E11D48';
                        link.style.fontWeight = '800'; 
                        
                        let desktopGroup = link.closest('.group, .group\\/sub');
                        while (desktopGroup) {
                            let topLink = desktopGroup.querySelector(':scope > a');
                            if (topLink) {
                                topLink.style.color = '#E11D48';
                                topLink.style.fontWeight = '800';
                            }
                            desktopGroup = desktopGroup.parentElement.closest('.group, .group\\/sub');
                        }

                        let mobileDetails = link.closest('details');
                        while (mobileDetails) {
                            let summaryLink = mobileDetails.querySelector('summary a');
                            if (summaryLink) {
                                summaryLink.style.color = '#E11D48';
                                summaryLink.style.fontWeight = '800';
                            }
                            let summarySvg = mobileDetails.querySelector('summary svg');
                            if (summarySvg) summarySvg.style.color = '#E11D48';
                            
                            mobileDetails.open = true; 
                            mobileDetails = mobileDetails.parentElement.closest('details');
                        }
                    }
                });
            }

            updateActiveMenu();
            window.addEventListener('hashchange', updateActiveMenu);
            
            const allNavLinks = document.querySelectorAll('header a[href^="index.php"], #mobileMenu a[href^="index.php"]');
            allNavLinks.forEach(a => {
                a.addEventListener('click', () => {
                    setTimeout(updateActiveMenu, 50); 
                });
            });
        });
    </script>

    <main class="flex-grow">