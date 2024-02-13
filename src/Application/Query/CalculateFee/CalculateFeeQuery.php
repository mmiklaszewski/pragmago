<?php

namespace App\Application\Query\CalculateFee;

use App\Domain\Model\LoanProposal;

final readonly class CalculateFeeQuery
{
    public function __construct(public LoanProposal $proposal)
    {
    }
}
