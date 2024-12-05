<?php

namespace models\summary;

use DateTime;
use models\transaction\TransactionDto;
use models\transaction\TransactionIterator;
use models\user\UserDto;
use models\user\UserIterator;
use Throwable;

class SummaryModel
{
    public function getByCountry(TransactionIterator $transactionList, UserIterator $userList): SummaryByCountryIterator
    {
        $result = [];
        foreach ($transactionList as $transaction) {
            $user = $userList->find(function (UserDto $item) use ($transaction) {
                return $item->getId() === $transaction->getUserId();
            });
            $countryId = $user->getCountry()
                ->getId();
            if (!isset($result[$countryId])) {
                $result[$countryId] = new SummaryByCountryDto([
                    'country' => $user->getCountry(),
                    'sum' => 0,
                    'count' => 0,
                ]);
            }
            $result[$countryId]->incSum($transaction->getAmount());
            $result[$countryId]->incCount(1);
        }
        return new SummaryByCountryIterator($result);
    }

    public function getByUser(TransactionIterator $transactionList, UserIterator $userList): SummaryByUserIterator
    {
        $result = [];
        foreach ($userList as $user) {
            $userTransactionList = $transactionList->filter(function (TransactionDto $item) use ($user) {
                return $item->getUserId() === $user->getId();
            });
            $tmp = [];
            foreach ($userTransactionList as $transaction) {
                try {
                    $date = (new DateTime($transaction->getDate()))->format('Y-m');
                } catch (Throwable $e) {
                    debug($e->getMessage());
                    $date = (new DateTime())->format('Y-m');
                }
                if (!isset($tmp[$date])) {
                    $tmp[$date] = new SummaryByUserDateDto([
                        'date' => $date,
                        'sum' => 0,
                        'count' => 0,
                    ]);
                }
                $tmp[$date]->incSum($transaction->getAmount());
                $tmp[$date]->incCount(1);
            }
            $result[] = new SummaryByUserDto([
                'user' => $user,
                'summary' => new SummaryByUserDateIterator(array_values($tmp))
            ]);
        }
        return new SummaryByUserIterator($result);
    }
}
