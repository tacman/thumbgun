<?php

declare(strict_types=1);

namespace App\Core\Security;

/**
 * @psalm-pure
 */
final class ImmutableKey implements KeyInterface
{
    public function __construct(private readonly string $key)
    {
    }

    public function __toString(): string
    {
        return $this->key;
    }
}
