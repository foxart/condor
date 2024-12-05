<?php

namespace common;
enum MenuConfig: string
{
    case USER = 'user';
    case SUMMARY = 'summary';
    case TRANSACTION = 'transaction';
    case API = 'api';
    case EXPORT = 'export';
    case TASK = 'task';

    public function getRoute(): string
    {
        return match ($this) {
            self::USER => RouterConfig::USER_LIST->value,
            self::SUMMARY => RouterConfig::SUMMARY->value,
            self::TRANSACTION => RouterConfig::TRANSACTION->value,
            self::API => RouterConfig::API->value,
            self::EXPORT => RouterConfig::EXPORT->value,
            self::TASK => RouterConfig::TASK->value,
        };
    }

    public function getTitle(): string
    {
        return match ($this) {
            self::USER => 'Users',
            self::SUMMARY => 'Summary',
            self::TRANSACTION => 'Transactions',
            self::API => 'Api',
            self::EXPORT => 'Export',
            self::TASK => 'Task',
        };
    }
}
