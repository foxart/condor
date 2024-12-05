<?php

use common\RouterHandler;

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

$routerHandler = new RouterHandler(__DIR__ . '/index.tpl');
$routerHandler->dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
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
