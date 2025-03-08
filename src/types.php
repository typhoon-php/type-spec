<?php

declare(strict_types=1);

namespace Typhoon\TypeSpec;

/**
 * @api
 * @return \Generator<int, Type>
 */
function types(): \Generator
{
    $typeClass = 'Typhoon\Type\Type';

    // trivial
    yield new Type('never', 'never');
    yield new Type('void', 'void');
    yield new Type('null', 'null');
    yield new Type('false', 'false');
    yield new Type('true', 'true');
    yield new Type('intValue', 'int', [new Property('value', 'int')]);
    yield new Type('floatValue', 'float', [new Property('value', 'float')]);
    yield new Type('stringValue', 'string', [new Property('value', 'string')]);
    yield new Type('string', 'string');
    yield new Type('resource', 'resource');
    // compound
    yield new Type('intRange', 'int', [new Property('minType', $typeClass, 'Type<int>'), new Property('maxType', $typeClass, 'Type<int>')]);
    yield new Type('floatRange', 'float', [new Property('minType', $typeClass, 'Type<float>'), new Property('maxType', $typeClass, 'Type<float>')]);
    yield new Type('union', 'mixed', [new Property('types', 'array', 'non-empty-list<Type>')]);
    yield new Type('intersection', 'mixed', [new Property('types', 'array', 'non-empty-list<Type>')]);
    yield new Type('not', 'mixed', [new Property('type', $typeClass)]);
    yield new Type('list', 'list<mixed>', [new Property('valueType', $typeClass), new Property('elements', 'array', 'array<non-negative-int, ArrayElement>')]);
    yield new Type('array', 'array<mixed>', [new Property('keyType', $typeClass, 'Type<array-key>'), new Property('valueType', $typeClass), new Property('elements', 'array', 'array<ArrayElement>')]);
    yield new Type('classString', 'class-string<TObject>', [new Property('objectType', $typeClass, 'Type<TObject>')], [new Template('TObject', 'object', 'object')]);
    yield new Type('object', 'object', [new Property('properties', 'array', 'array<non-empty-string, Property>')]);
    yield new Type('callable', 'callable', [new Property('templates', 'array', 'list<TemplateT>'), new Property('parameters', 'array', 'list<Parameter>'), new Property('returnType', $typeClass, 'Type<mixed>')]);
    // reference
    yield new Type('template', 'mixed', [new Property('name', 'string', 'non-empty-string'), new Property('variance', 'Variance'), new Property('upperBound', $typeClass)]);
    yield new Type('constant', 'mixed', [new Property('name', 'string', 'non-empty-string')]);
    yield new Type('classConstant', 'mixed', [new Property('objectType', $typeClass, 'Type<object>'), new Property('name', 'string', 'non-empty-string')]);
    yield new Type('classConstantMask', 'mixed', [new Property('objectType', $typeClass, 'Type<object>'), new Property('namePrefix', 'string')]);
    yield new Type('namedObject', 'TObject', [new Property('name', 'string', 'class-string<TObject>'), new Property('templateArguments', 'array', 'list<Type>')], [new Template('TObject', 'object', 'object')]);
    yield new Type('alias', 'mixed', [new Property('classType', $typeClass, 'Type<object>'), new Property('name', 'string', 'non-empty-string'), new Property('templateArguments', 'array', 'list<Type>')]);
    yield new Type('self', 'TObject', [new Property('resolvedObjectType', '?' . $typeClass, '?Type<TObject>'), new Property('templateArguments', 'array', 'list<Type>')], [new Template('TObject', 'object', 'object')]);
    yield new Type('parent', 'TObject', [new Property('resolvedObjectType', '?' . $typeClass, '?Type<TObject>'), new Property('templateArguments', 'array', 'list<Type>')], [new Template('TObject', 'object', 'object')]);
    yield new Type('static', 'TObject', [new Property('resolvedObjectType', '?' . $typeClass, '?Type<TObject>'), new Property('templateArguments', 'array', 'list<Type>')], [new Template('TObject', 'object', 'object')]);
}
