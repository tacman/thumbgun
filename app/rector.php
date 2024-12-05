<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\CodeQuality\Rector\Class_\InlineConstructorDefaultToPropertyRector;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\Symfony\Set\SymfonySetList;
use Rector\Symfony\Set\SensiolabsSetList;
use Rector\Set\ValueObject\LevelSetList;
use Rector\CodeQuality\Rector\ClassMethod\ReturnTypeFromStrictScalarReturnExprRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictBoolReturnExprRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictNativeFuncCallRector;
use Rector\TypeDeclaration\Rector\ClassMethod\ReturnTypeFromStrictNewArrayRector;


return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/config',
        __DIR__ . '/public',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->withRules(
            [
            ReturnTypeFromStrictNewArrayRector::class,
            InlineConstructorDefaultToPropertyRector::class,
        ])
    // uncomment to reach your current PHP version
     ->withPhpSets(php82: true)
    ->withSets([
        SymfonySetList::SYMFONY_64
    ])
    ->withTypeCoverageLevel(0);

