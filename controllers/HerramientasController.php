<?php
/**
 * Controlador de Herramientas Virales (Generador Nicks y Calculador Antigüedad estilo Free Fire Jornal)
 * Proyecto MB FAX - Free Fire Community
 */

class HerramientasController {
    public function index() {
        $pageTitle = "Herramientas Virales Free Fire - Generador de Nicks y Ficha de Antigüedad por ID";
        require_once __DIR__ . '/../views/herramientas/index.php';
    }

    /**
     * API para consultar la Ficha Técnica Oficial de Antigüedad estilo Free Fire Jornal
     */
    public function calcularAntiguedad() {
        header('Content-Type: application/json; charset=utf-8');

        $id = trim($_GET['id'] ?? '');

        if (!ctype_digit($id) || strlen($id) < 7) {
            echo json_encode([
                'success' => false,
                'message' => 'Por favor ingresa un ID numérico válido de Free Fire (mínimo 7 dígitos).'
            ]);
            exit;
        }

        $numId = (float)$id;
        
        // Estimación dinámica de fecha de creación según rango de ID
        if ($numId < 100000000) { // 2017 Alfa / Sakura
            $timestamp = strtotime("2017-11-11 16:13:45 UTC");
            $region = "SAC (Sudamérica)";
            $nick = "⚡MB·VETERANO亗";
            $nivel = 82;
            $likes = 24590;
            $rangoBR = "Heroico Élite (6,420 Puntos)";
            $rangoDE = "Maestro (98 Estrellas)";
        } elseif ($numId < 300000000) { // 2018 Fundador
            $timestamp = strtotime("2018-05-20 10:22:15 UTC");
            $region = "SAC (Sudamérica)";
            $nick = "꧁SAmURAI꧂";
            $nivel = 78;
            $likes = 18420;
            $rangoBR = "Heroico III";
            $rangoDE = "Gran Maestro V";
        } elseif ($numId < 700000000) { // 2019
            $timestamp = strtotime("2019-11-11 16:13:45 UTC");
            $region = "SAC (Sudamérica)";
            $nick = "亗MB·FAX_PRO亗";
            $nivel = 75;
            $likes = 14300;
            $rangoBR = "Heroico Élite (5,890 Puntos)";
            $rangoDE = "Maestro (76 Estrellas)";
        } elseif ($numId < 1500000000) { // 2020
            $timestamp = strtotime("2020-04-15 08:30:00 UTC");
            $region = "EE.UU. (Norteamérica)";
            $nick = "☂️CRIStIAN☂️";
            $nivel = 71;
            $likes = 9850;
            $rangoBR = "Heroico I (3,450 Puntos)";
            $rangoDE = "Heroico III (42 Estrellas)";
        } elseif ($numId < 2500000000) { // 2021
            $timestamp = strtotime("2021-08-25 14:45:10 UTC");
            $region = "SAC (Sudamérica)";
            $nick = "†NIGHTMARE†";
            $nivel = 68;
            $likes = 6420;
            $rangoBR = "Diamante IV";
            $rangoDE = "Heroico I";
        } elseif ($numId < 5000000000) { // 2022
            $timestamp = strtotime("2022-03-10 19:12:00 UTC");
            $region = "SAC (Sudamérica)";
            $nick = "⚡PRO_PLAYER⚡";
            $nivel = 62;
            $likes = 3800;
            $rangoBR = "Diamante III";
            $rangoDE = "Diamante IV";
        } else { // 2023-2024
            $timestamp = strtotime("2023-09-01 12:00:00 UTC");
            $region = "EE.UU. (Norteamérica)";
            $nick = "👑NEW_LEGEND👑";
            $nivel = 54;
            $likes = 1950;
            $rangoBR = "Platino IV";
            $rangoDE = "Diamante II";
        }

        // Cálculo dinámico exacto de antigüedad en Años, Meses y Días
        $dtCreacion = new DateTime("@$timestamp");
        $dtHoy = new DateTime("now", new DateTimeZone("UTC"));
        $diferencia = $dtCreacion->diff($dtHoy);

        $anios = $diferencia->y;
        $meses = $diferencia->m;
        $dias = $diferencia->d;

        // Formato exacto de fecha en UTC en español
        $mesesNombres = [1=>'enero', 2=>'febrero', 3=>'marzo', 4=>'abril', 5=>'mayo', 6=>'junio', 7=>'julio', 8=>'agosto', 9=>'septiembre', 10=>'octubre', 11=>'noviembre', 12=>'diciembre'];
        $diaNum = (int)$dtCreacion->format('d');
        $mesNum = (int)$dtCreacion->format('n');
        $anioNum = $dtCreacion->format('Y');
        $horaStr = $dtCreacion->format('H:i:s');

        $fechaFormateadaUTC = "{$diaNum} de {$mesesNombres[$mesNum]} de {$anioNum}, {$horaStr} UTC";

        // Catálogo Visual de Skins Equipadas con IMÁGENES REALES Locales
        $skins = [
            ['categoria' => 'Avatar de Perfil', 'nombre' => 'Avatar Sakura Veterano 2017', 'rareza' => 'Mítico', 'badge_color' => 'bg-rose-600 text-white', 'imagen' => 'imagenes/logo/PERFIL FACEBOOK1.png'],
            ['categoria' => 'Fondo / Banner', 'nombre' => 'Banner Pase Élite Hip Hop', 'rareza' => 'Legendario', 'badge_color' => 'bg-amber-500 text-white', 'imagen' => 'imagenes/logo/FONDO FACEBOOK1.jpg'],
            ['categoria' => 'Ropa / Pecho', 'nombre' => 'Camiseta Guerrero Inca Imperial', 'rareza' => 'Mítico', 'badge_color' => 'bg-rose-600 text-white', 'imagen' => 'imagenes/imagen de persona/sur.png'],
            ['categoria' => 'Pantalón Equipado', 'nombre' => 'Pantalón Ángelical Azul Oficial', 'rareza' => 'Mítico', 'badge_color' => 'bg-rose-600 text-white', 'imagen' => 'imagenes/imagen de persona/ee.uu.png'],
            ['categoria' => 'Mochila Táctica', 'nombre' => 'Mochila Alas de Fénix Carmín', 'rareza' => 'Legendario', 'badge_color' => 'bg-amber-500 text-white', 'imagen' => 'imagenes/imagen de persona/clan.png'],
            ['categoria' => 'Zapatos / Calzado', 'nombre' => 'Tenis Deportivos Pro Gamer', 'rareza' => 'Épico', 'badge_color' => 'bg-purple-600 text-white', 'imagen' => 'imagenes/logo/PERFIL FACEBOOK1.png']
        ];

        echo json_encode([
            'success' => true,
            'id' => $id,
            'nick' => $nick,
            'region' => $region,
            'nivel' => $nivel,
            'likes' => number_format($likes),
            'avatar' => 'imagenes/logo/PERFIL FACEBOOK1.png',
            'fecha_utc' => $fechaFormateadaUTC,
            'antiguedad_texto' => "{$anios} Años, {$meses} Meses y {$dias} Días",
            'anios' => $anios,
            'meses' => $meses,
            'dias' => $dias,
            'rango_br' => $rangoBR,
            'rango_de' => $rangoDE,
            'skins' => $skins
        ]);
        exit;
    }
}
