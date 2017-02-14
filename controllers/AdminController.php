<?php
include_once ROOT."/models/Admin.php";
include_once ROOT."/models/News.php";
include_once ROOT."/models/Photos.php";


include_once ROOT."/helper/Safety.php";
include_once ROOT."/components/Db.php";
include_once ROOT."/components/Paginator.php";

class AdminController{
    public function ActionIndex (){
        Admin::checkUserAdmin();
        $countUsers = Admin::getCountUsers();
        $countArticles = News::getCountArticles();
       // $countNews = News::getCountArticlesByType('news');
        //$countInterviews = News::getCountArticlesByType('interview');
        $countPhotos = Photos::getCountPhotos();

        include_once ROOT."/views/admin/index.php";
        return true;
    }

    public function ActionUsers(){
        Admin::checkUserAdmin();
        $countUsers = Admin::getCountUsers();
        $listUsers = Admin::getListUsers();
        include_once ROOT."/views/admin/users.php";
        return true;
    }

    public function ActionArticles($type = null, $id = 1){
        Admin::checkUserAdmin();
        if ($type == 'page') {
            if (isset($_POST['delete'])){
                $pathFile = ROOT."/style/images/articles/Preview/".$_POST['pathPhoto'];
                $idDelete = $_POST['id'];
                $delete = Admin::deleteNewsById($idDelete, $pathFile);
            }
            $cutAllNewsList = News::getAllNewsList($id);
            $countArticlesPages = News::getCountArticlesPages();
            $paginator = Paginator::getPaginator($id, $countArticlesPages);
            include_once ROOT . "/views/admin/articles.php";
            return true;
        }

        if ($type == 'edit'){
            if (isset($_POST['submit'])){
                $title = Safety::getSafety($_POST['title']);
                $content = Safety::getSafety($_POST['content']);
                $result = Admin::updateNews($title, $content, $id);
            }
            $articleItem = News::getArticleItemById($id);
            include_once ROOT . "/views/admin/view.php";
            return true;
        }

        if ($type == 'add'){
            if(isset($_POST['add'])){
                $path = ROOT."/style/images/articles/Preview/";
                $tmpName = $_FILES['image']['tmp_name'];
                $fileName = $_FILES['image']['name'];
                move_uploaded_file($tmpName, $path.$fileName);
                $idUser = $_SESSION['user']['id_client'];
                $title = Safety::getSafety($_POST['title']);
                $content = Safety::getSafety($_POST['content']);
                $result = Admin::addNews($idUser, $title, $content,$fileName);
            }
            include_once ROOT."/views/admin/addArticle.php";
            return true;
        }
    }

    public function ActionPhotos($action = null, $id = 1){
        Admin::checkUserAdmin();
        if ($action == 'edit'){
            if (isset($_POST['edit'])){
                $idPhoto = $id;
                $description = Safety::getSafety($_POST['description']);
                $result = Admin::updatePhoto($idPhoto,$description);
            }
            $photoById = Photos::getPhotoById($id);
            include_once ROOT."/views/admin/editPhoto.php";
            return true;
        }

        if ($action == 'add'){
            if(isset($_POST['add'])){
                $path = ROOT."/style/images/photos/";
                $tmpName = $_FILES['photo']['tmp_name'];
                $fileName = $_FILES['photo']['name'];
                move_uploaded_file($tmpName, $path.$fileName);
                $description = Safety::getSafety($_POST['description']);
                $result = Admin::addPhoto($fileName,$description);
            }
            include_once ROOT."/views/admin/addPhoto.php";
            return true;
        }

        if ($action == 'page'){
            $allPhotos = Photos::getAllPhotos($id);
            $countPages = Photos::getCountPages();
            $paginator = Paginator::getPaginator($id, $countPages);
            include_once ROOT."/views/admin/photos.php";
            return true;
        }
    }


}