<?php
require "Controller.php";
class appController extends Controller
{
    protected $template='Home';

    public function __construct()
    {
        $this->viewpath="views/";
    }
}