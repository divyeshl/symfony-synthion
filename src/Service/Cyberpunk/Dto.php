<?php

namespace Nettivene\Service\Cyberpunk;

class Dto implements DtoInterface
{
    public function formatMovieResponse(array $movieList): array
    {
        array_walk($movieList, function(&$movies) {
            $movies = implode(', ', $movies);
        });
        return $movieList;
    }
}

?>