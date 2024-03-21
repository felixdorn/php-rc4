<?php

use Felix\RC4\RC4;

if (!function_exists('rc4')) {
    function rc4(string $key, string $data)
    {
        return RC4::rc4($key, $data);
    }
}

// Semantics
if (!function_exists('rc4_encrypt')) {
    function rc4_encrypt(string $key, string $data) {
        return \rc4($key, $data);
    }
}

// Semantics
if (!function_exists('rc4_decrypt')) {
    function rc4_decrypt(string $key, string $data)
    {
        return \rc4($key, $data);
    }
}
