<?php // 2024-09-26 https://stackoverflow.com/questions/71036384/create-enum-from-name-in-php

declare(strict_types=1);

namespace Shared\Traits;

trait EnumFromName
{
    /**
     * To mirror backed enums tryFrom - returns null on failed match.
     */
    public static function tryFromName(string $name): ?static
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case;
            }
        }

        return null;
    }

    /**
     * To mirror backed enums from - throws ValueError on failed match.
     */
    public static function fromName(string $name): static
    {
        if (! $case = self::tryFromName($name)) {
            throw new \InvalidArgumentException($name.' is not a valid case for enum '.self::class);
        }

        return $case;
    }

    public static function getValue(string $name): ?string
    {
        return static::tryFromName($name)?->value;
    }

    public static function getNameByString(string $string)
    {
        $name = static::getEnumByString($string)->name;
    }
}
