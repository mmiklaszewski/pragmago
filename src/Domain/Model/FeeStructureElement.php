<?php

namespace App\Domain\Model;

use Brick\Money\Money;

final readonly class FeeStructureElement
{
    public function __construct(public Money $amount, public Money $fee)
    {
    }
}
