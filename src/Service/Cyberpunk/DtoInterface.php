<?php

namespace Nettivene\Service\Cyberpunk;

interface DtoInterface {
    public function formatMovieResponse(array $movieList): array;
}

?>