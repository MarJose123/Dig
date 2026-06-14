<?php

use MarJose123\Dig\Dig;

it('can build a fluent query', function () {
    $dig = Dig::domain('github.com')
        ->type('TXT')
        ->server('8.8.8.8');

    // Use reflection to check the protected properties
    $reflection = new ReflectionClass($dig);

    $domain = $reflection->getProperty('domain');
    $domain->setAccessible(true);
    expect($domain->getValue($dig))->toBe('github.com');

    $type = $reflection->getProperty('type');
    $type->setAccessible(true);
    expect($type->getValue($dig))->toBe('TXT');

    $server = $reflection->getProperty('server');
    $server->setAccessible(true);
    expect($server->getValue($dig))->toBe('8.8.8.8');
});

it('defaults to an A record', function () {
    $dig = Dig::domain('google.com');

    $reflection = new ReflectionClass($dig);

    $type = $reflection->getProperty('type');
    $type->setAccessible(true);

    expect($type->getValue($dig))->toBe('A');
});
