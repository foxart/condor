<?php
class TransactionManager {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getUserTransactions($userId) {
        $user = $this->db->query("SELECT id, status, country FROM users WHERE id = ?", [$userId]);
//        $transactions = $this->db->query("SELECT * FROM transactions WHERE user_id = ?", [$userId]);
//        return ['user' => $user, 'transactions' => $transactions];
    }

    public function groupByType($transactions) {
        $grouped = [];
        foreach ($transactions as $transaction) {
            $grouped[$transaction['type']][] = $transaction;
        }
        return $grouped;
    }
}
