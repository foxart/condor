<?php

namespace common;
enum RouterConfig: string
{
    case HOME = '/';
    case USER = '/user';
    case TRANSACTION = '/transaction';
    case EXPORT = '/export';

    public function getTitle(): string
    {
        return match ($this) {
            self::HOME => 'User list',
            self::USER => 'Users',
            self::TRANSACTION => 'Transactions',
            self::EXPORT => 'Export',
        };
    }

}
