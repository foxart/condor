<?php

namespace handlers;

use common\Command;
use models\summary\SummaryModel;
use models\transaction\TransactionModel;
use models\user\UserModel;

class SummaryHandler implements Command
{
    private UserModel $userModel;
    private SummaryModel $summaryModel;
    private TransactionModel $transactionModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->summaryModel = new SummaryModel();
        $this->transactionModel = new TransactionModel();
    }

    public function execute($url, $data = []): string
    {
        $type = (string)($data['type'] ?? '');
        $transactionList = $this->transactionModel->findAll();
        $userList = $this->userModel->findAll();
        $byCountryList = $this->summaryModel->getByCountry($transactionList, $userList);
        $byUserMonth = $this->summaryModel->getByUser($transactionList, $userList);
//        debug($byUserMonth);
        ob_start();
        include 'SummaryHandler.tpl';
        return ob_get_clean();
    }
}
