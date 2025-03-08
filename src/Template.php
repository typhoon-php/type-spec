<?php

declare(strict_types=1);

namespace Typhoon\TypeSpec;

/**
 * @api
 */
final class Template
{
    /**
     * @param non-empty-string $name
     * @param ?non-empty-string $of
     * @param ?non-empty-string $default
     */
    public function __construct(
        public readonly string $name,
        public readonly ?string $of = null,
        public readonly ?string $default = null,
    ) {}
}
