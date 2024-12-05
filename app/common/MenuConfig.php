<?php

namespace common;
enum MenuConfig: string
{
    case HOME = 'home';
    case TRANSACTION = 'transaction';
    case EXPORT = 'export';
    case TASK = 'task';

    public function getRoute(): string
    {
        return match ($this) {
            self::HOME => RouterConfig::USER_LIST->value,
            self::TRANSACTION => RouterConfig::TRANSACTION->value,
            self::EXPORT => RouterConfig::EXPORT->value,
            self::TASK => RouterConfig::TASK->value,
        };
    }

    public function getTitle(): string
    {
        return match ($this) {
            self::HOME => 'Users',
            self::TRANSACTION => 'Transactions',
            self::EXPORT => 'Export',
            self::TASK => 'Task',
        };
    }
}
