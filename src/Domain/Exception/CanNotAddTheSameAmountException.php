<?php

namespace App\Domain\Exception;

use Brick\Money\Money;

class CanNotAddTheSameAmountException extends \Exception
{
    private function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(Money $amount): self
    {
        return new self(
            sprintf(
                'Can not add the same amount %s.',
                $amount->getAmount()->jsonSerialize()
            )
        );
    }
}
