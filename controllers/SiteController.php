<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;

class SiteController extends Controller
{
    public function home()
    {
        return $this->view('home');
    }
    public function handleContact()
    {
        $body=Application::$app->request->getBody();
        var_dump($body);
        return 'Handling data';
    }
    public function contact()
    {
        return $this->view('contact');
    }
}
