<?php
/**
 * Controlador de Participantes (Búsqueda AJAX en tiempo real)
 */

require_once __DIR__ . '/../models/Participante.php';

class ParticipanteController {
    private Participante $modelParticipante;

    public function __construct() {
        $this->modelParticipante = new Participante();
    }

    /**
     * Búsqueda en tiempo real por Nick/ID
     */
    public function buscar() {
        header('Content-Type: application/json; charset=utf-8');

        $query = trim($_GET['q'] ?? '');
        $sorteoId = isset($_GET['sorteo_id']) && $_GET['sorteo_id'] !== '' ? (int)$_GET['sorteo_id'] : null;

        if (mb_strlen($query) < 2) {
            echo json_encode([
                'success' => false,
                'message' => 'Ingresa al menos 2 caracteres para buscar.',
                'resultados' => []
            ]);
            exit;
        }

        $resultados = $this->modelParticipante->buscarPorNickOId($query, $sorteoId);

        echo json_encode([
            'success' => true,
            'total' => count($resultados),
            'resultados' => $resultados
        ]);
        exit;
    }
}
