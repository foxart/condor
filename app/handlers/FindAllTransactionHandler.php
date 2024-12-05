<?php

namespace handlers;

use common\Command;
use models\transaction\transactionModel;

class FindAllTransactionHandler implements Command
{
    private transactionModel $model;

    public function __construct()
    {
        $this->model = new TransactionModel();
    }

    public function execute(array $data = []): string
    {
        $transactions = $this->model->findAllTransaction();
        ob_start();
        include 'find-all-transaction.tpl';
        return ob_get_clean();
    }
}
