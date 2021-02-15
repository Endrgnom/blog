<?php


namespace App;

use App\CategoryView as View;
use App\CategoryModel as Model;
use CoreController;

class CategoryController extends CoreController
{
    public function __construct()
    {
        $this->View = new View();
        $this->Model = new Model('category');
    }

    public function index()
    {
        $categories = $this->Model->getAll();
        $this->View->showAllCategories();
    }
}