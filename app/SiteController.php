<?php


namespace App;


class SiteController
{
    public $Articles;
    public $Category;
    public $View;
    public $PageView;

   public function __construct()
   {
       $this->Articles = new ArticalModel('articles');
       $this->Category =new CategoryModel('category');
       $this->View = new SiteView();
   }

   public function index()
   {
       $articles_list = $this->Articles->all();
       $categories_list = $this->Category->all();
       $this->View->showAllArticles($articles_list, $categories_list);
   }

   public function singleArticle($id)
   {
       $articles_list = $this->Articles->getSingleArticleById($id);
       $this->dbg($articles_list);
       $this->PageView-> singleArticle($articles_list);
   }

   public function dbg($text)
   {
        echo '<pre>';
        print_r($text);
        echo '</pre>';
   }
}