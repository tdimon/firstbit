<?php
require_once 'DB/Model.php';

/**
 * Class Controller
 * @property Request $request
 */
class Controller
{
    public $vars = array();
    public $nameController;
    protected $dataForm;

    public function __construct($nameController, Request $request)
    {
        $this->nameController = $nameController;
        $this->request = $request;
        $this->dataForm = $request->dataForm;
        Model::init();
    }

    public function set($name, $value)
    {
        $this->vars[$name] = $value;
    }
}