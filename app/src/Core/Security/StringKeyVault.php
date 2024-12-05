<?php

declare(strict_types=1);

namespace App\Core\Security;

use Traversable;

/** {@inheritDoc} */
final class StringKeyVault implements KeyVaultInterface
{
    public function __construct(private readonly string $keys)
    {
    }

    /** {@inheritDoc} */
    public function getIterator(): Traversable
    {
        foreach (\explode(',', $this->keys) as $key) {
            yield new ImmutableKey($key);
        }
    }
}
