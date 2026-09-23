<?php
/**
 * Modelo Ganador
 * Selección aleatoria transparente y consulta de ganadores
 */

require_once __DIR__ . '/../config/database.php';

class Ganador {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    /**
     * Obtener listado de ganadores con información del sorteo
     */
    public function getGanadoresConSorteo(?int $limit = 20): array {
        $sql = "SELECT g.*, s.titulo as sorteo_titulo, s.premio, s.tipo_premio, s.imagen_banner 
                FROM ganadores g 
                JOIN sorteos s ON g.sorteo_id = s.id 
                ORDER BY g.fecha_premiacion DESC, g.id DESC 
                LIMIT :limit";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /**
     * Obtener ganadores de un sorteo en específico
     */
    public function getPorSorteo(int $sorteoId): array {
        $sql = "SELECT * FROM ganadores WHERE sorteo_id = :sorteo_id ORDER BY posicion ASC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':sorteo_id' => $sorteoId]);
        return $stmt->fetchAll();
    }

    /**
     * Seleccionar ganadores aleatorios de forma transparente usando MySQL RAND()
     */
    public function seleccionarGanadoresAleatorios(int $sorteoId, int $cantidad = 1, ?string $comprobanteUrl = null, ?string $notas = null): array {
        // Obtenemos participantes aleatorios de la base de datos
        $sqlRand = "SELECT id, id_juego, nombre_usuario, plataforma FROM participantes 
                    WHERE sorteo_id = :sorteo_id 
                    ORDER BY RAND() 
                    LIMIT :cantidad";
        $stmtRand = $this->db->prepare($sqlRand);
        $stmtRand->bindValue(':sorteo_id', $sorteoId, PDO::PARAM_INT);
        $stmtRand->bindValue(':cantidad', $cantidad, PDO::PARAM_INT);
        $stmtRand->execute();
        $seleccionados = $stmtRand->fetchAll();

        if (empty($seleccionados)) {
            return [
                'success' => false,
                'message' => 'No hay participantes suficientes registrados en este sorteo para elegir un ganador.'
            ];
        }

        $insertados = [];
        $posicion = 1;

        $sqlInsert = "INSERT INTO ganadores (sorteo_id, participante_id, id_juego, nombre_usuario, plataforma, posicion, comprobante_url, notas) 
                      VALUES (:sorteo_id, :participante_id, :id_juego, :nombre_usuario, :plataforma, :posicion, :comprobante_url, :notas)";
        $stmtInsert = $this->db->prepare($sqlInsert);

        foreach ($seleccionados as $p) {
            $stmtInsert->execute([
                ':sorteo_id'       => $sorteoId,
                ':participante_id' => $p['id'],
                ':id_juego'        => $p['id_juego'],
                ':nombre_usuario'  => $p['nombre_usuario'],
                ':plataforma'      => $p['plataforma'],
                ':posicion'        => $posicion,
                ':comprobante_url' => filter_var($comprobanteUrl, FILTER_VALIDATE_URL) ? $comprobanteUrl : null,
                ':notas'           => htmlspecialchars(trim($notas ?? ''), ENT_QUOTES, 'UTF-8')
            ]);
            $insertados[] = [
                'posicion'       => $posicion,
                'id_juego'       => $p['id_juego'],
                'nombre_usuario' => $p['nombre_usuario']
            ];
            $posicion++;
        }

        // Marcar el sorteo como finalizado
        $sqlFinalizar = "UPDATE sorteos SET estado = 'finalizado' WHERE id = :sorteo_id";
        $stmtFin = $this->db->prepare($sqlFinalizar);
        $stmtFin->execute([':sorteo_id' => $sorteoId]);

        return [
            'success' => true,
            'message' => '¡Ganador(es) seleccionado(s) con éxito!',
            'ganadores' => $insertados
        ];
    }
}
