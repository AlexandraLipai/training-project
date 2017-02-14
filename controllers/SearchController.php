<?php
include_once ROOT."/models/Search.php";

include_once ROOT."/helper/Safety.php";
include_once ROOT."/components/Db.php";
include_once ROOT."/components/Paginator.php";
class SearchController{
    public function ActionIndex(){
        if (isset($_POST['query']) && !empty($_POST['query'])) {
            if (isset($_POST['searchQuery'])) {
                $query = Safety::getSafety($_POST['query']);
                $errors = Search::getSearchValidate($query);
                if (!$errors) {
                    $features = Search::getFeaturesByQuery($query);
                    $countFeatures = Search::getCountFeaturesByQuery($query);
                }
            }
            require_once ROOT . "/views/search/index.php";
            return true;
        }else{
            header("location: /");
        }
    }
}