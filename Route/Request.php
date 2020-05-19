<?php


class Request
{
    public $nameController;
    public $nameAction;
    public $success;
    public $isAjax = false;
    public $dataForm = [];

    public function __construct()
    {
        $this->success = true;

        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $this->isAjax = true;
        }

        $uri = $_SERVER['REQUEST_URI'];
        if (substr($uri, 0, 1) == '/') {
            $uri = substr($uri, 1);
        }

        if (!empty($_REQUEST)) {
            $this->dataForm = $_REQUEST;
        }

        if ($uri == 'favicon.ico') {
            $this->success = false;
            return;
        }

        if (!empty($uri)) {
            list($this->nameController, $this->nameAction) = explode('/', $uri);
            $this->nameController = ucfirst($this->nameController);
            if (is_null($this->nameAction)) {
                $this->nameAction = 'index';
            }
        } else {
            $this->nameController = 'Main';
            $this->nameAction = 'index';
        }
    }
}