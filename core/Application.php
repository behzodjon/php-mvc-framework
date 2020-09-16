<?php

namespace app\core;

use app\core\Router;
use app\models\User;
use app\core\Database;
use app\core\Response;
use Illuminate\Pagination\Paginator;

class Application
{
    public static Application $app;
    public static string $ROOT_DIR;
    public string $layout = 'main';
    // public string $userClass;
    public Router $router;
    public Request $request;
    public Response $response;
    public ?Controller $controller = null;
    public Database $db;
    public Session $session;
    public ?DbModel $user;
    // public Paginator $paginator;

    public function __construct($rootDir, $config)
    {
        $this->user = null;

        $this->userClass = User::class;
        self::$ROOT_DIR = $rootDir;
        self::$app = $this;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        $this->db = new Database($config['db']);
        $this->session = new Session();
        // $this->paginator = new Paginator();


        $userId = Application::$app->session->get('user');
        if ($userId) {
            $key = $this->userClass::primaryKey();
            $this->user = $this->userClass::findOne([$key => $userId]);
        } else {
            $this->user = null;
        }
    }

    public function run()
    {
        try{
            echo $this->router->resolve();

        }
        catch(\Exception $e){
            echo $this->router->renderView('_404');
        }
    }

    public function getController()
    {
        return $this->controller;
    }
    public function setController(Controller $controller)
    {
        return $this->controller = $controller;
    }
    public function login(DbModel $user)
    {
        $this->user = $user;
        $primaryKey = $user->primaryKey();
        $value = $user->{$primaryKey};
        $a = Application::$app->session->set('user', $value);
        //        var_dump($_SESSION['user']);
        // exit;

        return true;
    }
    public function logout()
    {
        $this->user = null;
        $this->session->remove('user');
    }
    public function isGuest()
    {
        return !self::$app->user;
    }
}
