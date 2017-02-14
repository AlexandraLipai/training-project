<?php

class Route{
    private $routes;

    public function __construct(){

        $this->routes = array(//массив шаблон => путь
            'admin/articles/([a-z]+)/([0-9]+)' => 'admin/articles/$1/$2',
            'admin/articles/([a-z])' => 'admin/articles/$1',
            'admin/articles' => 'admin/articles/page',
            'admin/photos/([a-z]+)/([0-9]+)' => 'admin/photos/$1/$2',
            'admin/photos/([a-z])' => 'admin/photos/$1',
            'admin/photos' => 'admin/photos/page',
            'admin/users' => 'admin/users',
            'admin' => 'admin/index',

            'search' => 'search/index',

            'news/([a-z]+)/([0-9]+)' => 'news/view/$1/$2',
            'news/([a-z]+)' => 'news/view/$1',
            'news/([0-9]+)' => 'news/index/$1',
            'news' => 'news/index',

            'user/register' => 'user/register',
            'user/login' => 'user/login',
            'user/logout' => 'user/logout',

            'photos/page/([0-9]+)' => 'photos/index/page/$1',
            'photos/([0-9]+)' => 'photos/view/$1',
            'photos' => 'photos/index/page/1',

            'xmli' => 'xmli/xmli',
            'form'=>'form/form',

            '(.+)' => 'news/start',
            '' => 'news/start'

        );
    }

    private function getURI(){
        if (!empty($_SERVER['REQUEST_URI'])){//получаем URI
            return trim($_SERVER['REQUEST_URI'],'/');//удаляем слэши из начала и конца строки
        }
    }

    public function run(){
        $uri = $this->getURI();

        foreach ($this->routes as $uriPattern => $path){
            if (preg_match("~$uriPattern~",$uri)){// Выполняем проверку на соответствие полученного URI шаблону
                $internalRoute = preg_replace("~$uriPattern~",$path,$uri);// Выполняем поиск совпадений $uri с шаблоном $uriPattern и заменяем их на $path
                $segments = explode('/',$internalRoute);// разбиваем путь , возвращаем массив

                $controllerName = ucfirst(array_shift($segments)).'Controller';//ucfirst-преобразуем первый символ в верхний регистр, array_shift — извлекаем первый элемент массива, получаем название контроллера
                $actionName = 'action'.ucfirst(array_shift($segments));//получаем название экшна

                $parameters = $segments;

                $controllerFile = ROOT.'/controllers/'.$controllerName.'.php';

                if (file_exists($controllerFile)){
                    include $controllerFile;
                }

                $controllerObject = new $controllerName; // создаем объект необходимого контроллера
                $result = call_user_func_array(array($controllerObject,$actionName),$parameters);//Вызываем пользовательскую функцию с массивом параметров
                if ($result != null){
                    break;
                }
            }
        }
    }
}