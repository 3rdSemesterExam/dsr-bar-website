<?php
    session_start(); // starts a session (needs to start a session to destroy it)
    session_destroy(); // Destroys the session when you go into index.php

    session_start(); // starts a session

    // Posts username, password and a grand_type to the webservice
    // Webservice returns a token, which is used to get access to the different parts of the webservice
    // The token is putted into a session and through out the website, if the log in is successful
    if ($_POST)
    {
        $username = $_POST['textBox_Username']; // Posts the username (email)
        $password = $_POST['textBox_Password']; // Posts the password
        $postData = 'username='.$username.'&password='.$password.'&grant_type=password'; // Posts a grand_type, which is default set to password

        $curl = curl_init('http://dsr-webservice.azurewebsites.net/token'); // The link ot the webservice
        curl_setopt($curl, CURLOPT_POSTFIELDS, $postData); // The fields which is going to be posted to the webservice
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('content-type:application/json')); // Sets the http header, so it can use json
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        $result = json_decode(curl_exec($curl)); // decodes the result as a json object

        // if the given information(username, password) is correct it will grant you access to the website and redirect you to Admin-Panel.php
        if ($result->{'token_type'} == 'bearer')
        {
            $_SESSION['username']= $result->{'userName'}; // checks if username is the same userName in the webservice
            $_SESSION['token']= $result->{'access_token'}; // checks if the token granted is valid
            header("Location: Admin-Panel.php"); // redirects to the  Admin-Panel.php
        }
    }

    // Twig Code //
    require_once '../vendor/autoload.php';
    Twig_Autoloader::register();

    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader, array('auto_reload' => true));
    $template = $twig->loadTemplate('index.html.twig');

    echo $template->render(array());
