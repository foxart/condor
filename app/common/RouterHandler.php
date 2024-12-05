<?php

namespace common;

use handlers\FindAllTransactionHandler;
use handlers\FindAllUserHandler;
use handlers\FindOneUserByIdHandler;

class RouterHandler
{
    private Router $router;
    private mixed $template;
    private array $menuConfig;

    public function __construct($template)
    {
        $this->template = $template;
        $this->router = new Router();
        $this->menuConfig = MenuConfig::cases();
        $this->setupRoutes();
    }

    private function setupRoutes(): void
    {
        /**
         * USER
         */
        $this->router->get(RouterConfig::USER_LIST->value, function () {
            $this->render(RouterConfig::USER_LIST->getTitle(), (new FindAllUserHandler())->execute(
                RouterConfig::USER->value)
            );
        });
        $this->router->get(RouterConfig::USER->value . '/{id}', function ($id) {
            $this->render(RouterConfig::USER->getTitle(), (new FindOneUserByIdHandler())->execute(
                RouterConfig::USER->value . '/' . $id, [
                'type' => filter_input(INPUT_GET, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'userId' => $id
            ]));
        });
        /**
         * TRANSACTION
         */
        $this->router->get(RouterConfig::TRANSACTION->value, function () {
            $this->render(RouterConfig::TRANSACTION->getTitle(), (new FindAllTransactionHandler())->execute(
                RouterConfig::TRANSACTION->value, [
                'type' => filter_input(INPUT_GET, 'type', FILTER_SANITIZE_FULL_SPECIAL_CHARS),
                'url' => RouterConfig::TRANSACTION->value
            ]));
        });
        $this->router->get(RouterConfig::TRANSACTION->value . '/{id}', function ($id) {
//            $content = '';
//            $main = new FindAllUserHandler();
//            $content .= $main->execute();
//            $transactionManager = new FindAllTransactionByUserIdHandler();
//            $content .= $transactionManager->execute(['userId' => $id]);
            $this->render(MenuConfig::TRANSACTION->getTitle(), (new FindAllTransactionHandler())->execute(
                RouterConfig::TRANSACTION->value
            ));
        });
        $this->router->post(RouterConfig::TRANSACTION->value . '/transaction', function () {
            $inputData = json_decode(file_get_contents('php://input'), true);
            $this->render(RouterConfig::TRANSACTION->getTitle(), json_encode([
                'status' => 'success',
                'data' => 'Transaction created',
                'input' => $inputData
            ]));
        });
        /**
         * EXPORT
         */
        $this->router->get(RouterConfig::EXPORT->value, function () {
            $content = 'export';
            $this->render(MenuConfig::EXPORT->getTitle(), $content);
        });
        /**
         * TASK
         */
        $this->router->get(RouterConfig::TASK->value, function () {
            $content = nl2br(file_get_contents('index.md'));
            $this->render(MenuConfig::EXPORT->getTitle(), $content);
        });
    }

    private function render(string $title, string $content): void
    {
        $headerTitle = $title;
        $routerContent = $content;
        $menuConfig = $this->menuConfig;
        include $this->template;
    }

    public function dispatch(string $uri, string $method): void
    {
        $this->router->dispatch($uri, $method);
    }
}
