<?php

namespace handlers;

use common\Command;
use models\summary\SummaryModel;
use models\transaction\TransactionModel;
use models\user\UserModel;

class ApiHandler implements Command
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
        $transactionList = $this->transactionModel->findAll();
        $userList = $this->userModel->findAll();
        $byCountryList = $this->summaryModel->getByCountry($transactionList, $userList);
        $byUserList = $this->summaryModel->getByUser($transactionList, $userList);
        ob_start();
        include 'ApiHandler.tpl';
        return ob_get_clean();
    }

    public function getCountryJson(): string
    {
        $transactionList = $this->transactionModel->findAll();
        $userList = $this->userModel->findAll();
        return json_encode($this->summaryModel->getByCountryAsArray($transactionList, $userList));
    }

    public function getUserJson(): string
    {
        $transactionList = $this->transactionModel->findAll();
        $userList = $this->userModel->findAll();
        return json_encode($this->summaryModel->getByUserAsArray($transactionList, $userList));
    }
}
