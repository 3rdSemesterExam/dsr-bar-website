<?php
    $auth_header=''; // Makes an empty Variable, to make sure it gets declared
    if (isset($_SESSION['token'])) // if the token is in the session, it does code below
    {
        $auth_header = 'Authorization: bearer '.$_SESSION['token']; // sets the variable $auth_header to the token, which is given when you log in
    }
    else
    {
        header("HTTP/1.1 401 Unauthorized"); // gives the error 401 Unauthorized
        header("Location: index.php"); // redirects to index.php if the user doesn't have a session (is not logged in)
    }
