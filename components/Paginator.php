<?php
define('PAGINATOR_INDENT',3);

class Paginator{
    public static function getPaginator($pageNumber, $countPage){
        $start = $pageNumber - PAGINATOR_INDENT;
        if ($start < 1) $start = 1;
        $finish = $pageNumber + PAGINATOR_INDENT;
        if ($finish > $countPage) $finish = $countPage;

        $paginator = array();
        for ($i =$start; $i <= $finish; $i++){
            $paginator[$i] = $i;
        }
        return $paginator;
    }
}