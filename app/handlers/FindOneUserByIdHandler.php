<?php

namespace handlers;

use common\Command;
use models\user\UserModel;

class FindOneUserByIdHandler implements Command
{
    private UserModel $userModel;
    private FindAllTransactionHandler $handler;

    public function __construct()
    {
        $this->userModel = new UserModel();
        $this->handler = new FindAllTransactionHandler();
    }

    public function execute($url, $data = []): string
    {
        $userId = (int)($data['userId'] ?? 0);
        $type = (string)($data['type'] ?? '');
        $user = $this->userModel->findOneUser($userId);
        $transactions = $this->handler->execute($url, [
            'userId' => $userId,
            'type' => $type,
        ]);
        ob_start();
        include 'find-one-user.tpl';
        return ob_get_clean();
    }
}
