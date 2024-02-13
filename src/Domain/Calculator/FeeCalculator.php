<?php

namespace App\Domain\Calculator;

use App\Domain\Model\LoanProposal;

interface FeeCalculator
{
    /**
     * @return float the calculated total fee
     */
    public function calculate(LoanProposal $application): float;
}
