<?php

namespace common;
enum RouterConfig: string
{
    case USER_LIST = '/';
    case USER = '/user';
    case TRANSACTION = '/transaction';
    case SUMMARY = '/summary';
    case EXPORT = '/export';
    case TASK = '/task';

    public function getTitle(): string
    {
        return match ($this) {
            self::USER_LIST => 'Users',
            self::USER => 'User details / Transaction history',
            self::TRANSACTION => 'Transactions',
            self::SUMMARY => 'Summary',
            self::EXPORT => 'Export',
            self::TASK => 'Task',
        };
    }
}
