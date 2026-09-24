<?php
/**
 * Configuración y Conexión Segura a Base de Datos (SQLite)
 * Proyecto: Free Fire Community Hub & Sorteos
 */

class Database {
    private static ?PDO $instance = null;

    /**
     * Obtiene la conexión PDO singleton
     * 
     * @return PDO
     * @throws PDOException
     */
    public static function getConnection(): PDO {
        if (self::$instance === null) {
            $sqlitePath = __DIR__ . '/../database.sqlite';
            $dsn = "sqlite:{$sqlitePath}";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ];

            try {
                self::$instance = new PDO($dsn, null, null, $options);
            } catch (PDOException $e) {
                error_log("Error de conexión a la base de datos: " . $e->getMessage());
                throw new PDOException("No se pudo conectar con la base de datos. Por favor, verifica la configuración.");
            }
        }

        return self::$instance;
    }
}
