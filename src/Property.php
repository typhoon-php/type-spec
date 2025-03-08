<?php

declare(strict_types=1);

namespace Typhoon\TypeSpec;

/**
 * @api
 */
final class Property
{
    /**
     * @param non-empty-string $name
     * @param non-empty-string $nativeType
     * @param ?non-empty-string $phpDocType
     */
    public function __construct(
        public readonly string $name,
        public readonly string $nativeType,
        public readonly ?string $phpDocType = null,
    ) {}
}
