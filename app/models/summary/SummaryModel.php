<?php

namespace models\summary;

use DateTime;
use models\transaction\TransactionDto;
use models\transaction\TransactionIterator;
use models\user\UserIterator;
use Throwable;

class SummaryModel
{
    public function getByCountryAsArray(TransactionIterator $transactionList, UserIterator $userList): array
    {
        $iterator = $this->getByCountry($transactionList, $userList);
        return array_map(function (SummaryByCountryDto $value) {
            return [
                'country' => [
                    'id' => $value->getCountry()
                        ->getId(),
                    'name' => $value->getCountry()
                        ->getName(),
                    'code' => $value->getCountry()
                        ->getCode(),
                ],
                'sum' => $value->getSum(),
                'count' => $value->getCount(),
            ];
        }, iterator_to_array($iterator));
    }

    public function getByCountry(TransactionIterator $transactionList, UserIterator $userList): SummaryByCountryIterator
    {
        $result = [];
        foreach ($userList as $user) {
            $userTransactionList = $transactionList->filter(function (TransactionDto $item) use ($user) {
                return $item->getUserId() === $user->getId();
            });
            foreach ($userTransactionList as $transaction) {
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
        }
        return new SummaryByCountryIterator(array_values($result));
    }

    public function getByCountryAsPlainArray(TransactionIterator $transactionList, UserIterator $userList): array
    {
        $iterator = $this->getByCountry($transactionList, $userList);
        return array_map(function (SummaryByCountryDto $value) {
            return [
                'country_id' => $value->getCountry()
                    ->getId(),
                'country_name' => $value->getCountry()
                    ->getName(),
                'country_code' => $value->getCountry()
                    ->getCode(),
                'sum' => $value->getSum(),
                'count' => $value->getCount(),
            ];
        }, iterator_to_array($iterator));
    }

    public function getByUserAsArray(TransactionIterator $transactionList, UserIterator $userList): array
    {
        $iterator = $this->getByUser($transactionList, $userList);
        return array_map(function (SummaryByUserDto $value) {
            $user = $value->getUser();
            return [
                'user' => [
                    'id' => $user->getId(),
                    'email' => $user->getEmail(),
                    'username' => $user->getUsername(),
                    'password' => $user->getPassword(),
                    'firstname' => $user->getFirstname(),
                    'lastname' => $user->getLastname(),
                    'dob' => $user->getDob(),
                    'city' => $user->getCity(),
                    'zipcode' => $user->getZipcode(),
                    'address' => $user->getAddress(),
                    'created_at' => $user->getCreatedAt(),
                    'country' => [
                        'id' => $user->getCountry()
                            ->getId(),
                        'name' => $user->getCountry()
                            ->getName(),
                        'code' => $user->getCountry()
                            ->getCode(),
                    ],
                    'status' => [
                        'id' => $user->getStatus()
                            ->getId(),
                        'name' => $user->getStatus()
                            ->getName(),
                    ],
                ],
                'summary' => array_map(function (SummaryByUserDateDto $summary) {
                    return [
                        'date' => $summary->getDate(),
                        'sum' => $summary->getSum(),
                        'count' => $summary->getCount(),
                    ];
                }, iterator_to_array($value->getSummary())),
                'count' => $value->getCount(),
                'sum' => $value->getSum(),
            ];
        }, iterator_to_array($iterator));
    }

    public function getByUser(TransactionIterator $transactionList, UserIterator $userList): SummaryByUserIterator
    {
        $result = [];
        foreach ($userList as $user) {
            $userTransactionList = $transactionList->filter(function (TransactionDto $item) use ($user) {
                return $item->getUserId() === $user->getId();
            });
            $summaryByUserDate = [];
            foreach ($userTransactionList as $transaction) {
                try {
                    $date = ($transaction->getDate())->format('Y-m');
                } catch (Throwable $e) {
                    debug($e->getMessage());
                    $date = (new DateTime())->format('Y-m');
                }
                if (!isset($summaryByUserDate[$date])) {
                    $summaryByUserDate[$date] = new SummaryByUserDateDto([
                        'date' => $date,
                        'sum' => 0,
                        'count' => 0,
                    ]);
                }
                $summaryByUserDate[$date]->incSum($transaction->getAmount());
                $summaryByUserDate[$date]->incCount(1);
            }
            $result[] = new SummaryByUserDto([
                'user' => $user,
                'summary' => new SummaryByUserDateIterator(array_values($summaryByUserDate))
            ]);
        }
        return new SummaryByUserIterator($result);
    }

    public function getByUserAsPlainArray(TransactionIterator $transactionList, UserIterator $userList): array
    {
        $iterator = $this->getByUser($transactionList, $userList);
        return array_map(function (SummaryByUserDto $value) {
            $user = $value->getUser();
            // Flatten the user and other fields into a single flat array
            $flatArray = [
                'user_id' => $user->getId(),
                'user_email' => $user->getEmail(),
                'user_username' => $user->getUsername(),
                'user_password' => $user->getPassword(),
                'user_firstname' => $user->getFirstname(),
                'user_lastname' => $user->getLastname(),
                'user_dob' => $user->getDob(),
                'user_city' => $user->getCity(),
                'user_zipcode' => $user->getZipcode(),
                'user_address' => $user->getAddress(),
                'user_created_at' => $user->getCreatedAt()
                    ->format('Y-m-d H:i:s'),
                'user_country_id' => $user->getCountry()
                    ->getId(),
                'user_country_name' => $user->getCountry()
                    ->getName(),
                'user_country_code' => $user->getCountry()
                    ->getCode(),
                'user_status_id' => $user->getStatus()
                    ->getId(),
                'user_status_name' => $user->getStatus()
                    ->getName(),
                'count' => $value->getCount(),
                'sum' => $value->getSum(),
            ];
            // Flatten each summary entry and append them to the flat array
            foreach ($value->getSummary() as $index => $summary) {
                $flatArray["summary_{$index}_date"] = $summary->getDate();
                $flatArray["summary_{$index}_sum"] = $summary->getSum();
                $flatArray["summary_{$index}_count"] = $summary->getCount();
            }
            return $flatArray;
        }, iterator_to_array($iterator));

    }
}
