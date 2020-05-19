<?php


class View
{
    private $vars = array();
    private $isAjax;

    /**
     * @param $name
     * @return array
     */
    public function getVar($name)
    {
        return $this->vars[$name];
    }
    private $nameController;

    public function __construct(Controller $controller)
    {
        $this->vars = $controller->vars;
        $this->nameController = $controller->nameController;
        $this->isAjax = $controller->request->isAjax;
    }


    public function render($nameAction)
    {
        $fileName = 'Views/' . $this->nameController . '/' . $nameAction . '.php';

        if (!file_exists($fileName)) {
            return;
        }

        if (!$this->isAjax) {
            require_once 'Views/header.php';
        }
        require_once $fileName;
    }
}