<?php
    session_start(); // starts a session

    // Includes the different files from the Include folder
    include 'Include/inc-authorization.php';
    include 'Include/Curl-getPurchases.php';

    // Twig Code //
    require_once '../vendor/autoload.php';
    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, array('auto_reload' => true));
    $template = $twig->loadTemplate('Purchase-History.twig');

    echo $template->render(array('result' => $objJson));

