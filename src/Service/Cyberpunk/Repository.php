<?php

namespace Nettivene\Service\Cyberpunk;

class Repository
{
    public function getMovies(bool $isAdmin): array
    {
        $movieSetUno = [
            '2077' => [
                'avengers last endgame', 
                'terminator X Blade runner', 
            ],
            '2045' => [
                'back to the future 1', 
                'back to the future 2', 
                'back to the future 3', 
            ]
        ];

        $movieSetDos = [
            '1980' => [
                'Terminator', 
                'Outrun', 
            ],
            '1990' => [
                'Aliens', 
                'Predator', 
            ]
        ];
        
        return match($isAdmin) {
            true => $movieSetUno,
            false => $movieSetDos,
        };
    }
}

?>