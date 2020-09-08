<?php

namespace app\controllers;

use app\core\Controller;
use app\core\Request;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');

        return $this->view('login');
    }
    public function register(Request $request)
    {
        $this->setLayout('auth');
        
        if ($request->isPost()) {
            return "Handle data";
        }
        return $this->view('register');
    }
}
