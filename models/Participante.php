<?php
/**
 * Modelo Participante
 * Consultas preparadas con PDO para prevenir SQL Injection y sanitizar datos
 */

require_once __DIR__ . '/../config/database.php';

class Participante {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    /**
     * Registrar un participante en un sorteo
     */
    public function registrar(int $sorteoId, string $idJuego, string $nombreUsuario, string $plataforma = 'web'): array {
        $idSanitizado = trim(strip_tags($idJuego));
        $usuarioSanitizado = trim(strip_tags($nombreUsuario));
        
        if (empty($idSanitizado) || empty($usuarioSanitizado)) {
            return ['success' => false, 'message' => 'Por favor ingresa un ID y Nombre de Usuario válidos.'];
        }

        // Verificar si el participante ya existe en este sorteo
        if ($this->isRegistrado($sorteoId, $idSanitizado)) {
            return ['success' => false, 'message' => '¡Este ID ya está registrado en este sorteo!'];
        }

        $sql = "INSERT INTO participantes (sorteo_id, id_juego, nombre_usuario, plataforma) VALUES (:sorteo_id, :id_juego, :nombre_usuario, :plataforma)";
        $stmt = $this->db->prepare($sql);
        $exec = $stmt->execute([
            ':sorteo_id'       => $sorteoId,
            ':id_juego'        => $idSanitizado,
            ':nombre_usuario'  => $usuarioSanitizado,
            ':plataforma'      => in_array($plataforma, ['facebook', 'youtube', 'web', 'general']) ? $plataforma : 'web'
        ]);

        if ($exec) {
            return ['success' => true, 'message' => '¡Registro exitoso! Ya estás participando en el sorteo.'];
        }

        return ['success' => false, 'message' => 'Ocurrió un error al procesar tu inscripción. Intenta de nuevo.'];
    }

    /**
     * Verificar si un participante ya se encuentra registrado
     */
    public function isRegistrado(int $sorteoId, string $idJuego): bool {
        $sql = "SELECT COUNT(*) FROM participantes WHERE sorteo_id = :sorteo_id AND id_juego = :id_juego";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([
            ':sorteo_id' => $sorteoId,
            ':id_juego'  => trim($idJuego)
        ]);
        return (int)$stmt->fetchColumn() > 0;
    }

    /**
     * Buscar participante en tiempo real por Nick o ID
     */
    public function buscarPorNickOId(string $query, ?int $sorteoId = null): array {
        $querySanitizada = '%' . trim(strip_tags($query)) . '%';
        
        if ($sorteoId !== null) {
            $sql = "SELECT p.*, s.titulo as sorteo_titulo, s.premio, s.estado as sorteo_estado 
                    FROM participantes p 
                    JOIN sorteos s ON p.sorteo_id = s.id 
                    WHERE p.sorteo_id = :sorteo_id AND (p.id_juego LIKE :query OR p.nombre_usuario LIKE :query) 
                    ORDER BY p.id DESC LIMIT 50";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':sorteo_id' => $sorteoId,
                ':query'     => $querySanitizada
            ]);
        } else {
            $sql = "SELECT p.*, s.titulo as sorteo_titulo, s.premio, s.estado as sorteo_estado 
                    FROM participantes p 
                    JOIN sorteos s ON p.sorteo_id = s.id 
                    WHERE (p.id_juego LIKE :query OR p.nombre_usuario LIKE :query) 
                    ORDER BY p.id DESC LIMIT 50";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':query' => $querySanitizada]);
        }

        return $stmt->fetchAll();
    }

    /**
     * Carga masiva de participantes (usada desde panel de admin)
     */
    public function registrarMasivo(int $sorteoId, array $datosParticipantes): int {
        $insertados = 0;
        $sql = "INSERT IGNORE INTO participantes (sorteo_id, id_juego, nombre_usuario, plataforma) VALUES (:sorteo_id, :id_juego, :nombre_usuario, :plataforma)";
        $stmt = $this->db->prepare($sql);

        foreach ($datosParticipantes as $p) {
            $idLimpio = trim(strip_tags($p['id_juego'] ?? ''));
            $usuarioLimpio = trim(strip_tags($p['nombre_usuario'] ?? 'Usuario Importado'));
            $platLimpia = strtolower(trim(strip_tags($p['plataforma'] ?? 'web')));
            
            if (!in_array($platLimpia, ['facebook','youtube','web','general','ambos'])) {
                $platLimpia = 'web';
            }

            if (!empty($idLimpio)) {
                $stmt->execute([
                    ':sorteo_id'      => $sorteoId,
                    ':id_juego'       => $idLimpio,
                    ':nombre_usuario' => $usuarioLimpio,
                    ':plataforma'     => $platLimpia
                ]);
                if ($stmt->rowCount() > 0) {
                    $insertados++;
                }
            }
        }

        return $insertados;
    }

    /**
     * Obtener el listado de participantes de un sorteo
     */
    public function getPorSorteo(int $sorteoId): array {
        $sql = "SELECT * FROM participantes WHERE sorteo_id = :sorteo_id ORDER BY id ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':sorteo_id' => $sorteoId]);
        return $stmt->fetchAll();
    }
}
