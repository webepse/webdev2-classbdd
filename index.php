<?php

use App\Autoloader;
use App\Database;

require "class/Autoloader.php";
Autoloader::register();


$form = new App\HTML\Form();
$db = new Database(dbName :"blog2");

$menus = [
    "home" => "home.php",
    "addpost" => "home.php",
    "article" => "article.php",
    "ajouter" => "ajouter.php",
    "404" => "404.php"
];


if(isset($_GET['action']) && !empty($_GET['action'])){
    if(array_key_exists($_GET['action'],$menus)){
        if($_GET['action']=="addpost"){
            // traitement
            if(isset($_POST['title']) && !empty($_POST['title'])){
                if(isset($_POST['content']) && !empty($_POST['content'])){
                    // insertion 
                    // affichage de home
                    header("Location: index.php?action=home");
                }else{
                    $error = 2;
                    $choice = $menus['ajouter'];
                }
            }else{
                $error = 1;
                $choice = $menus['ajouter'];
            }
        }
        else{
            $choice = $menus[$_GET['action']];
        }

    }else{
        http_response_code(404);
        $choice = $menus["404"];
    }
}else{
    $choice = $menus["home"];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include("page/".$choice);
    ?>
</body>
</html>
 