<?php

namespace app\controllers;

use app\models\Task;
use app\core\Request;
use app\core\Controller;
use app\core\Application;
use JasonGrimes\Paginator;

class SiteController extends Controller
{
    public function home()
    {
        $tasks = Task::all();

        return $this->view('home', ['tasks' => $tasks]);
    }
    public function addTask(Request $request)
    {
        $task = new Task();


        if ($request->isPost()) {
            $task->loadData($request->getBody());
            if ($task->save()) {

                Application::$app->session->setFlash('success', 'Successfuly added!');
                Application::$app->response->redirect('/');
                exit;
            }


            return $this->view('new_task', ['model' => $task]);
        }
        $this->setLayout('main');
        return $this->view('new_task', ['model' => $task]);
    }
   
    public function handleContact(Request $request)
    {
        $body = $request->getBody();
        var_dump($body);
        return 'Handling data';
    }
    public function contact()
    {
        return $this->view('contact');
    }
}
