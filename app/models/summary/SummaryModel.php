<?php

namespace models\summary;

use DateTime;
use models\transaction\TransactionListIterator;
use models\user\UserDto;
use models\user\UserListIterator;

class SummaryModel
{
    public function getByCountry(TransactionListIterator $transactions, UserListIterator $userList): SummaryListIterator
    {
        $result = [];
        foreach ($transactions as $transaction) {
            $user = $userList->find(function (UserDto $item) use ($transaction) {
                return $item->id === $transaction->getUserId();
            });
            $countryId = $user->getCountry()
                ->getId();
            if (!isset($result[$countryId])) {
                $result[$countryId] = new SummaryDto([
                    'user' => $user,
                    'sum' => 0,
                    'count' => 0,
                ]);
            }
            $result[$countryId]->incSum($transaction->getAmount());
            $result[$countryId]->incCount(1);
        }
        return new SummaryListIterator($result);
    }

    public function getByUser(TransactionListIterator $transactions, UserListIterator $userList): SummaryByUserListIterator
    {
        $array = [];
        foreach ($transactions as $transaction) {
            $user = $userList->find(function (UserDto $item) use ($transaction) {
                return $item->id === $transaction->getUserId();
            });
            $userId = $transaction->getUserId();
            // Assume transaction date is a DateTime object. Adjust if needed
            $transactionDate = new DateTime($transaction->getDate());
            $monthYear = $transactionDate->format('Y-m');
            if (!isset($array[$userId])) {
                $array[$userId] = [];
            }
            if (!isset($array[$userId][$monthYear])) {
                $array[$userId][$monthYear] = new SummaryMonthDto([
                    'user' => $user,
                    'month' => $monthYear,
                    'sum' => 0,
                    'count' => 0,
                ]);
            }
//            $array[$userId][$monthYear]['sum'] += $transaction->getAmount();
//            $array[$userId][$monthYear]['count'] += 1;
            $array[$userId][$monthYear]->incSum($transaction->getAmount());
            $array[$userId][$monthYear]->incCount(1);
        }
        $result = [];
        foreach ($array as $userGroup) {
            $result[] = new SummaryByUserMonthListIterator($userGroup);
        }
//        debug($result);
        return new SummaryByUserListIterator($result);
    }
}
