<?php
define('PHOTOS_PER_PAGE', 8);
class Photos{

    public static function getCountPhotos(){
        $db = Db::getConnection();
        $query = "SELECT COUNT(*) FROM images";
        $result = $db->query($query);
        $countPhotos = $result->fetch(PDO::FETCH_NUM);
        return $countPhotos[0];
    }

    public static function getCountPages(){
        $countPhotos = self::getCountPhotos();
        $countPages = ceil($countPhotos/PHOTOS_PER_PAGE);
        return $countPages;
    }

    public static function getAllPhotos($pageNumber){
        $db = Db::getConnection();
        $photosOffset = ($pageNumber - 1) * PHOTOS_PER_PAGE;
        $query = "SELECT
  images.id_img,
  images.link,
  images.description
FROM images ORDER BY images.id_img DESC LIMIT $photosOffset, ".PHOTOS_PER_PAGE.";";
        $result = $db->query($query);
        $allPhotos = $result->fetchAll(PDO::FETCH_ASSOC);
        return $allPhotos;
    }

    public static function getPhotoById($id){
        $db = Db::getConnection();
        $query = "SELECT
  images.id_img,
  images.link,
  images.description
FROM images
WHERE images.id_img = ?";
        $result = $db->prepare($query);
        $result->execute(["$id"]);
        $photoById = $result->fetch(PDO::FETCH_ASSOC);
        return $photoById;
    }

}