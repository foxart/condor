<?php

namespace models\transaction;

class TransactionModel
{
    private TransactionApi $transactionApi;

    public function __construct()
    {
        $this->transactionApi = new TransactionApi();
    }

    public function findAll(): TransactionListIterator
    {
        $transactionList = $this->transactionApi->getTransactionList();
        $result = array_map(function ($transaction) {
            return new TransactionDto($transaction);
        }, $transactionList);
        return new TransactionListIterator($result);
    }

    public function getTypeList(TransactionListIterator $transactionDtoList): array
    {
        $uniqueValues = [];
        foreach ($transactionDtoList as $transaction) {
            $uniqueValues[] = strtolower($transaction->getType());
        }
        return array_unique($uniqueValues);
    }

    public function groupByType(TransactionListIterator $transactionDtoList): array
    {
        $grouped = [];
        foreach ($transactionDtoList as $transactionDto) {
            $type = strtolower($transactionDto->getType());
            if (!array_key_exists($type, $grouped)) {
                $grouped[$type] = [];
            }
            $grouped[$type][] = $transactionDto;
        }
        return $grouped;
    }
}
