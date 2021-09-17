<?php
    error_reporting(E_ALL);

    //Cors
    header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: *');
    header('Access-Control-Allow-Headers: *');
	header('Access-Control-Allow-Credentials: true');

    //Accept OPTION request from browser to test secure line
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') exit();

    if ($_GET['font']) {
        if (file_exists('includes/'.$_GET['font']))
            require 'includes/'.$_GET['font'];
        else {
        header('HTTP/1.1 404 Not Find');
        exit('HTTP/1.1 404 Not Find');
        }
    } else
        foreach(glob('includes/*') as $file) {
        echo '<a href="'.pathinfo($file)['filename'].'.'.pathinfo($file)['extension'].'">/'.pathinfo($file)['filename'].'.'.pathinfo($file)['extension'].'</a><br>';
        }
