<?php

namespace models\transaction;
class transactionModel
{
    private TransactionApi $api;

    public function __construct()
    {
        $this->api = new TransactionApi();
    }

    public function findAllTransactionByUserId(int $userId): TransactionListIterator
    {
        $transactionList = $this->api->getTransactionList();
        $result = array_filter(array_map(function ($transaction) use ($userId) {
            $transactionDto = new TransactionDto($transaction);
            return $transactionDto->getUserId() === $userId ? $transactionDto : null;
        }, $transactionList));
        return new TransactionListIterator($result);
    }

    public function findAllTransaction(): TransactionListIterator
    {
        $transactionList = $this->api->getTransactionList();
        $result = array_map(function ($transaction) {
            return new TransactionDto($transaction);
        }, $transactionList);
        return new TransactionListIterator($result);
    }
}
