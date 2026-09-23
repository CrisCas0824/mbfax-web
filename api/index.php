<?php
// Vercel requiere que las funciones serverless estén en /api
$uri = $_SERVER['REQUEST_URI'];
$path = parse_url($uri, PHP_URL_PATH);

// Forzar la lectura de imágenes si Vercel Edge Network falla
if (preg_match('/\.(png|jpg|jpeg|gif|svg|ico)$/i', $path)) {
    $realPath = realpath(__DIR__ . '/..' . $path);
    if ($realPath && file_exists($realPath)) {
        $ext = strtolower(pathinfo($realPath, PATHINFO_EXTENSION));
        $mimes = [
            'png' => 'image/png',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'gif' => 'image/gif',
            'svg' => 'image/svg+xml',
            'ico' => 'image/x-icon'
        ];
        header('Content-Type: ' . ($mimes[$ext] ?? 'application/octet-stream'));
        readfile($realPath);
        exit;
    }
}

// Este archivo simplemente carga nuestro index.php principal de la raíz
require __DIR__ . '/../index.php';
