<?php
/**
 * Created by PhpStorm.
 * User: Lamanna
 * Date: 05/04/2017
 * Time: 15:06
 */

$db = new PDO('mysql:host=localhost;dbname=tuto;charset=utf8', 'root', 'root');

$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$db ->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

