<?php

namespace App\Transformer;

abstract class AbstractList
{
    public const LIST = [];

    public static function toHimed(string $element): string
    {
        return self::LIST[$element] ?? '';
    }
}