<?php
/**
 * Modelo Sorteo
 * Operaciones PDO con consultas preparadas para la tabla `sorteos`
 */

require_once __DIR__ . '/../config/database.php';

class Sorteo {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    /**
     * Obtener sorteos activos
     */
    public function getActivos(): array {
        $sql = "SELECT s.*, 
                       (SELECT COUNT(*) FROM participantes p WHERE p.sorteo_id = s.id) as total_participantes 
                FROM sorteos s 
                WHERE s.estado = 'activo' 
                ORDER BY s.id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener sorteos finalizados
     */
    public function getFinalizados(): array {
        $sql = "SELECT s.*, 
                       (SELECT COUNT(*) FROM participantes p WHERE p.sorteo_id = s.id) as total_participantes 
                FROM sorteos s 
                WHERE s.estado = 'finalizado' 
                ORDER BY s.updated_at DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener todos los sorteos
     */
    public function getAll(): array {
        $sql = "SELECT s.*, 
                       (SELECT COUNT(*) FROM participantes p WHERE p.sorteo_id = s.id) as total_participantes 
                FROM sorteos s 
                ORDER BY s.id DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener un sorteo por ID
     */
    public function getById(int $id): ?array {
        $sql = "SELECT s.*, 
                       (SELECT COUNT(*) FROM participantes p WHERE p.sorteo_id = s.id) as total_participantes 
                FROM sorteos s 
                WHERE s.id = :id 
                LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result ?: null;
    }

    /**
     * Crear un nuevo sorteo
     */
    public function crear(array $datos): bool {
        $sql = "INSERT INTO sorteos (titulo, descripcion, premio, tipo_premio, red_social_objetivo, tipo_requisito, url_objetivo, meta_requisito, progreso_requisito, total_ganadores, fecha_fin, estado, imagen_banner) 
                VALUES (:titulo, :descripcion, :premio, :tipo_premio, :red_social_objetivo, :tipo_requisito, :url_objetivo, :meta_requisito, :progreso_requisito, :total_ganadores, :fecha_fin, :estado, :imagen_banner)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':titulo'              => htmlspecialchars(trim($datos['titulo'] ?? ''), ENT_QUOTES, 'UTF-8'),
            ':descripcion'         => htmlspecialchars(trim($datos['descripcion'] ?? ''), ENT_QUOTES, 'UTF-8'),
            ':premio'              => htmlspecialchars(trim($datos['premio'] ?? ''), ENT_QUOTES, 'UTF-8'),
            ':tipo_premio'         => $datos['tipo_premio'] ?? 'diamantes',
            ':red_social_objetivo' => in_array($datos['red_social_objetivo'] ?? '', ['facebook', 'youtube', 'ambos']) ? $datos['red_social_objetivo'] : 'ambos',
            ':tipo_requisito'      => in_array($datos['tipo_requisito'] ?? '', ['seguidores', 'comentarios', 'likes']) ? $datos['tipo_requisito'] : 'seguidores',
            ':url_objetivo'        => filter_var($datos['url_objetivo'] ?? '', FILTER_VALIDATE_URL) ? $datos['url_objetivo'] : null,
            ':meta_requisito'      => (int)($datos['meta_requisito'] ?? 0),
            ':progreso_requisito'  => (int)($datos['progreso_requisito'] ?? 0),
            ':total_ganadores'     => (int)($datos['total_ganadores'] ?? 1),
            ':fecha_fin'           => !empty($datos['fecha_fin']) ? $datos['fecha_fin'] : null,
            ':estado'              => $datos['estado'] ?? 'activo',
            ':imagen_banner'       => filter_var($datos['imagen_banner'] ?? '', FILTER_VALIDATE_URL) ? $datos['imagen_banner'] : null
        ]);
    }

    /**
     * Cambiar el estado de un sorteo
     */
    public function cambiarEstado(int $id, string $estado): bool {
        $sql = "UPDATE sorteos SET estado = :estado WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':estado', $estado, PDO::PARAM_STR);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
