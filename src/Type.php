<?php

declare(strict_types=1);

namespace Typhoon\TypeSpec;

/**
 * @api
 */
final class Type
{
    /**
     * @param non-empty-string $name
     * @param non-empty-string $phpDocType
     * @param list<Property> $properties
     * @param list<Template> $templates
     */
    public function __construct(
        public readonly string $name,
        public readonly string $phpDocType,
        public readonly array $properties = [],
        public readonly array $templates = [],
    ) {}

    /**
     * @return non-empty-string
     */
    public function shortClassName(): string
    {
        return ucfirst($this->name) . 'T';
    }

    /**
     * @return non-empty-string
     */
    public function className(): string
    {
        return 'Typhoon\Type\\' . $this->shortClassName();
    }
}
