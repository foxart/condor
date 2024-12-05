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
        $this->transactionModel = new TransactionModel();
        $this->summaryModel = new SummaryModel();
    }

    public function execute($url, $data = []): string
    {
        $type = (string)($data['type'] ?? '');
        $transactionList = $this->transactionModel->findAll();
        $userList = $this->userModel->findAll();
        $byCountryList = $this->summaryModel->getByCountry($transactionList, $userList);
        $byUserList = $this->summaryModel->getByUser($transactionList, $userList);
//        debug($byUserList);
        ob_start();
        include 'SummaryHandler.tpl';
        return ob_get_clean();
    }
}
