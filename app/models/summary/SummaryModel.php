<?php

namespace models\summary;

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
            $countryId = $user->getCountryId();
            if (!isset($result[$countryId])) {
                $result[$countryId] = [
                    'countryId' => $user->getCountryId(),
                    'countryName' => $user->getCountryName(),
                    'countryCode' => $user->getCountryCode(),
                    'sum' => 0,
                    'count' => 0,
                ];
            }
            $result[$countryId]['sum'] += $transaction->getAmount();
            $result[$countryId]['count'] += 1;
        }
        return new SummaryListIterator($result);
    }
}
