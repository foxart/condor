<?php

namespace handlers;

use common\Command;
use models\transaction\TransactionDto;
use models\transaction\transactionModel;

class FindAllTransactionHandler implements Command
{
    private transactionModel $transactionModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
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
        ob_start();
        include 'FindAllTransactionHandler.tpl';
        return ob_get_clean();
    }
}
