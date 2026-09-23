<?php
/**
 * Router Central - Free Fire Community Hub & Sorteos
 * Manejador principal de peticiones MVC
 */

// Iniciar sesión PHP de forma segura
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Cargar configuración de base de datos
require_once __DIR__ . '/config/database.php';

// SISTEMA DE TRACKING DE VISITAS
try {
    $ip = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    $fechaHoy = date('Y-m-d');
    $sessionKey = "visited_" . $fechaHoy;

    if (!isset($_SESSION[$sessionKey])) {
        $db = Database::getConnection();
        // Intentar registrar la visita. 
        // SQLite no soporta INSERT IGNORE, soporta INSERT OR IGNORE, por lo que usaremos try-catch para ambos
        try {
            $stmt = $db->prepare("INSERT INTO visitas (ip_address, fecha_visita) VALUES (?, ?)");
            $stmt->execute([$ip, $fechaHoy]);
        } catch (PDOException $e) {
            // Ignorar error si ya existe en SQLite o MySQL (Duplicate entry)
        }
        $_SESSION[$sessionKey] = true;
    }
} catch (Exception $e) {
    // Ignorar errores de tracking para no romper la web
}

// Obtener la acción solicitada por la URL
$action = isset($_GET['action']) ? trim(strip_tags($_GET['action'])) : 'home';

switch ($action) {
    // 1. PÁGINA PRINCIPAL
    case 'home':
        require_once __DIR__ . '/controllers/SorteoController.php';
        $controller = new SorteoController();
        // Carga la vista de inicio que integra hero e info general
        require_once __DIR__ . '/views/home/index.php';
        break;

    // 2. MÓDULO DE SORTEOS
    case 'sorteos':
        require_once __DIR__ . '/controllers/SorteoController.php';
        $controller = new SorteoController();
        $controller->index();
        break;

    case 'registrar_participante':
        require_once __DIR__ . '/controllers/SorteoController.php';
        $controller = new SorteoController();
        $controller->registrar();
        break;

    case 'buscar_participante':
        require_once __DIR__ . '/controllers/ParticipanteController.php';
        $controller = new ParticipanteController();
        $controller->buscar();
        break;

    // 3. GUÍAS META (PERSONAJES, ARMAS, MASCOTAS)
    case 'guias':
        require_once __DIR__ . '/controllers/GuiaController.php';
        $controller = new GuiaController();
        $controller->index();
        break;

    // 4. HERRAMIENTAS VIRALES (GENERADOR NICKS, ESPACIO INVISIBLE, ANTIGÜEDAD)
    case 'herramientas':
        require_once __DIR__ . '/controllers/HerramientasController.php';
        $controller = new HerramientasController();
        $controller->index();
        break;

    case 'calcular_antiguedad':
        require_once __DIR__ . '/controllers/HerramientasController.php';
        $controller = new HerramientasController();
        $controller->calcularAntiguedad();
        break;

    // 5. SECCIÓN SOBRE MÍ (BIOGRAFÍA, ASSETS LOCALES, CLAN Y CUENTAS)
    case 'sobre_mi':
        $pageTitle = "Sobre Mí - Streamer Creador de Contenido & Clan Oficial";
        require_once __DIR__ . '/views/sobre_mi/index.php';
        break;

    // 6. PANEL ADMIN DE GESTIÓN DE SORTEOS
    case 'admin':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->index();
        break;

    case 'admin_login':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->login();
        break;

    case 'admin_register':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->register();
        break;

    case 'admin_logout':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->logout();
        break;

    case 'admin_send_unlock':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->sendUnlockCode();
        break;

    case 'admin_verify_unlock':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->verifyUnlockCode();
        break;

    case 'admin_crear_sorteo':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->crearSorteo();
        break;

    case 'admin_carga_masiva':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->cargaMasiva();
        break;

    case 'admin_sortear':
        require_once __DIR__ . '/controllers/AdminController.php';
        $controller = new AdminController();
        $controller->sortear();
        break;

    // 404 NOT FOUND
    default:
        http_response_code(404);
        $pageTitle = "Página No Encontrada - Free Fire Hub";
        require_once __DIR__ . '/views/layouts/header.php';
        echo '
        <div class="max-w-md mx-auto my-20 text-center space-y-4">
            <h1 class="font-orbitron text-6xl font-black text-ff-red">404</h1>
            <p class="text-slate-300">La página o acción solicitada no existe.</p>
            <a href="index.php" class="inline-block px-6 py-2.5 bg-ff-gold text-dark-bg font-bold rounded-xl text-xs uppercase">Volver al Inicio</a>
        </div>';
        require_once __DIR__ . '/views/layouts/footer.php';
        break;
}
