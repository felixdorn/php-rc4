<?php

test('rc4 is involutive', function () {
    $secret = random_bytes(16);
    $bytes = random_bytes(64);
    $enc = \Felix\RC4\RC4::rc4($secret, $bytes);
    $dec = \Felix\RC4\RC4::rc4($secret, $enc);

    expect($dec)->toBe($bytes);
});

it('can be mocked', function () {
    \Felix\RC4\RC4::fake(function () {
        return 'hey';
    });
    $secret = random_bytes(16);
    $bytes = random_bytes(64);
    $enc = \Felix\RC4\RC4::rc4($secret, $bytes);
    $dec = \Felix\RC4\RC4::rc4($secret, $enc);
    expect($enc)->toBe('hey');
    expect($dec)->toBe('hey');

    // Removes the fake.
    \Felix\RC4\RC4::fake();
});
