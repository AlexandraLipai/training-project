<?php
define('MESSAGE_PER_PAGE', 2);
class News{


    public static function getCountArticles()
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT COUNT(*) FROM news;");
        $countArticles = $result->fetch(PDO::FETCH_NUM);
        return $countArticles[0];
    }

    public static function getCountArticlesPages()
    {
        $countArticles = self::getCountArticles();
        $countArticlesPages = ceil($countArticles[0] / MESSAGE_PER_PAGE);
        return $countArticlesPages;

    }

    public static function getAllNewsList($pageNumber)
    {
        $db = Db::getConnection();
        $articleOffset = ($pageNumber - 1) * MESSAGE_PER_PAGE;
        $result = $db->query('SELECT news.id_news,
                                      news.news,
                                      news.name_of_news,
                                      news.picture
                              FROM news ORDER BY id_news DESC LIMIT ' . $articleOffset . ', ' . MESSAGE_PER_PAGE . ';');
        $cutAllNewsList = $result->fetchAll(PDO::FETCH_ASSOC);
        return $cutAllNewsList;
    }



    public static function getArticleItemById($id)
    {
        $id = intval($id);
        if ($id) {
            $db = Db::getConnection();
            $query = "SELECT news.id_news,
                                      news.news,
                                      news.name_of_news,
                                      news.picture,
                                      clients.name
                              FROM news INNER JOIN clients ON news.id_client = clients.id_client WHERE news.id_news = ?;";
            $result = $db->prepare($query);
            $result->execute(["$id"]);
            $articleItem = $result->fetch(PDO::FETCH_ASSOC);
            return $articleItem;
        }
    }


}