<?php

namespace handlers;

use common\Command;
use models\transaction\transactionModel;

class FindAllTransactionByUserIdHandler implements Command
{
    private transactionModel $model;

    public function __construct()
    {
        $this->model = new TransactionModel();
    }

    public function execute(array $data = []): string
    {
        $userId = (int) ($data['userId'] ?? 0);
        $transactions = $this->model->findAllTransactionByUserId($userId);
        ob_start();
        include 'find-all-transaction.tpl';
        return ob_get_clean();
    }
}
