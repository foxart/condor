<?php

class TransactionManager
{
    private Database $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
    }

    public function getUserTransactions($userId): void
    {
        $user = $this->db->query("SELECT id, status, country FROM users WHERE id = ?", [$userId]);
//        $transactions = $this->db->query("SELECT * FROM transactions WHERE user_id = ?", [$userId]);
//        return ['user' => $user, 'transactions' => $transactions];
    }

    public function groupByType($transactions): array
    {
        $grouped = [];
        foreach ($transactions as $transaction) {
            $grouped[$transaction['type']][] = $transaction;
        }
        return $grouped;
    }
}
