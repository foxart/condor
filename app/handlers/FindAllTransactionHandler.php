<?php

namespace handlers;

use common\Command;
use models\summary\SummaryModel;
use models\transaction\TransactionDto;
use models\transaction\transactionModel;
use models\user\UserModel;

class FindAllTransactionHandler implements Command
{
    private transactionModel $transactionModel;
    private UserModel $userModel;
    private SummaryModel $model;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->transactionModel = new TransactionModel();
        $this->model = new SummaryModel();
    }

    public function execute($url, $data = []): string
    {
        $type = (string)($data['type'] ?? '');
        $userId = (int)($data['userId'] ?? 0);
        $transactionList = $this->transactionModel->findAll();
//        $groupList = $this->transactionModel->groupByType($transactionList);
        $typeList = $this->transactionModel->getTypeList($transactionList);
        $transactionList = $transactionList->filter(function (TransactionDto $item) use ($type, $userId) {
            $isType = true;
            $isUserId = true;
            if ($userId) {
                $isUserId = $item->getUserId() === $userId;
            }
            if ($type) {
                $isType = strtolower($item->getType()) === strtolower($type);
            }
            return $isType && $isUserId;
        });
        /**
         *
         */
        $userList = $this->userModel->findAll();
        $res = $this->model->getByCountry($transactionList, $userList);
        debug($res);
        ob_start();
        include 'FindAllTransactionHandler.tpl';
        return ob_get_clean();
    }
}
