<?php

namespace handlers;

use common\Command;
use models\summary\SummaryModel;
use models\transaction\TransactionDto;
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
        debug($data);
        $transactionList = $this->transactionModel->findAll();
        $userList = $this->userModel->findAll();
        $byCountryList = $this->summaryModel->getByCountry($transactionList, $userList);
        debug($byCountryList);

//        foreach ($byCountryList as $item)
//        {
//            debug($item);
//        }

        ob_start();
//        include 'SummaryHandler.tpl';
        echo 123;
        return ob_get_clean();
    }
}
