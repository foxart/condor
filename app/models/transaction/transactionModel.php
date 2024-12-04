<?php

namespace models\transaction;
class transactionModel
{
    private TransactionApi $api;

    public function __construct()
    {
        $this->api = new TransactionApi();
    }

    public function findAllTransactionByUserId($userId): TransactionListIterator
    {
        $transactions = $this->api->fetchTransactions();
        $transactionList = array_filter(array_map(function ($transaction) use ($userId) {
            $transactionDto = new TransactionDto($transaction);
            return $transactionDto->getUserId() === $userId ? $transactionDto : null;
        }, $transactions));
        return new TransactionListIterator($transactionList);
    }
}
