<?php

namespace common;
enum MenuConfig: string
{
    case USER = 'user';
    case SUMMARY = 'summary';
    case EXPORT = 'export';
    case TRANSACTION = 'transaction';
    case TASK = 'task';

    public function getRoute(): string
    {
        return match ($this) {
            self::USER => RouterConfig::USER_LIST->value,
            self::TRANSACTION => RouterConfig::TRANSACTION->value,
            self::EXPORT => RouterConfig::EXPORT->value,
            self::SUMMARY => RouterConfig::SUMMARY->value,
            self::TASK => RouterConfig::TASK->value,
        };
    }

    public function getTitle(): string
    {
        return match ($this) {
            self::USER => 'Users',
            self::TRANSACTION => 'Transactions',
            self::SUMMARY => 'Summary',
            self::EXPORT => 'Export',
            self::TASK => 'Task',
        };
    }
}
