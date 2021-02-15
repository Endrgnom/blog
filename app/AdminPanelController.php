<?php


namespace App;

use App\ArticalModel;
use App\CategoryModel;

class AdminPanelController
{
    public $View;
    public $Articles;
    public $Categories;

    public function __construct()
    {
        $this->Articles = new ArticalModel('articles');
        $this->Categories = new CategoryModel('category');
        $this->View = new AdminPanelView();
    }

    public function dashboard()
    {
        $article_count = $this->Articles->count();
        $category_count = $this->Categories->count();
        $this->View->dashboard($article_count, $category_count);
    }
}