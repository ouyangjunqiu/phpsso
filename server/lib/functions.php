<?php
/**
 * @file functions.php
 * @author ouyangjunqiu
 * @version Created by 16/6/13 16:49
 */
/**
 *
 */
function base_url()
{
    $currentPath = $_SERVER['PHP_SELF'];
    $pathInfo = pathinfo($currentPath);

    $hostName = $_SERVER['HTTP_HOST'];

    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https://' ? 'https://' : 'http://';
    return $protocol.$hostName.$pathInfo['dirname']."/";
}

/**
 *
 */
function env_init(){

    ini_set('session.gc_maxlifetime', 30*24*3600);
    ini_set('session.use_cookies',1);

    session_start();


    define("BASE_URL",base_url());

    define("THEME_URL",base_url()."theme/");
}

/**
 * @param $ref
 */
function ref_set($ref){
    if(isset($ref) && !empty($ref)){
        $_SESSION["ref"] = urlencode($ref);
    }
}

/**
 * @return string
 */
function ref_get(){
    if(empty($_SESSION["ref"]))
        return "user.php";
    return urldecode($_SESSION["ref"]);
}

