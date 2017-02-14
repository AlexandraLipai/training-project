<?php

class Safety{
    //защита от sql-inj: преобразуем в сущности, экранируем,удаляем тэги
    public static function getSafety($content){
        $content = htmlspecialchars(addslashes(strip_tags($content)));
        return $content;
    }
}