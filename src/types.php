<?php

declare(strict_types=1);

namespace Typhoon\TypeSpec;

/**
 * @api
 * @return non-empty-list<Type>
 */
function types(): array
{
    $typeClass = 'Typhoon\Type\Type';

    /** @var ?non-empty-list<Type> */
    static $types = null;

    return $types ??= [
        // trivial
        new Type('never', 'never'),
        new Type('void', 'void'),
        new Type('null', 'null'),
        new Type('false', 'false'),
        new Type('true', 'true'),
        new Type('intValue', 'int', [new Property('value', 'int')]),
        new Type('floatValue', 'float', [new Property('value', 'float')]),
        new Type('stringValue', 'string', [new Property('value', 'string')]),
        new Type('string', 'string'),
        new Type('resource', 'resource'),
        // compound
        new Type('intRange', 'int', [new Property('minType', $typeClass, 'Type<int>'), new Property('maxType', $typeClass, 'Type<int>')]),
        new Type('floatRange', 'float', [new Property('minType', $typeClass, 'Type<float>'), new Property('maxType', $typeClass, 'Type<float>')]),
        new Type('union', 'mixed', [new Property('types', 'array', 'non-empty-list<Type>')]),
        new Type('intersection', 'mixed', [new Property('types', 'array', 'non-empty-list<Type>')]),
        new Type('not', 'mixed', [new Property('type', $typeClass)]),
        new Type('list', 'list<mixed>', [new Property('valueType', $typeClass), new Property('elements', 'array', 'array<non-negative-int, ArrayElement>')]),
        new Type('array', 'array<mixed>', [new Property('keyType', $typeClass, 'Type<array-key>'), new Property('valueType', $typeClass), new Property('elements', 'array', 'array<ArrayElement>')]),
        new Type('classString', 'class-string<TObject>', [new Property('objectType', $typeClass, 'Type<TObject>')], [new Template('TObject', 'object', 'object')]),
        new Type('object', 'object', [new Property('properties', 'array', 'array<non-empty-string, Property>')]),
        new Type('callable', 'callable', [new Property('templates', 'array', 'list<TemplateT>'), new Property('parameters', 'array', 'list<Parameter>'), new Property('returnType', $typeClass, 'Type<mixed>')]),
        // reference
        new Type('template', 'mixed', [new Property('name', 'string', 'non-empty-string'), new Property('variance', 'Typhoon\Type\Variance'), new Property('upperBound', $typeClass)]),
        new Type('constant', 'mixed', [new Property('name', 'string', 'non-empty-string')]),
        new Type('classConstant', 'mixed', [new Property('objectType', $typeClass, 'Type<object>'), new Property('name', 'string', 'non-empty-string')]),
        new Type('classConstantMask', 'mixed', [new Property('objectType', $typeClass, 'Type<object>'), new Property('namePrefix', 'string')]),
        new Type('namedObject', 'TObject', [new Property('name', 'string', 'class-string<TObject>'), new Property('templateArguments', 'array', 'list<Type>')], [new Template('TObject', 'object', 'object')]),
        new Type('alias', 'mixed', [new Property('classType', $typeClass, 'Type<object>'), new Property('name', 'string', 'non-empty-string'), new Property('templateArguments', 'array', 'list<Type>')]),
        new Type('self', 'TObject', [new Property('resolvedObjectType', '?' . $typeClass, '?Type<TObject>'), new Property('templateArguments', 'array', 'list<Type>')], [new Template('TObject', 'object', 'object')]),
        new Type('parent', 'TObject', [new Property('resolvedObjectType', '?' . $typeClass, '?Type<TObject>'), new Property('templateArguments', 'array', 'list<Type>')], [new Template('TObject', 'object', 'object')]),
        new Type('static', 'TObject', [new Property('resolvedObjectType', '?' . $typeClass, '?Type<TObject>'), new Property('templateArguments', 'array', 'list<Type>')], [new Template('TObject', 'object', 'object')]),
    ];
}
