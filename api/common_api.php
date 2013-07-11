<?php
class C{

    static function getInt($name, $default=0){
        $val=$default;
        if(isset($_GET[$name])) $val = $_GET[$name];
        if(isset($_POST[$name])) $val = $_POST[$name];
        $val = (int)$val;
        return $val;
    }

    static function getStr($name, $default=""){
        $val=$default;
        if(isset($_GET[$name])) $val = $_GET[$name];
        if(isset($_POST[$name])) $val = $_POST[$name];
        if (get_magic_quotes_gpc()) $val = stripslashes($val);
        return $val;
    }
}
