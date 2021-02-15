<?php


namespace Core;

//
//use Core\CoreModel as Model;
//use Core\CoreView as View;

//class CoreController
//{
//    public  $View;
//    public $Model;
//    public function __construct()
//    {
//        $this->View = new View();
//        $this->Model = new Model('articles');
//
//    }
//
//
//    public function index()
//    {
//        $title = "Список статей:";
//        $articles = $this->Model->getAll();
//        $this->View->index($title, $articles);
//    }
//
//    public function page()
//    {
//        echo '<h1>Page</h1>';
//    }
//
//    public function viewSingleArticle()
//    {
//        include "Template/page.twig";
//        echo 'PageView';
//    }
//
//    public function view($id)
//    {
//        $article = $this->Model->getById($id);
//        /*     $title = "Список статей:";
//             $this->View->index($title,$article);*/
//    }
//
//}
class CoreController
{
    public function index()
    {
        include "Template/eheTeNandayo.twig";
        echo 'index';
    }
    public function viewSingleArticle()
    {
        include "Template/page.twig";
        echo 'PageView';
    }
    public function view($id)
    {
        echo "<h1> page № $id </h1>";
    }

}