<?php

namespace Felix\RC4;

class RC4
{
    private static $fake = null;

    public static function rc4(string $rawKey, string $rawData): string
    {
        if (static::$fake) {
            return (static::$fake)($rawKey, $rawData);
        }

        $state = new \SplFixedArray(256);
        for ($i = 0; $i < 256; $i++) {
            $state[$i] = $i;
        }

        $j = 0;
        for ($i = 0; $i < 256; $i++) {
            $j = ($j + $state[$i] + ord($rawKey[$i % strlen($rawKey)])) % 256;

            // Swap
            $tmp = $state[$i];
            $state[$i] = $state[$j];
            $state[$j] = $tmp;
            // End swap
        }

        $i = 0;
        $j = 0;
        $text = '';
        for ($y = 0; $y < strlen($rawData); $y++) {
            $i = ($i + 1) % 256;
            $j = ($j + $state[$i]) % 256;


            // Swap
            $tmp = $state[$i];
            $state[$i] = $state[$j];
            $state[$j] = $tmp;
            // End Swap

            $text .= $rawData[$y] ^ chr($state[($state[$i] + $state[$j]) % 256]);
        }

        return $text;
    }

    public static function fake(callable $fake = null) {
       static::$fake = $fake;
    }
}
