<?php

include_once ROOT."/models/News.php";
include_once ROOT."/models/Photos.php"; // for START
include_once ROOT."/components/Db.php";
include_once ROOT."/components/Paginator.php";

class NewsController{
    public function actionIndex($pageNumber = 1){
        $cutAllNewsList = News::getAllNewsList($pageNumber);
        $countArticlesPages = News::getCountArticlesPages();
        $paginator = Paginator::getPaginator($pageNumber,$countArticlesPages);
        require_once ROOT.'/views/news/index.php';
        return true;
    }

    public function actionView($type=null, $id=null){
        $errors = false;
        if ($type && $id){

            $articleItem = News::getArticleItemById($id);

            require_once ROOT.'/views/news/view.php';
            return true;
        }


        return true;
    }

    public function actionStart(){
        $photos = Photos::getAllPhotos(1);
        $newsList = News::getAllNewsList(1);
        $photos = array_slice($photos,0,8);
        $newsList = array_slice($newsList,0,2);

        require_once ROOT.'/views/news/start.php';
        return true;
    }

}
