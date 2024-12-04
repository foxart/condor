<?php

use common\Router;
use controllers\TransactionController;
use controllers\UserController;

spl_autoload_register(function ($class) {
    $file = __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});
function debug($data): void
{
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}

/**
 *
 */
$router = new Router();
$router->get('/', function () {
    $user = new UserController();
    echo $user->findAllUser();
});
$router->get('/transaction', function () {
    echo json_encode([
        'status' => 'success',
        'data' => 'Список транзакций'
    ]);
});
$router->get('/transaction/{id}', function ($id) {
    $main = new UserController();
    echo $main->findAllUser();
    $transactionManager = new TransactionController();
    echo $transactionManager->findAllTransaction($id);
});
$router->post('/transaction', function () {
    $inputData = json_decode(file_get_contents('php://input'), true);
    echo json_encode([
        'status' => 'success',
        'data' => 'Новая транзакция создана',
        'input' => $inputData
    ]);
});
$router->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
/**
 *
 */
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
