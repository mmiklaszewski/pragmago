<?php

namespace App\Application\Query\CalculateFee;

final readonly class LoanFee implements \JsonSerializable
{
    public function __construct(
        private int $term,
        private float $amount,
        private float $fee
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'amount' => $this->amount,
            'term' => $this->term,
            'fee' => $this->fee,
        ];
    }
}
