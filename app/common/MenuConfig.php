<?php

namespace common;
enum MenuConfig: string
{
    case HOME = 'home';
    case TRANSACTION = 'transaction';
    case EXPORT = 'export';

    public function getRoute(): string
    {
        return match ($this) {
            self::HOME => RouterConfig::HOME->value,
            self::TRANSACTION => RouterConfig::TRANSACTION->value,
            self::EXPORT => RouterConfig::EXPORT->value,
        };
    }

    public function getTitle(): string
    {
        return match ($this) {
            self::HOME => 'Users',
            self::TRANSACTION => 'Transactions',
            self::EXPORT => 'Export',
        };
    }
}
