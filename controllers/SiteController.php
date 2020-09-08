<?php

namespace app\controllers;

use app\core\Application;
use app\core\Controller;
use app\core\Request;

class SiteController extends Controller
{
    public function home()
    {
        return $this->view('home');
    }
    public function handleContact(Request $request)
    {
        $body=$request->getBody();
        var_dump($body);
        return 'Handling data';
    }
    public function contact()
    {
        return $this->view('contact');
    }
}
