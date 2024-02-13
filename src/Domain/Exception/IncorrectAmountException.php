<?php

namespace App\Domain\Exception;

final class IncorrectAmountException extends \Exception
{
    private function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(float $amount): self
    {
        return new self(
            sprintf(
                'Amount %s is incorrect.',
                $amount
            )
        );
    }
}
