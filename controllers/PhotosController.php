<?php

include_once ROOT."/models/Photos.php";
include_once ROOT."/components/Db.php";
include_once ROOT."/components/Paginator.php";

class PhotosController{

    public function ActionIndex($page, $numberPage){
        $allPhotos = Photos::getAllPhotos($numberPage);
        $countPages = Photos::getCountPages();
        $paginator = Paginator::getPaginator($numberPage,$countPages);
        include_once ROOT."/views/photos/index.php";
        return true;
    }

    public function ActionView($id){
        $photoById = Photos::getPhotoById($id);
        include_once ROOT."/views/photos/view.php";
        return true;
    }
}