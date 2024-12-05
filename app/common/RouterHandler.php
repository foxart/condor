<?php

namespace common;

use handlers\FindAllTransactionByUserIdHandler;
use handlers\FindAllTransactionHandler;
use handlers\UserListHandler;

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
        $this->router->get(RouterConfig::HOME->value, function () {
            $this->render(RouterConfig::HOME->getTitle(), (new UserListHandler())->execute());
        });
        /**
         * USER
         */
        $this->router->get(RouterConfig::USER->value . '/{id}', function () {
            $this->render(RouterConfig::HOME->getTitle(), (new UserListHandler())->execute());
        });
        /**
         * TRANSACTION
         */
        $this->router->get(RouterConfig::TRANSACTION->value, function () {
            $this->render(RouterConfig::TRANSACTION->getTitle(), (new FindAllTransactionHandler())->execute());
        });
        $this->router->get(RouterConfig::TRANSACTION->value . '/{id}', function ($id) {
            $content = '';
            $main = new UserListHandler();
            $content .= $main->execute();
            $transactionManager = new FindAllTransactionByUserIdHandler();
            $content .= $transactionManager->execute(['userId' => $id]);
            $this->render(MenuConfig::TRANSACTION->getTitle(), $content);
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
            $this->render(RouterConfig::EXPORT->getTitle(), RouterConfig::EXPORT->value);
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
