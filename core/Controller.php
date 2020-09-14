<?php

use app\core\Application;

namespace app\core;

use app\core\middlewares\BaseMiddlewares;

class Controller
{
    public string $layout = 'main';
    public string $action = '';

     /**
     * @var \app\core\BaseMiddleware[]
     */

    protected array $middlewares = [];
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function view($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }

    public function registerMiddleware(BaseMiddlewares $middleware)
    {

        $this->middlewares[] = $middleware;
    }
   /**
     * @return \app\core\middlewares\BaseMiddleware[]
     */
    public function getMiddlewares(): array
    {
        return $this->middlewares;
    }
}
