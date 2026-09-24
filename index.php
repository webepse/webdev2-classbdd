<?php

use App\Autoloader;

require "class/Autoloader.php";
Autoloader::register();


$form = new App\HTML\Form();
$db = new Database("blog2");