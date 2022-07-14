<?php

namespace Nettivene\Service\Cyberpunk;

use Nettivene\Service\Cyberpunk\Repository;

class Service
{
    function __construct(private Repository $repo, private bool $isAdmin) {}
    
    public function getMovies(): array
    {
        return $this->repo->getMovies($this->isAdmin);
    }
}

?>