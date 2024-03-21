<?php

namespace Felix\RC4;

class RC4
{
    /** @var callable|null */
    protected static $fake = null;

    public static function rc4(string $key, string $data): string
    {
        if (static::$fake) {
            return (static::$fake)($key, $data);
        }

        $state = new \SplFixedArray(256);
        for ($i = 0; $i < 256; $i++) {
            $state[$i] = $i;
        }

        $j = 0;
        for ($i = 0; $i < 256; $i++) {
            $j = ($j + $state[$i] + ord($key[$i % strlen($key)])) % 256;

            // Swap
            $tmp = $state[$i];
            $state[$i] = $state[$j];
            $state[$j] = $tmp;
            // End swap
        }

        $i = 0;
        $j = 0;
        $text = '';
        for ($y = 0; $y < strlen($data); $y++) {
            $i = ($i + 1) % 256;
            $j = ($j + $state[$i]) % 256;

            // Swap
            $tmp = $state[$i];
            $state[$i] = $state[$j];
            $state[$j] = $tmp;
            // End Swap

            $text .= $data[$y] ^ chr($state[($state[$i] + $state[$j]) % 256]);
        }

        return $text;
    }

    public static function fake(?callable $fake = null): void
    {
        static::$fake = $fake;
    }
}
