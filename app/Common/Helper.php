<?php
if (!function_exists("base_path")){
    function base_path($path = "")
    {
        return str_replace("/index.php" , "" , $_SERVER['SCRIPT_FILENAME']).($path ? DIRECTORY_SEPARATOR.$path : $path);
    }
}
