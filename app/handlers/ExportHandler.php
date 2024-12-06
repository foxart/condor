<?php

namespace handlers;

use common\Command;
use common\OutputHandler;
use models\summary\SummaryModel;
use models\transaction\TransactionModel;
use models\user\UserModel;

class ExportHandler implements Command
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
        include 'ExportHandler.tpl';
        return ob_get_clean();
    }

    public function getCountryCsv(): void
    {
        $transactionList = $this->transactionModel->findAll();
        $userList = $this->userModel->findAll();
        $data = $this->summaryModel->getByCountryAsPlainArray($transactionList, $userList);
        OutputHandler::outputCsv($data, 'byCountryList.csv');
    }

    public function getUserCsv(): void
    {
        $transactionList = $this->transactionModel->findAll();
        $userList = $this->userModel->findAll();
        $data = $this->summaryModel->getByUserAsPlainArray($transactionList, $userList);
        OutputHandler::outputCsv($data, 'byUserList.csv');
    }
}
