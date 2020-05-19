<?php
require_once 'Request.php';
require_once 'Controllers/Controller.php';
require_once 'Views/View.php';

class Router
{
    public function route()
    {
        $request = new Request();

        if ($request->success == true) {
            $nameController = $request->nameController;
            $nameAction = $request->nameAction;

            require_once __HOME__ . '/Controllers/' . $nameController . '.php';
            $classController = new $nameController($nameController, $request);
            $classController->$nameAction();

            $view = new View($classController);
            $view->render($nameAction);
        }

    }
}