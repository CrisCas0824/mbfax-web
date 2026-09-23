<?php
/**
 * Controlador de Guías Meta (Personajes, Armas y Mascotas)
 * Proyecto MB FAX - Free Fire Community
 */

class GuiaController {
    public function index() {
        $pageTitle = "Guías META Free Fire - Mejores Personajes, Armas y Mascotas";

        // 1. PERSONAJES META ENRIQUECIDOS POR ROL Y TIER
        $personajesActivos = [
            [
                'nombre' => 'Tatsuya',
                'rol' => 'Corredor',
                'tier' => 'SS',
                'habilidad' => 'Impulso Rebelde',
                'cooldown' => '45s',
                'momento_uso' => 'En medio del rush para romper defensas enemigas, flanquear o escapar rápidamente de la zona segura.',
                'descripcion' => 'Carga hacia adelante a gran velocidad. Se acumula hasta 2 usos consecutivos.',
                'combos' => ['Hayato', 'Kelly', 'Luna'],
                'imagen' => 'https://images.unsplash.com/photo-1511512578047-dfb367046420?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Alok',
                'rol' => 'Soporte',
                'tier' => 'S',
                'habilidad' => 'Ritmo Brutal',
                'cooldown' => '45s',
                'momento_uso' => 'Al iniciar un avance en equipo o al rotar en campo abierto para ganar velocidad y curación continua.',
                'descripcion' => 'Crea un aura de 5m que aumenta la velocidad un 15% y cura 3 PV/s por 10s.',
                'combos' => ['Kelly', 'Maxim', 'Moco'],
                'imagen' => 'https://images.unsplash.com/photo-1563089145-599997674d42?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Chrono',
                'rol' => 'Soporte',
                'tier' => 'S',
                'habilidad' => 'Sintonía del Tiempo',
                'cooldown' => '110s',
                'momento_uso' => 'Cuando recibes fuego cruzado al descubierto o al revivir a un compañero sin paredes Gloo.',
                'descripcion' => 'Crea un escudo esférico insuperable que bloquea 800 de daño.',
                'combos' => ['Maxim', 'Hayato', 'Jota'],
                'imagen' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Homer',
                'rol' => 'Tirador',
                'tier' => 'S',
                'habilidad' => 'Ojos de Asesino',
                'cooldown' => '90s',
                'momento_uso' => 'Al detectar enemigos agrupados en edificios o casas antes de iniciar la agresión.',
                'descripcion' => 'Lanza un dron al enemigo más cercano a 100m, creando una explosión que reduce velocidad de disparo y movimiento.',
                'combos' => ['Marcell', 'Moco', 'Shirou'],
                'imagen' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Iris',
                'rol' => 'Francotirador',
                'tier' => 'A',
                'habilidad' => 'Muro de Espías',
                'cooldown' => '60s',
                'momento_uso' => 'Cuando los enemigos se esconden detrás de paredes Gloo para dispararles a través de ellas.',
                'descripcion' => 'Permite atacar a través de hasta 5 paredes Gloo e infligir daño directo a los enemigos tras ellas.',
                'combos' => ['Rafael', 'Laura', 'Moco'],
                'imagen' => 'https://images.unsplash.com/photo-1508614589041-895b88991e3e?auto=format&fit=crop&w=400&q=80'
            ]
        ];

        $personajesPasivos = [
            [
                'nombre' => 'Hayato Renacido',
                'rol' => 'Corredor',
                'tier' => 'SS',
                'habilidad' => 'Bushido / Artillería',
                'sinergia' => 'Perfecto con Tatsuya y Alok para duelos cara a cara.',
                'descripcion' => 'Aumenta la penetración de armadura un 10% por cada 10% de PV perdidos.',
                'imagen' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Kelly Renacida',
                'rol' => 'Corredor',
                'tier' => 'S',
                'habilidad' => 'Carrera Mortal',
                'sinergia' => 'Indispensable en cualquier combo por movilidad y primer tiro devastador.',
                'descripcion' => 'Aumenta velocidad de carrera 6% y añade 106% de daño al primer disparo tras correr 4s.',
                'imagen' => 'https://images.unsplash.com/photo-1579373903781-fd5c0c30c4cd?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Moco Renacida',
                'rol' => 'Francotirador',
                'tier' => 'S',
                'habilidad' => 'Ojo de Hacker',
                'sinergia' => 'Brinda visión táctica a todo el equipo en clasificatoria.',
                'descripcion' => 'Marca la posición del enemigo impactado durante 5 segundos para tus aliados.',
                'imagen' => 'https://images.unsplash.com/photo-1526374965328-7f61d4dc18c5?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Alvaro Renacido',
                'rol' => 'Granadero',
                'tier' => 'SS',
                'habilidad' => 'Arte de la Demolición',
                'sinergia' => 'Combina con Beaston para lanzar granadas divididas a gran distancia.',
                'descripcion' => 'Aumenta el daño de armas explosivas 20% y las granadas se dividen en 3 submarcas.',
                'imagen' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=400&q=80'
            ]
        ];

        // 2. ARMAS CATEGORIZADAS Y COMBOS RECOMENDADOS
        $armasLargoAlcance = [
            [
                'nombre' => 'Groza',
                'tipo' => 'Rifle de Asalto (AR)',
                'tier' => 'SS',
                'dano' => 61,
                'cadencia' => 58,
                'rango' => 77,
                'recarga' => 48,
                'descripcion' => 'El arma más balanceada a larga y media distancia, con daño elevado y retroceso controlado.',
                'imagen' => 'https://images.unsplash.com/photo-1595590424283-b8f17842773f?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'AC80',
                'tipo' => 'Rifle de Tirador (Marksman)',
                'tier' => 'SS',
                'dano' => 71,
                'cadencia' => 36,
                'rango' => 78,
                'recarga' => 41,
                'descripcion' => 'Dos disparos consecutivos causan daño crítico masivo a cascos y chalecos.',
                'imagen' => 'https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'AWM',
                'tipo' => 'Francotirador (Sniper)',
                'tier' => 'S',
                'dano' => 90,
                'cadencia' => 27,
                'rango' => 91,
                'recarga' => 34,
                'descripcion' => 'Potencia pura a larga distancia. Invalida cascos de nivel 3 con tiro a la cabeza.',
                'imagen' => 'https://images.unsplash.com/photo-1508614589041-895b88991e3e?auto=format&fit=crop&w=400&q=80'
            ]
        ];

        $armasCortoAlcance = [
            [
                'nombre' => 'M1887 (Dos Tiros)',
                'tipo' => 'Escopeta (SG)',
                'tier' => 'SS',
                'dano' => 100,
                'cadencia' => 42,
                'rango' => 21,
                'recarga' => 55,
                'descripcion' => 'La reina del enfrentamiento cuerpo a cuerpo. Dos cartuchos de daño letal.',
                'imagen' => 'https://images.unsplash.com/photo-1518709268805-4e9042af9f23?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'MP40',
                'tipo' => 'Subfusil (SMG)',
                'tier' => 'S',
                'dano' => 48,
                'cadencia' => 83,
                'rango' => 22,
                'recarga' => 48,
                'descripcion' => 'Cadencia infernal para destrozar al enemigo en distancias cortas.',
                'imagen' => 'https://images.unsplash.com/photo-1584036561566-baf8f5f1b144?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'USP Doble',
                'tipo' => 'Pistola Secundaria',
                'tier' => 'A',
                'dano' => 45,
                'cadencia' => 60,
                'rango' => 28,
                'recarga' => 50,
                'descripcion' => 'Secundaria ágil para rematar enemigos cuando te quedas sin balas en el arma principal.',
                'imagen' => 'https://images.unsplash.com/photo-1595590424283-b8f17842773f?auto=format&fit=crop&w=400&q=80'
            ]
        ];

        $combosRecomendados = [
            [
                'modo' => 'Solo',
                'rol' => 'Rusher Agresivo',
                'largo' => 'Groza III',
                'corto' => 'M1887',
                'pistola' => 'M500',
                'ventaja' => 'Permite duelos 1v1 limpios con máxima potencia tanto a distancia como al romper pared.'
            ],
            [
                'modo' => 'Dúo',
                'rol' => 'Tirador de Cobertura',
                'largo' => 'AC80 / Woodpecker',
                'corto' => 'MP40',
                'pistola' => 'USP Doble',
                'ventaja' => 'Excelente penetración para dar soporte mientras tu compañero hace el rusheo.'
            ],
            [
                'modo' => 'Escuadra',
                'rol' => 'Francotirador / Soporte',
                'largo' => 'AWM / Barrett',
                'corto' => 'UMP',
                'pistola' => 'Desert Eagle',
                'ventaja' => 'Control total del mapa y derribos a distancia para abrir aberturas en la escuadra rival.'
            ]
        ];

        // 3. MASCOTAS CLASIFICADAS DE MEJOR A PEOR
        $mascotas = [
            [
                'nombre' => 'Rockie',
                'tier' => 'SS',
                'habilidad' => 'Relajación Total',
                'efecto' => 'Reduce el enfriamiento de la habilidad activa equipada un 15%.',
                'situacion' => 'Indispensable con Tatsuya, Alok o Chrono para usar la habilidad activa constantemente.',
                'imagen' => 'https://images.unsplash.com/photo-1543466835-00a7907e9de1?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Mr. Waggor',
                'tier' => 'SS',
                'habilidad' => 'Producción de Hielo',
                'efecto' => 'Genera 1 pared Gloo cada 100 segundos cuando tienes menos de 2 en inventario.',
                'situacion' => 'Clave en fases finales de la zona para asegurar cobertura infinita.',
                'imagen' => 'https://images.unsplash.com/photo-1517849845537-4d257902454a?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Beaston',
                'tier' => 'S',
                'habilidad' => 'Mano Firme',
                'efecto' => 'Aumenta la distancia de lanzamiento de paredes Gloo y granadas un 30%.',
                'situacion' => 'Ideal para el rol de Granadero en partidas de escuadra.',
                'imagen' => 'https://images.unsplash.com/photo-1561037404-61cd46aa615b?auto=format&fit=crop&w=400&q=80'
            ],
            [
                'nombre' => 'Poring',
                'tier' => 'A',
                'habilidad' => 'Remiendo & Reparación',
                'efecto' => 'Incrementa la durabilidad del casco y chaleco evitando que se destruyan.',
                'situacion' => 'Útil para mantener armadura nivel 3/4 intacta durante constantes enfrentamientos.',
                'imagen' => 'https://images.unsplash.com/photo-1583511655857-d19b40a7a54e?auto=format&fit=crop&w=400&q=80'
            ]
        ];

        require_once __DIR__ . '/../views/guias/index.php';
    }
}
