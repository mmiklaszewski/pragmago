<?php

namespace App\Domain\Repository;

use App\Domain\Model\FeeStructure;

interface FeeStructureRepository
{
    public function getStructureForTerm(int $term): FeeStructure;
}
