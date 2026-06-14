<?php

use MarJose123\Dig\DigResponse;

it('can parse a successful A record output', function () {
    // Mocked raw output from the dig command
    $rawOutput = "google.com.             300     IN      A       142.250.190.46\n";

    $response = new DigResponse($rawOutput, '', 0);

    expect($response->isSuccessful())->toBeTrue();
    expect($response->records())->toHaveCount(1);

    $record = $response->records()->first();

    expect($record)
        ->toHaveKey('host', 'google.com.')
        ->toHaveKey('ttl', 300)
        ->toHaveKey('class', 'IN')
        ->toHaveKey('type', 'A')
        ->toHaveKey('value', '142.250.190.46');
});

it('can parse TXT records with spaces', function () {
    // Mocked raw output for a TXT record (which often contains spaces)
    $rawOutput = "github.com.             60      IN      TXT     \"v=spf1 include:_spf.google.com ~all\"\n";

    $response = new DigResponse($rawOutput, '', 0);

    $record = $response->records()->first();

    expect($record)
        ->toHaveKey('type', 'TXT')
        ->toHaveKey('value', '"v=spf1 include:_spf.google.com ~all"');
});

it('handles failed commands gracefully', function () {
    // Simulate a command failure (exit code 1)
    $response = new DigResponse('', 'connection timed out', 1);

    expect($response->isSuccessful())->toBeFalse();
    expect($response->records()->isEmpty())->toBeTrue();

    // Assert against the new error() method
    expect($response->error())->toBe('connection timed out');

    // The raw output should legitimately be empty
    expect($response->raw())->toBe('');
});

it('handles empty successful responses', function () {
    // Simulate a success where no records were found
    $response = new DigResponse(" \n ", '', 0);

    expect($response->isSuccessful())->toBeTrue();
    expect($response->records()->isEmpty())->toBeTrue();
});
