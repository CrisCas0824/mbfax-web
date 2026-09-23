<?php
/**
 * Configuración y Conexión Segura a Base de Datos MySQL vía PDO
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
            $isVercel = getenv('VERCEL') || getenv('VERCEL_ENV');
            
            if ($isVercel) {
                // MODO DEMO: SQLite para Vercel
                $sqlitePath = __DIR__ . '/../database.sqlite';
                $dsn = "sqlite:{$sqlitePath}";
                $user = null;
                $pass = null;
                $options = [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ];
            } else {
                // Parámetros de conexión MySQL para Localhost o Cloud
                $host = getenv('DB_HOST') ?: '127.0.0.1';
                $port = getenv('DB_PORT') ?: '3306';
                $db   = getenv('DB_NAME') ?: 'mbfax';
                $user = getenv('DB_USER') ?: 'root';
                $pass = getenv('DB_PASS') ?: '';
                $charset = 'utf8mb4';

                $dsn = "mysql:host={$host};port={$port};dbname={$db};charset={$charset}";

                $options = [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                    PDO::ATTR_PERSISTENT         => false,
                ];
            }

            try {
                self::$instance = new PDO($dsn, $user, $pass, $options);
            } catch (PDOException $e) {
                // Registrar el error en el log del servidor y mostrar un mensaje limpio
                error_log("Error de conexión a la base de datos: " . $e->getMessage());
                throw new PDOException("No se pudo conectar con la base de datos. Por favor, verifica la configuración del servidor.");
            }
        }

        return self::$instance;
    }
}
