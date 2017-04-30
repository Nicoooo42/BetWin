<?php
class DBFactory
{
    public static function getMysqlConnexionWithPDO()
    {
        $db = new PDO('mysql:host=localhost;dbname=tuto;charset=utf8', 'root', 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $db;
    }

}
