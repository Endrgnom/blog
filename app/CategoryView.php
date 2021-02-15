<?php


namespace App;


class CategoryView extends core\CoreView
{
    public function showAllCategories($categories){
        echo $this->twig->render('/back/main.twig',['category_list'=> $categories, 'page_title'=>'Главная']);
    }
}