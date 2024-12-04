<?php
require_once 'database.php';
require_once 'api_client.php';
require_once 'router.php';
$database = "condor";
$host = "mysql";
$user = "root";
$password = "root";
//require 'TransactionManager.php';
//require 'DataAggregator.php';
//require 'OutputHandler.php';


$router = new Router('/api');

// Пример GET маршрута
$router->get('/transactions', function() {
    echo json_encode([
        'status' => 'success',
        'data' => 'Список транзакций'
    ]);
});

// Пример маршрута с параметром
$router->get('/transactions/{id}', function($id) {
    echo json_encode([
        'status' => 'success',
        'data' => "Транзакция с ID: $id"
    ]);
});

// Пример POST маршрута
$router->post('/transactions', function() {
    $inputData = json_decode(file_get_contents('php://input'), true);
    echo json_encode([
        'status' => 'success',
        'data' => 'Новая транзакция создана',
        'input' => $inputData
    ]);
});

// Диспетчеризация запросов
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);




class Main
{
    private Database $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getUserList(): void
    {
        $results = $this->database->query('SELECT * FROM users');
        echo "<table style='border-collapse: collapse; width: 100%;'>";
        echo "<tr>";
        foreach (array_keys($results[0]) as $header) {
            echo "<th style='border: 1px solid black; border-collapse: collapse;'>{$header}</th>";
        }
        echo "</tr>";
        foreach ($results as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td style='border: 1px solid black; border-collapse: collapse;'>{$cell}</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    /**
     * @throws Exception
     */
    public function getTransactions(): void
    {
        $apiClient = new APIClient("https://pinkman.online/api/", "any");
        $transactions = $apiClient->fetchTransactions();

        // Вывод первых 5 транзакций для проверки
        echo "<pre>";
        print_r($transactions);
        echo "</pre>";
    }
//$transactionManager = new TransactionManager($db);
//$dataAggregator = new DataAggregator($db);
// Получение данных пользователя
//$userId = 1; // Пример
//$data = $transactionManager->getUserTransactions($userId);
//$groupedTransactions = $transactionManager->groupByType($data['transactions']);
// Агрегация данных
//$countryStats = $dataAggregator->aggregateByCountry();
//$userMonthStats = $dataAggregator->aggregateByUserMonth();
// Создание CSV
//OutputHandler::toCSV($countryStats, 'country_stats.csv');
//OutputHandler::toCSV($userMonthStats, 'user_month_stats.csv');
}

$main = new Main(new Database($host, $database, $user, $password));
$main->getUserList();
$main->getTransactions();
