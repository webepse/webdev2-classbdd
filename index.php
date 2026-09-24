<?php

use App\Autoloader;
use App\Database;

require "class/Autoloader.php";
Autoloader::register();


$form = new App\HTML\Form();
$db = new Database(dbName :"blog2", dbPass: "root");

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
            $erreurContent = false;
            $erreurTitle = false;

            // Récupération avec trim pour éviter les espaces vides
            $title = trim($_POST['title'] ?? '');
            $content = trim($_POST['content'] ?? '');

            if(empty($content)){
                $erreurContent = true;
            }

            if(empty($title)){
                $erreurTitle = true;
            }

            if(!$erreurContent && !$erreurTitle){
                $db->addPost($title, $content);
                header("Location: index.php?action=home&add=success");
                exit;
            } else {
                $choice = $menus["ajouter"];
            }
        }
        elseif($_GET['action']=="article"){
            if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
                $post = $db->prepare('SELECT * FROM posts WHERE id = ?', [$_GET['id']], 'Article', true);
                if($post){
                    $choice = $menus["article"];
                }else{
                    http_response_code(404);
                    $choice = $menus["404"];
                }
            }else{
                http_response_code(404);
                $choice = $menus["404"];
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    <title>Exercice ClassBDD</title>
</head>
<body>
    <?php
        /* message flash */
        if(isset($_GET['add']) && $_GET['add']=="success"){
            echo "<div class='alert alert-primary'>Vous avez bien ajouté un post à la base de données</div>";
        }
        include("page/".$choice);
    ?>
</body>
</html>
 