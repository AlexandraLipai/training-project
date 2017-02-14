<?php

class Admin{
    public static function getCountUsers(){
        $db = Db::getConnection();
        $query = "SELECT COUNT(*) FROM clients";
        $result = $db->query($query);
        $countUsers = $result->fetch(PDO::FETCH_NUM);
        return $countUsers[0];
    }

    public static function getListUsers(){
        $db = Db::getConnection();
        $query = "SELECT
                  clients.id_client,
                  clients.name,
                  clients.surname,
                  clients.email,
                  statuses_clients.status_client
                  FROM clients
                  INNER JOIN statuses_clients
                  ON clients.id_status = statuses_clients.id_status;";
        $result = $db->query($query);
        $listUsers = $result->fetchAll(PDO::FETCH_ASSOC);
        return $listUsers;
    }

    public static function updateNews($title, $content, $id){
        $errors = false;

        if (!self::checkValidateTitleArticle($title)){
            $errors[] = "Длина Title должна быть от 15 до 55!";
        }

        if (!self::checkValidateContentArticle($content)){
            $errors[] = "Длина Content должна быть не менее 200 символов";
        }

        if ($errors == false) {
            $db = Db::getConnection();
            $query = "UPDATE news SET name_of_news = '$title', news = '$content' WHERE news.id_news = $id;";
            $result = $db->query($query);
            return $result;
        }

        return $errors;
    }

    public static function addNews($id_user,$title,$content,$img){
        $errors = false;

        if (!self::checkValidateTitleArticle($title)){
            $errors[] = "Длина Title должна быть от 15 до 55!";
        }

        if (!self::checkValidateContentArticle($content)){
            $errors[] = "Длина Content должна быть не менее 200 символов";
        }

        if (!self::checkValidateFile($img)){
            $errors[] = "Вы не загрузили фотографию!";
        }

        if ($errors == false) {
            $db = Db::getConnection();
            $query = "INSERT INTO news(id_client, name_of_news, news, picture) VALUES($id_user,'$title','$content','$img');";
            $result = $db->query($query);
            return $result;
        }

        return $errors;
    }

    public static function deleteNewsById($id, $pathFile){
        intval($id);
        unlink($pathFile);
        $db = Db::getConnection();
        $query = "DELETE FROM news WHERE id_news='$id';";
        $result = $db->query($query);
        return $result;
    }

    private static function checkValidateTitleArticle($title){
        if (strlen($title) >= 15 && strlen($title) <= 55){
            return true;
        }else{
            return false;
        }
    }

    private static function checkValidateContentArticle($content){
        if (strlen($content) >= 200){
            return true;
        }else{
            return false;
        }
    }

    private static function checkValidateFile($file){
        if (!empty($file)){
            return true;
        }else{
            return false;
        }
    }

     public static function updatePhoto($idPhoto,$description){
        $db = Db::getConnection();
        $query = "UPDATE images SET description = '$description' WHERE id_img = '$idPhoto';";
        $result = $db->query($query);
        return $result;
    }

    public static function addPhoto($link,$description){
        $db = Db::getConnection();
        $query = "INSERT INTO images (link, description) VALUES ('$link', '$description');";
        $result = $db->query($query);
        return $result;
    }

    public static function checkUserAdmin(){
        if ($_SESSION['user']){
            $idUser = $_SESSION['user']['id_client'];
            $db = Db::getConnection();
            $query = "SELECT statuses_clients.status_client FROM clients INNER JOIN statuses_clients ON clients.id_status = statuses_clients.id_status WHERE clients.id_client=?;";
            $result = $db->prepare($query);
            $result->execute(["$idUser"]);
            $statusUser = $result->fetch(PDO::FETCH_ASSOC);
            $statusUser = $statusUser['status_client'];
            if ($statusUser == 'admin'){
                return true;
            }else{
                header("Location: /user/login");
            }
        }else{
            header("Location: /user/login");
        }
    }
}