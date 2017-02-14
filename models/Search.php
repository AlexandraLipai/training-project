<?php
define('ITEM_PER_PAGE', 6);

class Search{
    public static function getFeaturesByQuery($queryUser){
        $db = Db::getConnection();
        $query = "SELECT
news.id_news,
  news.news,
  news.name_of_news,
  news.picture,
  clients.name,
  clients.surname
FROM news
       INNER JOIN clients
                 ON news.id_client = clients.id_client
WHERE news.news LIKE ? OR news.name_of_news LIKE ? ORDER BY id_news DESC;";
        $result = $db->prepare($query);
        $result->execute(["%$queryUser%", "%$queryUser%"]);
        $features = $result->fetchAll(PDO::FETCH_ASSOC);
        return $features;
    }

    public static function getCountFeaturesByQuery($queryUser){
        $db = Db::getConnection();
        $query = "SELECT COUNT(*) FROM news WHERE news.news LIKE ? OR news.name_of_news LIKE ?;";
        $result = $db->prepare($query);
        $result->execute(["%".$queryUser."%", "%".$queryUser."%"]);
        $countFeatures = $result->fetchAll(PDO::FETCH_NUM);
        return $countFeatures[0];
    }

    public static function getSearchValidate($query){
        $errors = false;
        if (iconv_strlen($query) < 2 || iconv_strlen($query) > 35){
            $errors[] = 'Запрос должен состоять от 2 до 35 символов';
            }
        return $errors;
    }
}