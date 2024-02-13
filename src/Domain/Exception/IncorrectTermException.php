<?php

namespace App\Domain\Exception;

final class IncorrectTermException extends \Exception
{
    private function __construct(string $message = '', int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    public static function create(float $term): self
    {
        return new self(
            sprintf(
                'Term %s is incorrect.',
                $term
            )
        );
    }
}
