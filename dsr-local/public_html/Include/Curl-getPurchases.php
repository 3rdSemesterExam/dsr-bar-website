<?php
    // Gets an json object of activityLogs
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_HTTPHEADER, array($auth_header)); // Sets the http header, $$auth_header is the token, users get when they log in
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, 'http://dsr-webservice.azurewebsites.net/api/purchases'); // Link to the webservice
    $postResult = curl_exec($curl);
    curl_close($curl);
    $objJson = json_decode($postResult); // converts the result to a json object
