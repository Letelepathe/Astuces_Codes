<?php

class Controller{
    protected $viewpath;
    protected $template;

    public function render($view,$variables=[])
    {
        ob_start();
        extract($variables);
        require($this->viewpath.str_replace('.','/',$view).'.php');
        $content=ob_get_clean();
        require($this->viewpath.'template/'.$this->template.'.php');
    }

    public function redirect()
    {
      // return $this->render("template.".$string,[]);
      header("location:/Bibliotheques/".$_GET['Url']);
    }
}