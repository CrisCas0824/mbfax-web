<?php
/**
 * Controlador de Administración para la gestión de sorteos
 */

require_once __DIR__ . '/../models/Sorteo.php';
require_once __DIR__ . '/../models/Participante.php';
require_once __DIR__ . '/../models/Ganador.php';

class AdminController {
    private Sorteo $modelSorteo;
    private Participante $modelParticipante;
    private Ganador $modelGanador;

    public function __construct() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $this->modelSorteo = new Sorteo();
        $this->modelParticipante = new Participante();
        $this->modelGanador = new Ganador();
    }

    /**
     * Dashboard del Panel Admin
     */
    public function index() {
        $isLoggedIn = !empty($_SESSION['admin_logged_in']);
        
        $hasAdmin = false;
        try {
            $db = Database::getConnection();
            $stmt = $db->query("SELECT COUNT(*) FROM administradores");
            $hasAdmin = ((int)$stmt->fetchColumn()) > 0;
        } catch (Exception $e) {
            $hasAdmin = false;
        }

        $sorteos = $isLoggedIn ? $this->modelSorteo->getAll() : [];
        
        $visitasTotales = 0;
        $visitasHoy = 0;
        
        if ($isLoggedIn) {
            try {
                $db = Database::getConnection();
                $visitasTotales = (int)$db->query("SELECT COUNT(*) FROM visitas")->fetchColumn();
                $stmt = $db->prepare("SELECT COUNT(*) FROM visitas WHERE fecha_visita = ?");
                $stmt->execute([date('Y-m-d')]);
                $visitasHoy = (int)$stmt->fetchColumn();
            } catch (Exception $e) {
                // Ignore if table doesn't exist
            }
        }

        $pageTitle = "Panel de Administración - Sorteos Free Fire";

        $mensaje = $_SESSION['flash_message'] ?? null;
        $tipoMensaje = $_SESSION['flash_type'] ?? 'info';
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);

        $isBlocked = false;
        try {
            $db = Database::getConnection();
            $stmt = $db->prepare("SELECT blocked FROM login_attempts WHERE ip_address = :ip");
            $stmt->execute([':ip' => $_SERVER['REMOTE_ADDR']]);
            $attempt = $stmt->fetch();
            if ($attempt && $attempt['blocked'] == 1) {
                $isBlocked = true;
            }
        } catch (Exception $e) {
            // Ignorar
        }

        require_once __DIR__ . '/../views/admin/index.php';
    }

    /**
     * Procesar inicio de sesión
     */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=admin');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $ip_address = $_SERVER['REMOTE_ADDR'];

        try {
            $db = Database::getConnection();

            // 1. Check if IP is blocked
            $stmtCheck = $db->prepare("SELECT attempts, blocked FROM login_attempts WHERE ip_address = :ip");
            $stmtCheck->execute([':ip' => $ip_address]);
            $attemptData = $stmtCheck->fetch();

            if ($attemptData && $attemptData['blocked'] == 1) {
                $_SESSION['flash_message'] = "Tu acceso ha sido bloqueado permanentemente por seguridad.";
                $_SESSION['flash_type'] = "error";
                header('Location: index.php?action=admin');
                exit;
            }

            // 2. Validate User
            $stmt = $db->prepare("SELECT * FROM administradores WHERE username = :username LIMIT 1");
            $stmt->execute([':username' => $username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                $_SESSION['admin_logged_in'] = true;
                $_SESSION['admin_user'] = $user['username'];
                $_SESSION['admin_nombre'] = $user['nombre'];

                // Reset attempts on successful login
                $stmtReset = $db->prepare("DELETE FROM login_attempts WHERE ip_address = :ip");
                $stmtReset->execute([':ip' => $ip_address]);

                $_SESSION['flash_message'] = "¡Bienvenido al Panel de Control, {$user['nombre']}!";
                $_SESSION['flash_type'] = "success";
            } else {
                // Increment attempts on failed login
                $attempts = ($attemptData) ? $attemptData['attempts'] + 1 : 1;
                $blocked = ($attempts >= 3) ? 1 : 0;

                if ($attemptData) {
                    $stmtUpdate = $db->prepare("UPDATE login_attempts SET attempts = :attempts, blocked = :blocked WHERE ip_address = :ip");
                    $stmtUpdate->execute([':attempts' => $attempts, ':blocked' => $blocked, ':ip' => $ip_address]);
                } else {
                    $stmtInsert = $db->prepare("INSERT INTO login_attempts (ip_address, attempts, blocked) VALUES (:ip, :attempts, :blocked)");
                    $stmtInsert->execute([':ip' => $ip_address, ':attempts' => $attempts, ':blocked' => $blocked]);
                }

                if ($blocked) {
                    $_SESSION['flash_message'] = "Tu acceso ha sido bloqueado permanentemente por seguridad.";
                } else {
                    $_SESSION['flash_message'] = "Usuario/contraseña incorrectos. Intentos fallidos: " . $attempts . "/3";
                }
                $_SESSION['flash_type'] = "error";
            }
        } catch (Exception $e) {
            $_SESSION['flash_message'] = "Error al autenticar: " . $e->getMessage();
            $_SESSION['flash_type'] = "error";
        }

        header('Location: index.php?action=admin');
        exit;
    }

    /**
     * Enviar código de desbloqueo al correo del admin
     */
    public function sendUnlockCode() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=admin');
            exit;
        }

        $ip_address = $_SERVER['REMOTE_ADDR'];
        try {
            $db = Database::getConnection();
            $stmtCheck = $db->prepare("SELECT blocked FROM login_attempts WHERE ip_address = :ip");
            $stmtCheck->execute([':ip' => $ip_address]);
            $attemptData = $stmtCheck->fetch();

            if ($attemptData && $attemptData['blocked'] == 1) {
                // Generar código de 6 dígitos
                $code = sprintf("%06d", mt_rand(1, 999999));
                $expires = date('Y-m-d H:i:s', strtotime('+15 minutes'));

                $stmtUpdate = $db->prepare("UPDATE login_attempts SET unlock_code = :code, unlock_expires = :expires WHERE ip_address = :ip");
                $stmtUpdate->execute([':code' => $code, ':expires' => $expires, ':ip' => $ip_address]);

                // Enviar correo
                $to = 'pp4257140@gmail.com';
                $subject = 'Código de Desbloqueo - Panel Admin MB FAX';
                $message = "Hola Admin,\n\nTu IP ($ip_address) ha sido bloqueada tras 3 intentos fallidos.\n\nUsa el siguiente código de 6 dígitos para desbloquear tu acceso. Este código expira en 15 minutos:\n\nCÓDIGO: $code\n\nSi tú no fuiste, alguien está intentando acceder a tu panel.";
                $headers = "From: noreply@mbfax.com\r\n";

                if (mail($to, $subject, $message, $headers)) {
                    $_SESSION['flash_message'] = "Código enviado a tu correo. Revisa tu bandeja de entrada o spam.";
                    $_SESSION['flash_type'] = "success";
                } else {
                    $_SESSION['flash_message'] = "El código se generó ($code) pero la función mail() falló en localhost.";
                    $_SESSION['flash_type'] = "error";
                }
            }
        } catch (Exception $e) {
            $_SESSION['flash_message'] = "Error: " . $e->getMessage();
            $_SESSION['flash_type'] = "error";
        }

        header('Location: index.php?action=admin');
        exit;
    }

    /**
     * Validar código de desbloqueo
     */
    public function verifyUnlockCode() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=admin');
            exit;
        }

        $code = trim($_POST['unlock_code'] ?? '');
        $ip_address = $_SERVER['REMOTE_ADDR'];

        try {
            $db = Database::getConnection();
            $stmt = $db->prepare("SELECT unlock_code, unlock_expires FROM login_attempts WHERE ip_address = :ip AND blocked = 1");
            $stmt->execute([':ip' => $ip_address]);
            $data = $stmt->fetch();

            if ($data && $data['unlock_code'] === $code) {
                if (strtotime($data['unlock_expires']) >= time()) {
                    // Código correcto y no expirado -> Desbloquear
                    $stmtReset = $db->prepare("DELETE FROM login_attempts WHERE ip_address = :ip");
                    $stmtReset->execute([':ip' => $ip_address]);

                    $_SESSION['flash_message'] = "¡Dispositivo desbloqueado con éxito! Ya puedes iniciar sesión.";
                    $_SESSION['flash_type'] = "success";
                } else {
                    $_SESSION['flash_message'] = "El código ha expirado. Solicita uno nuevo.";
                    $_SESSION['flash_type'] = "error";
                }
            } else {
                $_SESSION['flash_message'] = "Código incorrecto.";
                $_SESSION['flash_type'] = "error";
            }
        } catch (Exception $e) {
            $_SESSION['flash_message'] = "Error: " . $e->getMessage();
            $_SESSION['flash_type'] = "error";
        }

        header('Location: index.php?action=admin');
        exit;
    }

    /**
     * Procesar registro de nuevo administrador
     */
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=admin');
            exit;
        }

        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $nombre = trim($_POST['nombre'] ?? '');

        if (empty($username) || empty($password)) {
            $_SESSION['flash_message'] = "Por favor completa el usuario y la contraseña.";
            $_SESSION['flash_type'] = "error";
            header('Location: index.php?action=admin');
            exit;
        }

        if (empty($nombre)) {
            $nombre = $username;
        }

        try {
            $db = Database::getConnection();

            // Verificar si el usuario ya existe
            $checkStmt = $db->prepare("SELECT id FROM administradores WHERE username = :username LIMIT 1");
            $checkStmt->execute([':username' => $username]);
            if ($checkStmt->fetch()) {
                $_SESSION['flash_message'] = "El nombre de usuario '{$username}' ya se encuentra registrado.";
                $_SESSION['flash_type'] = "error";
                header('Location: index.php?action=admin');
                exit;
            }

            // Hashear contraseña e insertar
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO administradores (username, password_hash, nombre) VALUES (:username, :hash, :nombre)");
            $stmt->execute([
                ':username' => $username,
                ':hash' => $hash,
                ':nombre' => $nombre
            ]);

            $_SESSION['flash_message'] = "¡Cuenta de administrador creada con éxito! Ya puedes iniciar sesión.";
            $_SESSION['flash_type'] = "success";
        } catch (Exception $e) {
            $_SESSION['flash_message'] = "Error al registrar la cuenta: " . $e->getMessage();
            $_SESSION['flash_type'] = "error";
        }

        header('Location: index.php?action=admin');
        exit;
    }

    /**
     * Cerrar sesión admin
     */
    public function logout() {
        unset($_SESSION['admin_logged_in'], $_SESSION['admin_user'], $_SESSION['admin_nombre']);
        $_SESSION['flash_message'] = "Sesión cerrada correctamente.";
        $_SESSION['flash_type'] = "info";
        header('Location: index.php?action=admin');
        exit;
    }

    /**
     * Crear nuevo sorteo desde Admin
     */
    public function crearSorteo() {
        $this->verificarAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $exito = $this->modelSorteo->crear($_POST);
            if ($exito) {
                $_SESSION['flash_message'] = "Sorteo creado exitosamente.";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Ocurrió un error al crear el sorteo.";
                $_SESSION['flash_type'] = "error";
            }
        }
        header('Location: index.php?action=admin');
        exit;
    }

    /**
     * Carga masiva de participantes en un sorteo
     */
    public function cargaMasiva() {
        $this->verificarAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sorteoId = (int)($_POST['sorteo_id'] ?? 0);
            $rawList = $_POST['lista_nicks'] ?? '';

            $lineas = explode("\n", str_replace("\r", "", $rawList));
            $datosParticipantes = [];

            foreach ($lineas as $linea) {
                if (empty(trim($linea))) continue;
                $partes = array_map('trim', explode(',', $linea));
                if (count($partes) >= 1) {
                    $datosParticipantes[] = [
                        'id_juego'       => $partes[0],
                        'nombre_usuario' => $partes[1] ?? 'Usuario Importado',
                        'plataforma'     => $partes[2] ?? 'web'
                    ];
                }
            }

            if ($sorteoId > 0 && !empty($datosParticipantes)) {
                $insertados = $this->modelParticipante->registrarMasivo($sorteoId, $datosParticipantes);
                $_SESSION['flash_message'] = "Se insertaron {$insertados} nuevos participantes correctamente.";
                $_SESSION['flash_type'] = "success";
            } else {
                $_SESSION['flash_message'] = "Por favor selecciona un sorteo e ingresa al menos un ID válido.";
                $_SESSION['flash_type'] = "error";
            }
        }
        header('Location: index.php?action=admin');
        exit;
    }

    /**
     * Sortear ganadores aleatorios
     */
    public function sortear() {
        $this->verificarAuth();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sorteoId = (int)($_POST['sorteo_id'] ?? 0);
            $cantidad = (int)($_POST['cantidad_ganadores'] ?? 1);
            $comprobante = trim($_POST['comprobante_url'] ?? '');
            $notas = trim($_POST['notas'] ?? '');

            $res = $this->modelGanador->seleccionarGanadoresAleatorios($sorteoId, $cantidad, $comprobante, $notas);

            $_SESSION['flash_message'] = $res['message'];
            $_SESSION['flash_type'] = $res['success'] ? 'success' : 'error';
        }

        header('Location: index.php?action=admin');
        exit;
    }

    private function verificarAuth() {
        if (empty($_SESSION['admin_logged_in'])) {
            $_SESSION['flash_message'] = "Acceso denegado. Debes iniciar sesión.";
            $_SESSION['flash_type'] = "error";
            header('Location: index.php?action=admin');
            exit;
        }
    }
}
