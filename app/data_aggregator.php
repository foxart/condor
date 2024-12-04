<?php
class DataAggregator {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function aggregateByCountry() {
//        return $this->db->query("
//            SELECT country, COUNT(*) as count, SUM(amount) as total
//            FROM transactions
//            GROUP BY country
//        ");
    }

    public function aggregateByUserMonth() {
//        return $this->db->query("
//            SELECT user_id, DATE_FORMAT(created_at, '%Y-%m') as month,
//                   COUNT(*) as count, SUM(amount) as total
//            FROM transactions
//            GROUP BY user_id, month
//        ");
    }
}
