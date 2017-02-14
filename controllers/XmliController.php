<?php
include_once ROOT."/models/Xmli.php";
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 12.01.2017
 * Time: 23:28
 */
class XmliController
{
    public function actionXmli(){
        include_once ROOT."/views/xmli/xmli.php";
        return true;
        }

}