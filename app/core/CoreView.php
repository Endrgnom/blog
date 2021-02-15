<?php


namespace Core;

use Twig;
class CoreView
{
    public $lodaer;
    public  $twig;
    public  function  __construct()
    {
        $this->lodaer =new \Twig\Loader\FilesystemLoader('Template');
        $this->twig = new \Twig\Environment($this->lodaer,
            [

                'debug' => true,
                'autoescape'=> false
            ]);
    }
    public  function  index($title, $articles)
    {
//        echo $this->twig->render('/front/navbar.twig');
//        echo $this->twig->render('/front/test.twig',['title'=>$title, 'articles'=>$articles]);

    }

}