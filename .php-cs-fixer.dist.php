<?php

$finder = PhpCsFixer\Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/public',
        __DIR__ . '/tests/Unit',
        __DIR__ . '/tests/Functional',
        __DIR__ . '/tests/Acceptance',
    ]);

return (new PhpCsFixer\Config())
    ->setRules([
        '@PER-CS' => true,
    ])
    ->setFinder($finder);
