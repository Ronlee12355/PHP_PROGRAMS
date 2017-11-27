<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 2017/10/27
 * Time: 21:15
 */
define('__ROOT__',str_replace('\\','/',dirname(__FILE__)));
error_reporting(E_ALL^E_NOTICE);
$path=__ROOT__.'/uploads';
require __ROOT__.'/Class/Framework.class.php';
Framework::runApp($path);