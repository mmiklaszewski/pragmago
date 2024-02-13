<?php

namespace App\Domain\Calculator;

use App\Domain\Model\FeeStructure;
use App\Domain\Model\LoanProposal;
use Brick\Money\Money;

interface Interpolator
{
    public function interpolate(LoanProposal $proposal, FeeStructure $structure): Money;
}
