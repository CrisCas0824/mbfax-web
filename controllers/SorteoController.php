<?php
/**
 * Controlador de Sorteos
 */

require_once __DIR__ . '/../models/Sorteo.php';
require_once __DIR__ . '/../models/Participante.php';
require_once __DIR__ . '/../models/Ganador.php';

class SorteoController {
    private Sorteo $modelSorteo;
    private Participante $modelParticipante;
    private Ganador $modelGanador;

    public function __construct() {
        $this->modelSorteo = new Sorteo();
        $this->modelParticipante = new Participante();
        $this->modelGanador = new Ganador();
    }

    /**
     * Vista principal de Sorteos
     */
    public function index() {
        $sorteosActivos = $this->modelSorteo->getActivos();
        $sorteosFinalizados = $this->modelSorteo->getFinalizados();
        $ganadoresRecientes = $this->modelGanador->getGanadoresConSorteo(12);

        $mensaje = $_SESSION['flash_message'] ?? null;
        $tipoMensaje = $_SESSION['flash_type'] ?? 'info';
        unset($_SESSION['flash_message'], $_SESSION['flash_type']);

        $pageTitle = "Sorteos de Diamantes y Pases Élite - Free Fire Hub";
        require_once __DIR__ . '/../views/sorteos/index.php';
    }

    /**
     * Registrar participante vía POST o AJAX
     */
    public function registrar() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: index.php?action=sorteos');
            exit;
        }

        $sorteoId = (int)($_POST['sorteo_id'] ?? 0);
        $idJuego = trim($_POST['id_juego'] ?? '');
        $nombreUsuario = trim($_POST['nombre_usuario'] ?? '');
        $plataforma = trim($_POST['plataforma'] ?? 'web');

        $isAjax = (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest') || isset($_GET['ajax']);

        if ($sorteoId <= 0 || empty($idJuego) || empty($nombreUsuario)) {
            $response = ['success' => false, 'message' => 'El ID del juego y tu Nombre de Usuario son obligatorios.'];
        } else {
            $response = $this->modelParticipante->registrar($sorteoId, $idJuego, $nombreUsuario, $plataforma);
        }

        if ($isAjax) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode($response);
            exit;
        }

        $_SESSION['flash_message'] = $response['message'];
        $_SESSION['flash_type'] = $response['success'] ? 'success' : 'error';
        header('Location: index.php?action=sorteos');
        exit;
    }
}
