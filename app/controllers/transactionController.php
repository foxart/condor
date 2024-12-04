<?php

namespace controllers;

use models\transaction\transactionModel;

class TransactionController
{
    private transactionModel $model;

    public function __construct()
    {
        $this->model = new TransactionModel();
    }

    public function findAllTransaction(int $userId): string
    {
        $transactions = $this->model->findAllTransactionByUserId($userId);
        ob_start();
        include 'find-all-transaction.tpl';
        return ob_get_clean();
    }
}
