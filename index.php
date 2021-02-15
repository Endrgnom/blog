<?php
session_abort();
@define('ABSPATH', str_replace('\\','/', dirname(__FILE__)));
require_once('./config/db.php');
require('vendor/autoload.php');

use NoahBuscher\Macaw\Macaw;

//Macaw::get('/', 'Core\CoreController@index');
//Macaw::get('page', 'Core\CoreController@page');
//Macaw::get('view/(:num)', 'Core\CoreController@view');
//
//Macaw::get('PageView', 'Core\CoreController@viewSingleArticle');
//

Macaw::get('/', 'App\SiteController@index');
Macaw::get('genshin', 'Core\CoreController@genshin');
Macaw::get('php', 'Core\CoreController@php');
Macaw::get('PageView', 'Core\CoreController@viewSingleArticle');
Macaw::get('view/(:num)', 'App\SiteController@singleArticle');
Macaw::get('/admin/login', 'App\AuthClass@logIn');


Macaw::get('/admin/', 'App\AdminPanelController@dashboard');

Macaw::dispatch();
