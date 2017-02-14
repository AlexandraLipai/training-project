<?php

/**
 * Created by PhpStorm.
 * User: USER
 * Date: 13.01.2017
 * Time: 12:19
 */
class FormController
{
    public function actionForm(){

        include_once ROOT."/views/form/feedback/form.php";
        return true;
    }
}